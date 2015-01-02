Laravel TestBench
=================

Laravel TestBench was created by, and is maintained by [Graham Campbell](https://github.com/GrahamCampbell), and provides some testing functionality for [Laravel 4.2](http://laravel.com). It utilises [PHPUnit](https://github.com/sebastianbergmann/phpunit), [Mockery](https://github.com/padraic/mockery), and the [Orchestral Testbench](https://github.com/orchestral/testbench) packages. Feel free to check out the [change log](CHANGELOG.md), [releases](https://github.com/GrahamCampbell/Laravel-TestBench/releases), [license](LICENSE), [api docs](http://docs.grahamjcampbell.co.uk), and [contribution guidelines](CONTRIBUTING.md).

![Laravel TestBench](https://cloud.githubusercontent.com/assets/2829600/4432280/a961ad84-468c-11e4-9911-d5ae8c926a1b.PNG)

<p align="center">
<a href="https://travis-ci.org/GrahamCampbell/Laravel-TestBench"><img src="https://img.shields.io/travis/GrahamCampbell/Laravel-TestBench/master.svg?style=flat-square" alt="Build Status"></img></a>
<a href="https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-TestBench/code-structure"><img src="https://img.shields.io/scrutinizer/coverage/g/GrahamCampbell/Laravel-TestBench.svg?style=flat-square" alt="Coverage Status"></img></a>
<a href="https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-TestBench"><img src="https://img.shields.io/scrutinizer/g/GrahamCampbell/Laravel-TestBench.svg?style=flat-square" alt="Quality Score"></img></a>
<a href="LICENSE"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square" alt="Software License"></img></a>
<a href="https://github.com/GrahamCampbell/Laravel-TestBench/releases"><img src="https://img.shields.io/github/release/GrahamCampbell/Laravel-TestBench.svg?style=flat-square" alt="Latest Version"></img></a>
</p>


## Installation

[PHP](https://php.net) 5.4+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required.

To get the latest version of Laravel TestBench, simply add the following line to the require block of your `composer.json` file:

```
"graham-campbell/testbench": "~1.0"
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

Once Laravel TestBench is installed, you can extend or implement the classes in this package, or packages required by this package. The AbstractTestCase class would be a good place to start. There are no service providers to register.

#### Looking for a laravel 5 compatable version?

Checkout the [master branch](https://github.com/GrahamCampbell/Laravel-TestBench/tree/master), installable by requiring `"graham-campbell/testbench": "~2.0"`.


## Configuration

Laravel TestBench requires no configuration. Just follow the simple install instructions and go!


## Usage

There is currently no usage documentation besides the [API Documentation](http://docs.grahamjcampbell.co.uk) for Laravel TestBench.

You may see an example of implementation in pretty much all of my [Laravel](http://laravel.com) packages.


## License

Laravel TestBench is licensed under [The MIT License (MIT)](LICENSE).
