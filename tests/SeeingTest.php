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

/**
 * This is the seeing test class.
 *
 * @author    Graham Campbell <graham@mineuk.com>
 * @copyright 2013-2014 Graham Campbell
 * @license   <https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md> Apache 2.0
 */
class SeeingTest extends AbstractTestCase
{
    public function testNotSee()
    {
        $this->app['router']->get('test-route', function () {
            return '<html><head></head><body><p>Hello World</p></body></html>';
        });

        $this->call('GET', 'test-route')->getContent();

        $this->assertNotSee('Laravel');
        $this->assertNotSee('Laravel', 'p');
    }

    public function testSeeOnce()
    {
        $this->app['router']->get('test-route', function () {
            return '<html><head></head><body><p>Hello World</p></body></html>';
        });

        $this->call('GET', 'test-route')->getContent();

        $this->assertSee('Hello World');
        $this->assertSee('Hello World', 'p');
        $this->assertSee('Hello World', 'p', 1);
        $this->assertSee('Hello World', 'body', 1);
    }

    public function testSeeTwice()
    {
        $this->app['router']->get('test-route', function () {
            return '<html><head></head><body><h1>Hello World</h1><p>Hello World</p><p>Hello World</p></body></html>';
        });

        $this->call('GET', 'test-route')->getContent();

        $this->assertSee('Hello World');
        $this->assertSee('Hello World', 'h1');
        $this->assertSee('Hello World', 'p');
        $this->assertSee('Hello World', 'h1', 1);
        $this->assertSee('Hello World', 'p', 2);
        $this->assertSee('Hello World', 'body', 1);
    }
}
