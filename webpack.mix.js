const mix = require('laravel-mix');
const dl = require('directory-list');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

const themeDir = 'public/themes/';
const moduleDir = __dirname+'/Modules/';

dl.list(moduleDir, true, function(dirs){
	for(var index in dirs){
		require(moduleDir+dirs[index]+'/webpack.mix.js');
	}
});

dl.list(themeDir, true, function(dirs) {
	for(var index in dirs){
		mix.js(themeDir+dirs[index]+'/assets/js/app.js', themeDir+dirs[index]+'/assets/theme.js');
		mix.sass(themeDir+dirs[index]+'/assets/css/master.scss', themeDir+dirs[index]+'/assets/theme.css');
	}
});

mix.extract();

mix.browserSync('laravel.test');