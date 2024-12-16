let mix = require('laravel-mix')

mix.extend('nova', require('laravel-nova-devtool'))

mix
  .setPublicPath('dist')
  .js('resources/js/tool.js', 'dist')
  .vue({ version: 3 })
  // .css('resources/css/tool.css', 'dist')
  .nova('laravel/nova-pennant-tool')
