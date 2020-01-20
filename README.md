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

- `git clone https://github.com/ryssbowh/pingu-base.git mysite.test`
- `cd mysite.test`
- run `composer install`
- make sure all folders/files are writable by server.
- visit mysite.test/install