const ReplaceInFileWebpackPlugin = require('replace-in-file-webpack-plugin');

const configProd = {
  plugins: [
    new ReplaceInFileWebpackPlugin([
      {
        dir: 'app/functions',
        files: ['enqueues.php'],
        rules: [
          {
            search: new RegExp("version = '[0-9a-zA-Z]+'"),
            replace: function(match){
              return `version = '${Date.now()}'`
            }
          }
        ]
      }
    ]),
  ]
};

module.exports = configProd;
