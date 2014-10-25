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

/**
 * This is the laravel test case trait.
 *
 * @author    Graham Campbell <graham@mineuk.com>
 * @copyright 2013-2014 Graham Campbell
 * @license   <https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md> Apache 2.0
 */
trait LaravelTestCaseTrait
{
    /**
     * Assert that a class can be automatically injected.
     *
     * @param string $name
     *
     * @return void
     */
    public function assertIsInjectable($name)
    {
        $injectable = true;

        try {
            $class = $this->makeInjectableClass($name);
            $this->assertInstanceOf($name, $class->getInjectedObject());
        } catch (\Exception $e) {
            $injectable = false;
        }

        $this->assertTrue($injectable, "The class '$name' couldn't be automatically injected.");
    }

    /**
     * Register and make a stub class to inject into.
     *
     * @param string $name
     *
     * @return object
     */
    protected function makeInjectableClass($name)
    {
        do {
            $class = 'testBenchStub'.str_random();
        } while (class_exists($class));

        eval("
            class $class
            {
                protected \$object;

                public function __construct(\\$name \$object)
                {
                    \$this->object = \$object;
                }

                public function getInjectedObject()
                {
                    return \$this->object;
                }
            }
        ");

        return $this->app->make($class);
    }
}
