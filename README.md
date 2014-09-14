Laravel TestBench
=================


[![Build Status](https://img.shields.io/travis/GrahamCampbell/Laravel-TestBench/master.svg?style=flat-square)](https://travis-ci.org/GrahamCampbell/Laravel-TestBench)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/GrahamCampbell/Laravel-TestBench.svg?style=flat-square)](https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-TestBench/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/GrahamCampbell/Laravel-TestBench.svg?style=flat-square)](https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-TestBench)
[![Software License](https://img.shields.io/badge/license-Apache%202.0-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Latest Version](https://img.shields.io/github/release/GrahamCampbell/Laravel-TestBench.svg?style=flat-square)](https://github.com/GrahamCampbell/Laravel-TestBench/releases)


### Looking for a laravel 5 compatable version?

Checkout the [laravel5](https://github.com/GrahamCampbell/Laravel-TestBench/tree/laravel5) branch, installable by requiring `"graham-campbell/testbench": "~2.0"`.


## Introduction

Laravel TestBench was created by, and is maintained by [Graham Campbell](https://github.com/GrahamCampbell), and provides some testing functionality for [Laravel 4.2](http://laravel.com). It utilises [PHPUnit](https://github.com/sebastianbergmann/phpunit), [Mockery](https://github.com/padraic/mockery), and the [Orchestral Testbench](https://github.com/orchestral/testbench) packages. Feel free to check out the [change log](CHANGELOG.md), [releases](https://github.com/GrahamCampbell/Laravel-TestBench/releases), [license](LICENSE.md), [api docs](http://docs.grahamjcampbell.co.uk), and [contribution guidelines](CONTRIBUTING.md).


## Installation

[PHP](https://php.net) 5.4+ or [HHVM](http://hhvm.com) 3.2+, and [Composer](https://getcomposer.org) are required.

To get the latest version of Laravel TestBench, simply require `"graham-campbell/testbench": "~1.0"` in your `composer.json` file. You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

Once Laravel TestBench is installed, you can extend or implement the classes in this package, or packages required by this package. The AbstractTestCase class would be a good place to start. There are no service providers to register.


## Configuration

Laravel TestBench requires no configuration. Just follow the simple install instructions and go!


## Usage

There is currently no usage documentation besides the [API Documentation](http://docs.grahamjcampbell.co.uk) for Laravel TestBench.

You may see an example of implementation in pretty much all of my [Laravel](http://laravel.com) packages.


## License

Apache License

Copyright 2013-2014 Graham Campbell

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

 http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
