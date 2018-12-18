var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build')
    .setPublicPath('/build')
    .addEntry('js/app', './assets/js/app.js')
    .addStyleEntry('css/app', './assets/css/base.scss')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications();
Encore.enableSassLoader()

module.exports = Encore.getWebpackConfig();