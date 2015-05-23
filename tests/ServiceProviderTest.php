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

use GrahamCampbell\TestBench\Traits\ServiceProviderTestCaseTrait;

/**
 * This is the service provider test class.
 *
 * @author Graham Campbell <graham@cachethq.io>
 */
class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTestCaseTrait;

    public function testFooStubIsInjectable()
    {
        $this->assertIsInjectable('GrahamCampbell\Tests\TestBench\FooStub');
    }

    /**
     * @expectedException PHPUnit_Framework_ExpectationFailedException
     */
    public function testBarStubIsNotInjectable()
    {
        $this->assertIsInjectable('GrahamCampbell\Tests\TestBench\BarStub');
    }

    /**
     * @expectedException PHPUnit_Framework_ExpectationFailedException
     */
    public function testBazStubIsNotInjectable()
    {
        $this->assertIsInjectable('GrahamCampbell\Tests\TestBench\BazStub');
    }

    public function testFooStub()
    {
        $result = $this->app->make('GrahamCampbell\Tests\TestBench\FooStub')->getBar();
        $this->assertSame('baz', $result);
    }
}
