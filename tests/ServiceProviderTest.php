<?php

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Tests\TestBench;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;

/**
 * This is the service provider test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testFooStubIsInjectable()
    {
        $this->assertIsInjectable(FooStub::class);
    }

    /**
     * @expectedException PHPUnit_Framework_ExpectationFailedException
     */
    public function testBarStubIsNotInjectable()
    {
        $this->assertIsInjectable(BarStub::class);
    }

    /**
     * @expectedException PHPUnit_Framework_ExpectationFailedException
     */
    public function testBazStubIsNotInjectable()
    {
        $this->assertIsInjectable(BazStub::class);
    }

    /**
     * @depends testFooStubIsInjectable
     */
    public function testFooStub()
    {
        $result = $this->app->make(FooStub::class)->getBar();
        $this->assertSame('baz', $result);
    }
}
