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

namespace GrahamCampbell\TestBench\Classes;

use Orchestra\Testbench\TestCase;

/**
 * This is the abstract test case class.
 *
 * @package    Laravel-TestBench
 * @author     Graham Campbell
 * @copyright  Copyright 2013 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-TestBench/blob/develop/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-TestBench
 */
abstract class AbstractTestCase extends TestCase
{
    /**
     * Get the application base path.
     *
     * @return string
     */
    abstract protected function getBasePath();

    /**
     * Setup the application environment.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['path.base'] = realpath($this->getBasePath());

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', array(
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => ''
        ));
    }

    /**
     * Setup the test case.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->start();
    }

    /**
     * Run extra setup code.
     *
     * @return void
     */
    protected function start()
    {
        // define more setup methods
    }

    /**
     * Tear down the test case.
     *
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();

        $this->finish();
    }

    /**
     * Run extra tear down code.
     *
     * @return void
     */
    protected function finish()
    {
        // define more tear down methods
    }
}
