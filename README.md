Laravel TestBench
=================


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/GrahamCampbell/Laravel-TestBench/trend.png)](https://bitdeli.com/free "Bitdeli Badge")
[![Build Status](https://travis-ci.org/GrahamCampbell/Laravel-TestBench.png?branch=develop)](https://travis-ci.org/GrahamCampbell/Laravel-TestBench)
[![Coverage Status](https://coveralls.io/repos/GrahamCampbell/Laravel-TestBench/badge.png?branch=develop)](https://coveralls.io/r/GrahamCampbell/Laravel-TestBench)
[![Scrutinizer Quality Stestbench](https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-TestBench/badges/quality-score.png?s=b02a2e89a150f28d8c82129d69688725a2a58cb8)](https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-TestBench)
[![Latest Version](https://poser.pugx.org/graham-campbell/testbench/v/stable.png)](https://packagist.org/packages/graham-campbell/testbench)
[![Still Maintained](http://stillmaintained.com/GrahamCampbell/Laravel-TestBench.png)](http://stillmaintained.com/GrahamCampbell/Laravel-TestBench)


## What Is Laravel TestBench?

Laravel TestBench provides some testing functionality for [Laravel 4.1](http://laravel.com).  

* Laravel TestBench was created by, and is maintained by [Graham Campbell](https://github.com/GrahamCampbell).  
* Laravel TestBench uses [Travis CI](https://travis-ci.org/GrahamCampbell/Laravel-TestBench) to run tests to check if it's working as it should.  
* Laravel TestBench uses [Scrutinizer CI](https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-TestBench) and [Coveralls](https://coveralls.io/r/GrahamCampbell/Laravel-TestBench) to run additional tests and checks.  
* Laravel TestBench uses [Composer](https://getcomposer.org) to load and manage dependencies.  
* Laravel TestBench provides a [change log](https://github.com/GrahamCampbell/Laravel-TestBench/blob/develop/CHANGELOG.md), [releases](https://github.com/GrahamCampbell/Laravel-TestBench/releases), and a [wiki](https://github.com/GrahamCampbell/Laravel-TestBench/wiki).  
* Laravel TestBench is licensed under the Apache License, available [here](https://github.com/GrahamCampbell/Laravel-TestBench/blob/develop/LICENSE.md).  


## System Requirements

* PHP 5.4.7+ or PHP 5.5+ is required.  
* You will need [Laravel 4.1](http://laravel.com) because this package is designed for it.  
* You will need [Composer](https://getcomposer.org) installed to load the dependencies of Laravel TestBench.  


## Installation

Please check the system requirements before installing Laravel TestBench.  

To get the latest version of Laravel TestBench, simply require it in your `composer.json` file.  

`"graham-campbell/testbench": "*"`  

For the time being, you will also need to add this to your `composer.json` too.  

```
"repositories": [
    {
        "type": "package",
        "package": {
            "name": "sebastianbergmann/phpcov",
            "version": "1.1.0",
            "dist": {
                "url": "https://github.com/sebastianbergmann/phpcov/archive/1.1.0.zip",
                "type": "zip"
            },
            "source": {
                "url": "https://github.com/sebastianbergmann/phpcov.git",
                "type": "git",
                "reference": "1.1.0"
            },
            "bin": [
                "phpcov.php"
            ]
        }
    }
],
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.  

Once Laravel TestBench is installed, you can extend or implement the classes in this package, or packages required by this package. The AbstractTestCase class would be a good place to start. There are no service providers to register.  


## Usage

There is currently no usage documentation besides the [API Documentation](http://grahamcampbell.github.io/Laravel-TestBench
) for Laravel TestBench.  

You may see an example of implementation in pretty much all of my [Laravel 4.1](http://laravel.com) packages.  


## Updating Your Fork

The latest and greatest source can be found on [GitHub](https://github.com/GrahamCampbell/Laravel-TestBench).  
Before submitting a pull request, you should ensure that your fork is up to date.  

You may fork Laravel TestBench:  

    git remote add upstream git://github.com/GrahamCampbell/Laravel-TestBench.git

The first command is only necessary the first time. If you have issues merging, you will need to get a merge tool such as [P4Merge](http://perforce.com/product/components/perforce_visual_merge_and_diff_tools).  

You can then update the branch:  

    git pull --rebase upstream develop
    git push --force origin <branch_name>

Once it is set up, run `git mergetool`. Once all conflicts are fixed, run `git rebase --continue`, and `git push --force origin <branch_name>`.  


## Pull Requests

Please submit pull requests against the develop branch.  

* Any pull requests made against the master branch will be closed immediately.  
* If you plan to fix a bug, please create a branch called `fix-`, followed by an appropriate name.  
* If you plan to add a feature, please create a branch called `feature-`, followed by an appropriate name.  
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
