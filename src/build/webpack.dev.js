const webpack = require('webpack')
const ErrorOverlayPlugin = require('error-overlay-webpack-plugin')
const BrowserSyncPlugin = require('browsersync-webpack-plugin');

const target = 'http://pandawp.site';
const config = require('../config');

const configDev = {
  stats: {
    // assets: false,
    hash: false,
    version: false,
    timings: false,
    children: false,
    errors: false,
    errorDetails: false,
    warnings: false,
    chunks: false,
    modules: false,
    moduleTrace: false,
    reasons: false,
    source: false,
    // publicPath: false,
  },
  plugins: [
    new ErrorOverlayPlugin(),
    new webpack.HotModuleReplacementPlugin(),
    new BrowserSyncPlugin({
      target,
      open: true,
      proxyUrl: target + ':3000',
      watch: config.entry.js,
      delay: 500,
    }),
  ]
};

module.exports = configDev;
