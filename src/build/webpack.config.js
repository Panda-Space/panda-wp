const webpack = require('webpack')
const merge = require('merge')
const yargs = require('yargs')

const env = yargs.argv.env
const configDev = require('./webpack.dev')
const configProd = require('./webpack.prod')


const config = {

  mode: env,

  output: {
    filename: '[name].bundle.js',
    chunkFilename: '[name].bundle.js',
  },

  optimization: {
    splitChunks: { 
      cacheGroups: {
        vendors(module) {
          if (module.context) {
            const packageName = module.context.match(/[\\/]node_modules[\\/](.*?)([\\/]|$)/)
            if (packageName) {
              return {
                test: `/[\\/]node_modules[\\/]${ packageName[1] }[\\/]/`,
                name: `package.${packageName[1].replace('@', '')}`,
                chunks: "all"
              }
            }
          }
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
      }
    ]
  },

  target: 'web',

  resolve: {
    alias: {
      'vue$': 'vue/dist/vue.esm.js'
    }
  },

  plugins: [
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      "window.jQuery": "jquery"
    })
  ],

  externals: {
    jquery: 'jQuery'
  }
};

if( env === 'development' ) {
  module.exports = merge(config, configDev)
}

if ( env === 'production' ) {
  module.exports = merge(config, configProd)
}
