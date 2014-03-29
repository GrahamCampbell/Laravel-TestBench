Laravel TestBench
=================


[![Build Status](https://img.shields.io/travis/GrahamCampbell/Laravel-TestBench/master.svg)](https://travis-ci.org/GrahamCampbell/Laravel-TestBench)
[![Coverage Status](https://img.shields.io/coveralls/GrahamCampbell/Laravel-TestBench/master.svg)](https://coveralls.io/r/GrahamCampbell/Laravel-TestBench)
[![Software License](https://img.shields.io/badge/license-Apache%202.0-brightgreen.svg)](https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md)
[![Latest Version](https://img.shields.io/github/release/GrahamCampbell/Laravel-TestBench.svg)](https://github.com/GrahamCampbell/Laravel-TestBench/releases)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-TestBench/badges/quality-score.png?s=b02a2e89a150f28d8c82129d69688725a2a58cb8)](https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-TestBench)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c70488ec-94bc-44e7-b694-e6dd701416c8/mini.png)](https://insight.sensiolabs.com/projects/c70488ec-94bc-44e7-b694-e6dd701416c8)


## What Is Laravel TestBench?

Laravel TestBench provides some testing functionality for [Laravel 4.1](http://laravel.com).

* Laravel TestBench was created by, and is maintained by [Graham Campbell](https://github.com/GrahamCampbell).
* Laravel TestBench relies on [PHPUnit](https://github.com/sebastianbergmann/phpunit) and the [Orchestral Testbench](https://github.com/orchestral/testbench) package.
* Laravel TestBench uses [Travis CI](https://travis-ci.org/GrahamCampbell/Laravel-TestBench) with [Coveralls](https://coveralls.io/r/GrahamCampbell/Laravel-TestBench) to check everything is working.
* Laravel TestBench uses [Scrutinizer CI](https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-TestBench) and [SensioLabsInsight](https://insight.sensiolabs.com/projects/c70488ec-94bc-44e7-b694-e6dd701416c8) to run additional checks.
* Laravel TestBench uses [Composer](https://getcomposer.org) to load and manage dependencies.
* Laravel TestBench provides a [change log](https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/CHANGELOG.md), [releases](https://github.com/GrahamCampbell/Laravel-TestBench/releases), and [api docs](http://grahamcampbell.github.io/Laravel-TestBench).
* Laravel TestBench is licensed under the Apache License, available [here](https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md).


## System Requirements

* PHP 5.4.7+ or HHVM 3.0+ is required.
* You will need [Laravel 4.1](http://laravel.com) because this package is designed for it.
* You will need [Composer](https://getcomposer.org) installed to load the dependencies of Laravel TestBench.


## Installation

Please check the system requirements before installing Laravel TestBench.

To get the latest version of Laravel TestBench, simply require `"graham-campbell/testbench": "0.3.*@dev"` in your `composer.json` file. You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

Once Laravel TestBench is installed, you can extend or implement the classes in this package, or packages required by this package. The AbstractTestCase class would be a good place to start. There are no service providers to register.


## Configuration

Laravel TestBench requires no configuration. Just follow the simple install instructions and go!


## Usage

There is currently no usage documentation besides the [API Documentation](http://grahamcampbell.github.io/Laravel-TestBench
) for Laravel TestBench.

You may see an example of implementation in pretty much all of my [Laravel 4.1](http://laravel.com) packages.


## Updating Your Fork

Before submitting a pull request, you should ensure that your fork is up to date.

You may fork Laravel TestBench:

    git remote add upstream git://github.com/GrahamCampbell/Laravel-TestBench.git

The first command is only necessary the first time. If you have issues merging, you will need to get a merge tool such as [P4Merge](http://perforce.com/product/components/perforce_visual_merge_and_diff_tools).

You can then update the branch:

    git pull --rebase upstream master
    git push --force origin <branch_name>

Once it is set up, run `git mergetool`. Once all conflicts are fixed, run `git rebase --continue`, and `git push --force origin <branch_name>`.


## Pull Requests

Please review these guidelines before submitting any pull requests.

* When submitting bug fixes, check if a maintenance branch exists for an older series, then pull against that older branch if the bug is present in it.
* Before sending a pull request for a new feature, you should first create an issue with [Proposal] in the title.
* Please follow the [PSR-2 Coding Style](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) and [PHP-FIG Naming Conventions](https://github.com/php-fig/fig-standards/blob/master/bylaws/002-psr-naming-conventions.md).


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
