<?php

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\TestBench\Traits;

use ReflectionClass;

/**
 * This is the service orovider test case trait.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
trait ServiceProviderTestCaseTrait
{
    /**
     * Get the service provider class.
     *
     * @return string
     */
    abstract protected function getServiceProviderClass();

    public function testIsAServiceProvider()
    {
        $class = $this->getServiceProviderClass();

        $reflection = new ReflectionClass($class);

        $serviceprovider = new ReflectionClass('Illuminate\Support\ServiceProvider');

        $msg = "Expected class '$class' to be a service provider.";

        $this->assertTrue($reflection->isSubclassOf($serviceprovider), $msg);
    }

    public function testProvides()
    {
        $class = $this->getServiceProviderClass();
        $reflection = new ReflectionClass($class);

        $method = $reflection->getMethod('provides');
        $method->setAccessible(true);

        $msg = "Expected class '$class' to provide a valid list of services.";

        $this->assertInternalType('array', $method->invoke(new $class($this->app)), $msg);
    }
}
