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

use ReflectionClass;

/**
 * This is the facade test case trait.
 *
 * @package    Laravel-TestBench
 * @author     Graham Campbell
 * @copyright  Copyright 2013-2014 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-TestBench
 */
trait ServiceProviderTestCaseTrait
{
    /**
     * Get the service provider class.
     *
     * @return string
     */
    abstract protected function getServiceProviderClass();

    /**
     * Get the service provider deferred status.
     *
     * @return bool
     */
    protected function getServiceProviderDeferred()
    {
        return false;
    }

    public function testIsAServiceProvider()
    {
        $class = $this->getServiceProviderClass();

        $reflection = new ReflectionClass($class);

        $serviceprovider = new ReflectionClass('Illuminate\Support\ServiceProvider');

        $msg = "Expected class '$class' to be a service provider.";

        $this->assertTrue($reflection->isSubclassOf($serviceprovider), $msg);
    }

    public function testDeferred()
    {
        $class = $this->getServiceProviderClass();
        $deferred = $this->getServiceProviderDeferred();

        $reflection = new ReflectionClass($class);

        $method = $reflection->getMethod("isDeferred");
        $method->setAccessible(true);

        if ($deferred) {
            $msg = "Expected class '$class' to be deferred.";
        } else {
            $msg = "Expected class '$class' not to be deferred.";
        }

        $this->assertEquals($deferred, $method->invoke(new $class($this->app)), $msg);
    }

    public function testProvides()
    {
        $class = $this->getServiceProviderClass();
        $reflection = new ReflectionClass($class);

        $method = $reflection->getMethod("provides");
        $method->setAccessible(true);

        $msg = "Expected class '$class' to provide a valid list of services.";

        $this->assertInternalType('array', $method->invoke(new $class($this->app)), $msg);
    }
}
