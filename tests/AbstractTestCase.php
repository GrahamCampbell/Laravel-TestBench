<?php

/**
 * This file is part of Laravel TestBench by Graham Campbell.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace GrahamCampbell\Tests\TestBench;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;
use GrahamCampbell\TestBench\AbstractLaravelTestCase;

/**
 * This is the abstract test case class.
 *
 * @package    Laravel-TestBench
 * @author     Graham Campbell
 * @copyright  Copyright 2013-2014 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-TestBench
 */
abstract class AbstractTestCase extends AbstractLaravelTestCase
{
    /**
     * Get the service provider class.
     *
     * @return string
     */
    protected function getServiceProviderClass()
    {
        return 'GrahamCampbell\Tests\TestBench\ServiceProviderStub';
    }
}

class ServiceProviderStub extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bindShared('testbench.foostub', function ($app) {
            return new FooStub('baz');
        });

        $this->app->alias('testbench.foostub', 'GrahamCampbell\Tests\TestBench\FooStub');
    }

    public function provides()
    {
        return array(
            'testbench.foostub'
        );
    }
}

class FooFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'testbench.foostub';
    }
}

class FooStub
{
    protected $bar;

    public function __construct($bar)
    {
        $this->bar = $bar;
    }

    public function getBar()
    {
        return $this->bar;
    }
}

class BarStub
{
    protected $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    public function getFoo()
    {
        return $this->foo;
    }
}
