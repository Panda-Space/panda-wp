import { src, dest, watch, series, parallel } from 'gulp'

import sass from 'gulp-sass'
import sassGlob from 'gulp-sass-glob'
import cleanCss from 'gulp-clean-css'
import gulpif from 'gulp-if'
import postcss from 'gulp-postcss'
import sourcemaps from 'gulp-sourcemaps'
import gulpStylelint from 'gulp-stylelint'
import cssImport from 'gulp-cssimport'
import zip from "gulp-zip";

import yargs from 'yargs'
import named from 'vinyl-named'
import autoprefixer from 'autoprefixer'
import del from 'del'
import webpack from 'webpack-stream'
import browserSync from "browser-sync";

import webpackConfig from './src/build/webpack.config'
import config from './src/config'
import info from "./package.json";

const env = yargs.argv.env
const publicPath = (folder = '') => `${config.publicPath}/${folder}`

/*
 * Server Live
 * */
const server = browserSync.create();
export const serve = done => {
  server.init({
    proxy: config.proxy
  });
  done();
};
export const reload = done => {
  server.reload();
  done();
};

/*
 * Styles
 * */
sass.compiler = require('node-sass')

export const styles = () => {
  const entryStyles = config.entry.styles;
  const options = {
    includePaths: ['node_modules']
  }

  return src(entryStyles)
    .pipe(gulpif(env === 'development', sourcemaps.init()))
    .pipe(sassGlob())
    .pipe(sass({includePaths: ['node_modules'], importCss: true}).on('error', sass.logError))
    .pipe(gulpif(env === 'production', postcss([autoprefixer])))
    .pipe(gulpif(env === 'production', cleanCss({inline: ['none'], compatibility:'ie8', })) )
    .pipe(gulpif(env === 'development', sourcemaps.write()))
    .pipe(cssImport(options))
    .pipe(dest(publicPath('css')))
    .pipe(server.stream());
}

export const lintCss = () => {
  return src(config.globalResources.styles)
    .pipe(gulpStylelint({
      failAfterError: true,
      reporters: [
        {formatter: 'verbose', console: true}
      ]
    }))
}

/*
 * Javascript
 * */
export const scripts = () => {
  return src(config.entry.js)
    .pipe(named())
    .pipe(webpack({
      config: webpackConfig
    }))
    .pipe(dest(publicPath('js')))
}


/*
 * Clean
 * */
export const clean = () => del([publicPath('css'), publicPath('js')])

/*
 * Watch
 * */
export const watchForChanges = () => {
  watch([config.globalResources.styles], parallel(styles, lintCss))
  watch(config.ignoreFoldersDevelopment, series(reload))
  watch([config.globalResources.js], series(scripts, reload))
  watch([config.globalResources.images], reload);
  watch([config.globalResources.php], reload);
  watch([config.globalResources.twig], reload);
}

/*
 * Compilation
 * */
export const dev = series(clean, parallel(styles, scripts), lintCss, serve, watchForChanges)
export const build = series(clean, parallel(styles, scripts))

export default dev
