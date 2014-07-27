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

use GrahamCampbell\TestBench\AbstractTestCase as AbstractTestBenchTestCase;

/**
 * This is the helpers test class.
 *
 * @author    Graham Campbell <graham@mineuk.com>
 * @copyright 2013-2014 Graham Campbell
 * @license   <https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md> Apache 2.0
 */
class HelpersTest extends AbstractTestBenchTestCase
{
    public function testInArray()
    {
        $this->assertInArray('foo', array('foo'));
    }

    /**
     * @expectedException PHPUnit_Framework_ExpectationFailedException
     */
    public function testNotInArray()
    {
        $this->assertInArray('foo', array('bar'));
    }

    public function testMethodDoesExist()
    {
        $this->assertMethodExists('getBar', 'GrahamCampbell\Tests\TestBench\FooStub');
    }

    /**
     * @expectedException PHPUnit_Framework_ExpectationFailedException
     */
    public function testMethodDoesNotExist()
    {
        $this->assertMethodExists('getFoo', 'GrahamCampbell\Tests\TestBench\FooStub');
    }
}
