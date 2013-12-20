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
     * Get the facade instance.
     *
     * @return \Illuminate\Support\Facades\Facade
     */
    protected function getFacade()
    {
        return new $this->getFacadeClass();
    }

    /**
     * Get the facade reflection class.
     *
     * @return \ReflectionClass
     */
    protected function getReflection()
    {
        return new new ReflectionClass($this->getFacadeClass());
    }

    public function testIsAFacade()
    {
        $this->assertInstanceOf('Illuminate\Support\Facades\Facade', $this->getFacade());
    }

    public function testFacadeAccessor()
    {
        $method = $this->getReflection()->getMethod("getFacadeAccessor");
        $method->setAccessible(true);

        $this->assertEquals($this->getFacadeAccessor(), $method->invoke(null));
    }

    public function testFacadeRoot()
    {
        $method = $this->getReflection()->getMethod("getFacadeRoot");
        $method->setAccessible(true);

        $this->assertInstanceOf($this->getFacadeRoot(), $method->invoke(null));
    }
}
