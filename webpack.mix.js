const mix = require('laravel-mix');
const dl = require('directory-list');
const fs = require('fs');

require('laravel-mix-merge-manifest');
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

const themeDir = __dirname+'/public/themes/';
const moduleDir = __dirname+'/Modules/';

mix.setPublicPath('public').mergeManifest();

dl.list(themeDir, true, function(dirs) {
	for(var index in dirs){
		require(themeDir+dirs[index]+'/webpack.mix.js');
	}
});

dl.list(moduleDir, true, function(dirs){
	for(var index in dirs){
		if (fs.existsSync(moduleDir+dirs[index]+'/webpack.mix.js')) {
			require(moduleDir+dirs[index]+'/webpack.mix.js');
		}
	}
});

//We can't change node current working directory, and that causes manifest.js and vendor.js (that are created by mix.extract()),
//to be located in the latest treated module/theme js public directory (modules/JsGrid/js for example). There is no workaround
//at the time of writing.
//So in order to 'set' node working directory to public/ we run mix on a random and empty js file:
mix.js('public/bust.js','bust2.js').then(() => {
	if (fs.existsSync(__dirname + '/public/bust2.js')) {
		fs.unlink(__dirname + '/public/bust2.js');
  	}
});

mix.extract();

// mix.browserSync('laravel.test');