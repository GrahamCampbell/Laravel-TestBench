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

    public function testFooStubIsInjectable(): void
    {
        self::assertIsInjectable(FooStub::class);
    }

    public function testBarStubIsNotInjectable(): void
    {
        $this->expectException(ExpectationFailedException::class);
        self::assertIsInjectable(BarStub::class);
    }

    public function testBazStubIsNotInjectable(): void
    {
        $this->expectException(ExpectationFailedException::class);
        self::assertIsInjectable(BazStub::class);
    }

    /**
     * @depends testFooStubIsInjectable
     */
    public function testFooStub(): void
    {
        $result = $this->app->make(FooStub::class)->getBar();
        self::assertSame('baz', $result);
    }
}
