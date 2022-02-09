/* eslint-disable */
module.exports = {
  chainWebpack: (config) => {
    config
      .plugin('html')
      .tap((args) => {
        args[0].title = 'Panda WP';
        return args;
      });
  },
  publicPath: (process.env.NODE_ENV === 'production')
    ? `/wp-content/themes/${process.env.VUE_APP_THEME}/app/static/public`
    : '/',
  outputDir: '../../app/static/public',
  devServer: {
    host: process.env.VUE_APP_HOST,
    port: 3000
  },
};
