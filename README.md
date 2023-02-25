Laravel TestBench
=================

Laravel TestBench was created by, and is maintained by [Graham Campbell](https://github.com/GrahamCampbell), and provides some testing functionality for [Laravel](https://laravel.com/). It utilises [PHPUnit](https://github.com/sebastianbergmann/phpunit), [Mockery](https://github.com/padraic/mockery), [Orchestral Testbench](https://github.com/orchestral/testbench), and the [Laravel Testbench Core](https://github.com/GrahamCampbell/Laravel-TestBench-Core) packages. Feel free to check out the [change log](CHANGELOG.md), [releases](https://github.com/GrahamCampbell/Laravel-TestBench/releases), [security policy](https://github.com/GrahamCampbell/Laravel-TestBench/security/policy), [license](LICENSE), [code of conduct](.github/CODE_OF_CONDUCT.md), and [contribution guidelines](.github/CONTRIBUTING.md).

![Banner](https://user-images.githubusercontent.com/2829600/71477507-68a5a600-27e2-11ea-86bf-187e13108910.png)

<p align="center">
<a href="https://github.com/GrahamCampbell/Laravel-TestBench/actions?query=workflow%3ATests"><img src="https://img.shields.io/github/actions/workflow/status/GrahamCampbell/Laravel-TestBench/tests.yml?label=Tests&style=flat-square" alt="Build Status"></img></a>
<a href="https://github.styleci.io/repos/15239209"><img src="https://github.styleci.io/repos/15239209/shield" alt="StyleCI Status"></img></a>
<a href="LICENSE"><img src="https://img.shields.io/badge/license-MIT-brightgreen?style=flat-square" alt="Software License"></img></a>
<a href="https://packagist.org/packages/graham-campbell/testbench"><img src="https://img.shields.io/packagist/dt/graham-campbell/testbench?style=flat-square" alt="Packagist Downloads"></img></a>
<a href="https://github.com/GrahamCampbell/Laravel-TestBench/releases"><img src="https://img.shields.io/github/release/GrahamCampbell/Laravel-TestBench?style=flat-square" alt="Latest Version"></img></a>
</p>


## Installation

This version requires [PHP](https://www.php.net/) 7.4-8.2 and supports [PHPUnit](https://phpunit.de/) 9-10 and [Laravel](https://laravel.com/) 8-10.

| TestBench | L5.5               | L5.6               | L5.7               | L5.8               | L6                 | L7                 | L8                 | L9                 | L10                |
|-----------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|
| 4.0       | :white_check_mark: | :x:                | :x:                | :x:                | :x:                | :x:                | :x:                | :x:                | :x:                |
| 5.7       | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :x:                |
| 6.0       | :x:                | :x:                | :x:                | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :white_check_mark: |

| TestBench | PHPUnit 6          | PHPUnit 7          | PHPUnit 8          | PHPUnit 9          | PHPUnit 10         |
|-----------|--------------------|--------------------|--------------------|--------------------|--------------------|
| 4.0       | :white_check_mark: | :x:                | :x:                | :x:                | :x:                |
| 5.7       | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :x:                |
| 6.0       | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: |

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require "graham-campbell/testbench:^6.0" --dev
```

Once installed, you can extend or implement the classes in this package, or packages required by this package. The AbstractTestCase class would be a good place to start. There are no service providers to register.


## Configuration

Laravel TestBench requires no configuration. Just follow the simple install instructions and go!


## Usage

You may see an example of implementation in pretty much all of my Laravel packages.


## Security

If you discover a security vulnerability within this package, please send an email to security@tidelift.com. All security vulnerabilities will be promptly addressed. You may view our full security policy [here](https://github.com/GrahamCampbell/Laravel-TestBench/security/policy).


## License

Laravel TestBench is licensed under [The MIT License (MIT)](LICENSE).


## For Enterprise

Available as part of the Tidelift Subscription

The maintainers of `graham-campbell/testbench` and thousands of other packages are working with Tidelift to deliver commercial support and maintenance for the open source dependencies you use to build your applications. Save time, reduce risk, and improve code health, while paying the maintainers of the exact dependencies you use. [Learn more.](https://tidelift.com/subscription/pkg/packagist-graham-campbell-testbench?utm_source=packagist-graham-campbell-testbench&utm_medium=referral&utm_campaign=enterprise&utm_term=repo)
