const path = require('path');

module.exports = {
  entry: './site/js/main.js',

  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: '[name].js',
  },
  module: {
    rules: [{
      test: /\.\/site\/html$/,
      use: [{
        loader: 'html-loader',
        options: {
          name: '[name].[ext]'
        }
      }]
    }, {
      test: /\.less$/,
      exclude: /node_modules/,
      loader: 'style!css!less'
    }]
  },
};