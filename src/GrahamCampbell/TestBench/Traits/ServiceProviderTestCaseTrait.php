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
 * @copyright  Copyright 2013 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-TestBench/blob/develop/LICENSE.md
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

    public function testIsAClass()
    {
        $serviceprovider = $this->getServiceProviderClass();

        $this->assertTrue(is_object(new $serviceprovider($this->app)));
    }

    public function testIsAServiceProvider()
    {
        $reflection = new ReflectionClass($this->getServiceProviderClass());
        $serviceprovider = new ReflectionClass('Illuminate\Support\ServiceProvider');

        $this->assertTrue($this->getReflection()->isSubclassOf($serviceprovider));
    }

    public function testDeferred()
    {
        $reflection = new ReflectionClass($this->getServiceProviderClass());
        $method = $reflection->getMethod("isDeferred");
        $method->setAccessible(true);

        $serviceprovider = $this->getServiceProviderClass();

        $this->assertEquals($this->getServiceProviderDeferred(), $method->invoke(new $serviceprovider($this->app)));
    }

    public function testProvides()
    {
        $reflection = new ReflectionClass($this->getServiceProviderClass());
        $method = $reflection->getMethod("provides");
        $method->setAccessible(true);

        $serviceprovider = $this->getServiceProviderClass();

        $this->assertTrue(is_array($method->invoke(new $serviceprovider($this->app))));
    }
}
