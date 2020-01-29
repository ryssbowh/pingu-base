# Pingu Base

**This is a pet project, it's highly unstable and is only used for the purpose of learning Laravel.**

The goal is to have a simple CMS that is extendable through modules (composer packages).

## Base

This contains the laravel code base (5.7) and a few changes to the code :

- forces composer to use php 7.1.3 due to my previous setup, can probably be removed.
- defines module dependencies in composer.json
- adds Laravel Collective in config/app.php, for some reason the Facade wasn't loaded when I put it in the Forms module, not ideal but no choice.
- adds orchestra Facade in config/app.php, same reason as above.
- git ignore modules, themes, modules config and vendor folder amongst others
- provides a entry point for webpack that will look through each module/theme and include their respective webpack.min.js
- removed views in resources folder
- comments default laravel routes
- disables laravel auto discover mechanism, here it's the modules that add packages, libraries in vendor folder should not be added automatically. If you disable a module and the libraries are still loaded it's not ideal.
- removes default maintenance mode middleware
- removes `ConvertEmptyStringToNull` global middleware

## Creating a module
use `module:make` command to create a new module.

## Installation

### Clone repo
- `git clone https://github.com/ryssbowh/pingu-base.git mysite.test`
- `cd mysite.test`
- run `composer install`
- make sure all folders/files are writable by server.

### Install

- visit mysite.test/install
- Follow procedure
- Visit mysite.test/admin
- Login is god@pingu.test password admin

Or manually with a terminal :

- create .env file
- `./artisan module:disable-all` disable all modules
- `./artisan module:enable-all` enable all core modules
- `./artisan module:reinstall` drop database and run install migrations for core modules
- Enable optionnal modules with `./artisan module:enable Name`
- `./artisan module:migrate` migrate all enabled modules
- `./artisan module:seed` seed all modules

or in one liner : `./artisan module:disable-all && ./artisan module:enable-all && ./artisan module:reinstall && ./artisan module:migrate && ./artisan module:seed`

Pingu will be considered installed when the file `storage/installed` exists.

## Documentation

Documentation can be generated with the command `./artisan generate-doc`, the output will be in the docs folder