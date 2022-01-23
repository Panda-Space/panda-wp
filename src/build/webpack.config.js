const config = require('../config');
const webpack = require('webpack')
const yargs = require('yargs')
const path =  require('path');

const env = yargs.argv.env
const configDev = require('./webpack.dev')
const configProd = require('./webpack.prod')
const VueLoaderPlugin = require('vue-loader/lib/plugin')
const MiniCssExtractPlugin  = require("mini-css-extract-plugin");

const baseConfig = {
  mode: env,
  entry: config.entry.js,
  output: {
    filename: '[name].bundle.js',
    chunkFilename: '[name].bundle.js',
    path: path.resolve(__dirname, '../../app/static/js'),
    publicPath: (env == 'development') ? `/wp-content/themes/${ config.theme }/${ config.publicPath }/temp/js/` : `/wp-content/themes/${ config.theme }/${ config.publicPath }/js/`,
  },

  optimization: {
    splitChunks: {
      cacheGroups: {
        commons: {
          test: /[\\/]node_modules[\\/]/,
          name: 'vendors',
          chunks: 'all'
        }
      }
    }
  },

  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: ['babel-loader']
      },
      {
        test: /\.vue$/,
        loader: 'vue-loader'
      },
      {
        test:/\.(sa|sc|c)ss$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader
          },
          {
            loader: 'css-loader'
          },
          {
            loader: 'sass-loader',
          }
        ]
      }
    ]
  },

  target: 'web',

  resolve: {
    extensions: ['.js', '.vue'],
    alias: {
      'vue$': 'vue/dist/vue.esm.js'
    }
  },

  plugins: [
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      "window.jQuery": "jquery"
    }),
    new VueLoaderPlugin(),
    new MiniCssExtractPlugin({
      filename: '../css/[name].css',
    })
  ],
};

if( env === 'development' ) {
  module.exports = {
    ...baseConfig,
    ...configDev,
    entry: require('./util/addHotMiddleware')(baseConfig.entry),
    plugins: [...baseConfig.plugins, ...configDev.plugins]
  }
}

if ( env === 'production' ) {
  module.exports = {
    ...baseConfig,
    ...configProd,
    plugins: [...baseConfig.plugins, ...configProd.plugins]
  }
}
