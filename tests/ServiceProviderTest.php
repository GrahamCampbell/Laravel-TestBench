<?php

declare(strict_types=1);

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <hello@gjcampbell.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Tests\TestBench;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use PHPUnit\Framework\ExpectationFailedException;

/**
 * This is the service provider test class.
 *
 * @author Graham Campbell <hello@gjcampbell.co.uk>
 */
class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testFooStubIsInjectable()
    {
        $this->assertIsInjectable(FooStub::class);
    }

    public function testBarStubIsNotInjectable()
    {
        $this->expectException(ExpectationFailedException::class);
        $this->assertIsInjectable(BarStub::class);
    }

    public function testBazStubIsNotInjectable()
    {
        $this->expectException(ExpectationFailedException::class);
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
