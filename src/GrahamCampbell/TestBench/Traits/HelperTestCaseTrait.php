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

namespace GrahamCampbell\TestBench\Traits;

use Mockery;

/**
 * This is the helper test case trait.
 *
 * @package    Laravel-TestBench
 * @author     Graham Campbell
 * @copyright  Copyright 2013 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-TestBench/blob/develop/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-TestBench
 */
trait HelperTestCaseTrait
{
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
        // call more setup methods
    }

    /**
     * Tear down the test case.
     *
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();

        $this->finish();
    }

    /**
     * Run extra tear down code.
     *
     * @return void
     */
    protected function finish()
    {
        // call more tear down methods
    }

    /**
     * Assert that the element exists in the array.
     *
     * @param  mixed   $needle
     * @param  array   $haystack
     * @param  bool    $strict
     * @param  string  $msg
     * @return void
     */
    protected function assertInArray($needle, $haystack, $msg = '')
    {
        if ($msg = '') {
            $msg = "Expected the array to contain the element '$needle'.";
        }

        $this->assertTrue(in_array($needle, $haystack, true), $msg);
    }

    /**
     * Assert that the specified method exists on the class.
     *
     * @param  string  $method
     * @param  string  $class
     * @param  string  $msg
     * @return void
     */
    protected function assertMethodExists($method, $class, $msg = '')
    {
        if ($msg = '')) {
            $msg = "Expected the class '$class' to have method '$method'.";
        }

        $this->assertTrue(method_exists($class, $method), $msg);
    }
}
