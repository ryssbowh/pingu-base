# Pingu Base

## TODO
- [ ] clean up assets (delete them)
- [ ] test an install with the php version forcing removed

## v1.0.8 added Installation to README
## v1.0.3 wrote readme

## Base
This contains the laravel code base (5.7) and a few changes to the code :

- forces composer to use php 7.1.3 due to my previous setup, can probably be removed since the pi is on 7.3.
- defines module dependencies in composer.json
- adds Laravel Collective in config/app.php, for some reason the Facade wasn't loaded when I put it in the Forms module, not ideal but no choice.
- adds orchestra Facade in config/app.php, same reason as above.
- git ignore modules, themes, modules config and vendor folder amongst others
- provides a entry point for webpack that will look through each module/theme and include their respective webpack.min.js
- removed views in resources folder
- comments default laravel routes
- disables laravel auto discover mechanism, here it's the modules that add packages, libraries in vendor folder should not be added automatically. If you disable a moduleand the libraries are still loaded it's not ideal.

## Installation

- `git clone https://github.com/ryssbowh/pingu-base.git mysite.test`
- `cd mysite.test`
- `composer install`
- `cp .env.example .env`
- fill .env with db details
- create your database
- `./artisan module:migrate`
- `./artisan module:seed`
- `./artisan core:merge-packages` (optionnal, I added packages.json to base actually)
- `npm run dev`
- `./artisan module:publish-config`
- `./artisan key:generate`
- visit : mysite.test/admin/users (/admin is broken for now)