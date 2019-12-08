Laravel TestBench
=================

Laravel TestBench was created by, and is maintained by [Graham Campbell](https://github.com/GrahamCampbell), and provides some testing functionality for [Laravel 5](http://laravel.com). It utilises [PHPUnit](https://github.com/sebastianbergmann/phpunit), [Mockery](https://github.com/padraic/mockery), [Orchestral Testbench](https://github.com/orchestral/testbench), and the [Laravel Testbench Core](https://github.com/GrahamCampbell/Laravel-TestBench-Core) packages. Feel free to check out the [change log](CHANGELOG.md), [releases](https://github.com/GrahamCampbell/Laravel-TestBench/releases), [security policy](https://github.com/GrahamCampbell/Laravel-TestBench/security/policy), [license](LICENSE), [code of conduct](.github/CODE_OF_CONDUCT.md), and [contribution guidelines](.github/CONTRIBUTING.md).

![Laravel TestBench](https://cloud.githubusercontent.com/assets/2829600/4432286/a990a15c-468c-11e4-8bbe-abcb168cdc3f.PNG)

<p align="center">
<a href="https://styleci.io/repos/15239209"><img src="https://styleci.io/repos/15239209/shield" alt="StyleCI Status"></img></a>
<a href="https://travis-ci.org/GrahamCampbell/Laravel-TestBench"><img src="https://img.shields.io/travis/GrahamCampbell/Laravel-TestBench/master.svg?style=flat-square" alt="Build Status"></img></a>
<a href="https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-TestBench/code-structure"><img src="https://img.shields.io/scrutinizer/coverage/g/GrahamCampbell/Laravel-TestBench.svg?style=flat-square" alt="Coverage Status"></img></a>
<a href="https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-TestBench"><img src="https://img.shields.io/scrutinizer/g/GrahamCampbell/Laravel-TestBench.svg?style=flat-square" alt="Quality Score"></img></a>
<a href="LICENSE"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square" alt="Software License"></img></a>
<a href="https://github.com/GrahamCampbell/Laravel-TestBench/releases"><img src="https://img.shields.io/github/release/GrahamCampbell/Laravel-TestBench.svg?style=flat-square" alt="Latest Version"></img></a>
</p>


## Installation

Laravel TestBench requires [PHP](https://php.net) 7.1-7.4, and supports [PHPUnit](https://phpunit.de/) 6-8. This particular version supports Laravel 5.5-5.8 and 6 only.

To get the latest version, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require graham-campbell/testbench --dev
```

Once installed, you can extend or implement the classes in this package, or packages required by this package. The AbstractTestCase class would be a good place to start. There are no service providers to register.


## Configuration

Laravel TestBench requires no configuration. Just follow the simple install instructions and go!


## Usage

You may see an example of implementation in pretty much all of my Laravel packages.


## Security

If you discover a security vulnerability within this package, please send an email to Graham Campbell at graham@alt-three.com. All security vulnerabilities will be promptly addressed. You may view our full security policy [here](https://github.com/GrahamCampbell/Laravel-TestBench/security/policy).


## License

Laravel TestBench is licensed under [The MIT License (MIT)](LICENSE).


---

<div align="center">
	<b>
		<a href="https://tidelift.com/subscription/pkg/packagist-graham-campbell-testbench?utm_source=packagist-graham-campbell-testbench&utm_medium=referral&utm_campaign=readme">Get professional support for Laravel Testbench with a Tidelift subscription</a>
	</b>
	<br>
	<sub>
		Tidelift helps make open source sustainable for maintainers while giving companies<br>assurances about security, maintenance, and licensing for their dependencies.
	</sub>
</div>
