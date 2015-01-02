<?php

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Tests\TestBench;

/**
 * This is the seeing test class.
 *
 * @author Graham Campbell <graham@mineuk.com>
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
