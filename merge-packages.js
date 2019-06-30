var merge = require('merge-package-json');
const fs = require('fs');
const dl = require('directory-list');

var packages = require(__dirname + '/package-base.json');

const themeDir = __dirname+'/Themes/';
const moduleDir = __dirname+'/Modules/';

dl.list(themeDir, true, function(dirs) {
	for(var index in dirs){
		if (fs.existsSync(themeDir+dirs[index]+'/package.json')) {
			var package = require(themeDir+dirs[index]+'/package.json');
			packages = merge(packages, package);
		}
	}
});

dl.list(moduleDir, true, function(dirs){
	for(var index in dirs){
		if (fs.existsSync(moduleDir+dirs[index]+'/package.json')) {
			var package = require(moduleDir+dirs[index]+'/package.json');
			packages = merge(packages, package);
		}
	}
});


packages = JSON.parse(packages);
var data = JSON.stringify(packages, null, 4);

fs.writeFileSync(__dirname +'/package.json', data);

process.exit(0);