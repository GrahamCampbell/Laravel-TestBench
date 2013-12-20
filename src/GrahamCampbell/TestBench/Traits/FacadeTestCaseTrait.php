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
trait FacadeTestCaseTrait
{
    /**
     * Get the facade accessor.
     *
     * @return string
     */
    abstract protected function getFacadeAccessor();

    /**
     * Get the facade class.
     *
     * @return string
     */
    abstract protected function getFacadeClass();

    /**
     * Get the facade route.
     *
     * @return string
     */
    abstract protected function getFacadeRoot();

    /**
     * Get the service provider class.
     *
     * @return string
     */
    protected function getServiceProviderClass()
    {
        return null;
    }

    public function testIsAClass()
    {
        $facade = $this->getFacadeClass();

        $this->assertTrue(is_object(new $facade()));
    }

    public function testIsAFacade()
    {
        $reflection = new ReflectionClass($this->getFacadeClass());
        $facade = new ReflectionClass('Illuminate\Support\Facades\Facade');

        $this->assertTrue($reflection->isSubclassOf($facade));
    }

    public function testFacadeAccessor()
    {
        $reflection = new ReflectionClass($this->getFacadeClass());
        $method = $reflection->getMethod("getFacadeAccessor");
        $method->setAccessible(true);

        $this->assertEquals($this->getFacadeAccessor(), $method->invoke(null));
    }

    public function testFacadeRoot()
    {
        $reflection = new ReflectionClass($this->getFacadeClass());
        $method = $reflection->getMethod("getFacadeRoot");
        $method->setAccessible(true);

        $this->assertInstanceOf($this->getFacadeRoot(), $method->invoke(null));
    }

    public function testServiceProvider()
    {
        if ($this->getServiceProviderClass()) {
            $reflection = new ReflectionClass($this->getServiceProviderClass());
            $method = $reflection->getMethod("provides");
            $method->setAccessible(true);

            $serviceprovider = $this->getServiceProviderClass();

            $this->assertTrue(in_array($this->getFacadeAccessor(), $method->invoke(new $serviceprovider())));
        }
    }
}
