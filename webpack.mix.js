let mix = require('laravel-mix')

mix.extend('nova', new require('vendor/laravel/nova/nova.mix'))

mix
  .setPublicPath('dist')
  .js('resources/js/tool.js', 'js')
  .vue({ version: 3 })
  .css('resources/css/tool.css', 'css')
  .nova('laravel/nova-pennant-tool')
