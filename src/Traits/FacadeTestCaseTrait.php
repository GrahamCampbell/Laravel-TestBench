<?php

/**
 * This file is part of Laravel TestBench by Graham Campbell.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at http://bit.ly/UWsjkb.
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
 * @author    Graham Campbell <graham@mineuk.com>
 * @copyright 2013-2014 Graham Campbell
 * @license   <https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md> Apache 2.0
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
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    abstract protected function getServiceProviderClass($app);

    public function testIsAFacade()
    {
        $class = $this->getFacadeClass();
        $reflection = new ReflectionClass($class);
        $facade = new ReflectionClass('Illuminate\Support\Facades\Facade');

        $msg = "Expected class '$class' to be a facade.";

        $this->assertTrue($reflection->isSubclassOf($facade), $msg);
    }

    public function testFacadeAccessor()
    {
        $accessor = $this->getFacadeAccessor();
        $class = $this->getFacadeClass();
        $reflection = new ReflectionClass($class);
        $method = $reflection->getMethod('getFacadeAccessor');
        $method->setAccessible(true);

        $msg = "Expected class '$class' to have an accessor of '$accessor'.";

        $this->assertSame($accessor, $method->invoke(null), $msg);
    }

    public function testFacadeRoot()
    {
        $root = $this->getFacadeRoot();
        $class = $this->getFacadeClass();
        $reflection = new ReflectionClass($class);
        $method = $reflection->getMethod('getFacadeRoot');
        $method->setAccessible(true);

        $msg = "Expected class '$class' to have a root of '$root'.";

        $this->assertInstanceOf($root, $method->invoke(null), $msg);
    }

    public function testServiceProvider()
    {
        $accessor = $this->getFacadeAccessor();
        $provider = $this->getServiceProviderClass($this->app);

        if ($provider) {
            $reflection = new ReflectionClass($provider);
            $method = $reflection->getMethod('provides');
            $method->setAccessible(true);

            $msg = "Expected class '$provider' to provide '$accessor'.";

            $this->assertInArray($accessor, $method->invoke(new $provider($this->app)), true, $msg);
        }
    }
}
