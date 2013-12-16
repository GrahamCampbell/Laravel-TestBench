<?php namespace GrahamCampbell\TestBench\Classes;

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
 *
 * @package    Laravel-TestBench
 * @author     Graham Campbell
 * @license    Apache License
 * @copyright  Copyright 2013 Graham Campbell
 * @link       https://github.com/GrahamCampbell/Laravel-TestBench
 */

use Orchestra\Testbench\TestCase;

abstract class TestBench extends TestCase
{
    protected $basepath; // must be set in the extending class

    protected function getEnvironmentSetUp($app)
    {
        $app['path.base'] = realpath($this->basepath);

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', array(
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => ''
        ));
    }
}
