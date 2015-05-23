<?php

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <graham@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Tests\TestBench;

use GrahamCampbell\TestBench\AbstractTestCase as AbstractTestBenchTestCase;

/**
 * This is the helpers test class.
 *
 * @author Graham Campbell <graham@cachethq.io>
 */
class HelpersTest extends AbstractTestBenchTestCase
{
    public function testInArray()
    {
        $this->assertInArray('foo', ['foo']);
    }

    /**
     * @expectedException PHPUnit_Framework_ExpectationFailedException
     */
    public function testNotInArray()
    {
        $this->assertInArray('foo', ['bar']);
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

    public function testInJson()
    {
        $this->assertInJson('{"foo":"bar"}', ['foo' => 'bar']);
        $this->assertInJson('{ "foo": "bar", "bar": "baz" }', ['foo' => 'bar']);
        $this->assertInJson('{ "foo": "bar", "bar": "baz" }', ['bar' => 'baz']);
    }

    /**
     * @expectedException PHPUnit_Framework_ExpectationFailedException
     */
    public function testNotInJson()
    {
        $this->assertInJson('{"foo":"baz"}', ['foo' => 'bar']);
        $this->assertInJson('{ "foo": "bar", "bar": "baz" }', ['foo' => 'baz']);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBadJsonInNotInJson()
    {
        $this->assertInJson('foobar', ['foo' => 'bar']);
    }
}
