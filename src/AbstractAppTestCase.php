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

namespace GrahamCampbell\TestBench;

use ReflectionClass;
use RuntimeException;
use GrahamCampbell\TestBench\Traits\HelperTestCaseTrait;
use GrahamCampbell\TestBench\Traits\LaravelTestCaseTrait;
use Orchestra\Testbench\TestCase;

/**
 * This is the abstract app test case class.
 *
 * @author    Graham Campbell <graham@mineuk.com>
 * @copyright 2013-2014 Graham Campbell
 * @license   <https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md> Apache 2.0
 */
abstract class AbstractAppTestCase extends TestCase
{
    use HelperTestCaseTrait, LaravelTestCaseTrait;

    /**
     * Get the base path.
     *
     * @return string
     */
    protected function getBasePath()
    {
        $class = new ReflectionClass($this);

        $parents = [];

        // get an array of all the parent classes
        while ($parent = $class->getParentClass()) {
            $parents[] = $parent->getName();
            $class = $parent;
        }

        // we want to select the penultimate class from the list of parents
        // this is because the class directly extending this must be the
        // abstract test case the user has used in their app
        $pos = count($parents) - 2;

        if ($pos < 0) {
            throw new RuntimeException('The base path could not be automatically determined.');
        }

        // get the filepath of the selected class
        $path = $parents[$pos]->getFileName();

        // return the filepath one up from the folder the selected class is saved in
        return realpath(dirname($path).'/../')
    }

    /**
     * Get application timezone.
     *
     * @param \Illuminate\Foundation\Contracts\Application $app
     *
     * @return string
     */
    protected function getApplicationTimezone($app)
    {
        return $app['config']['app.timezone'];
    }

     /**
     * Get application aliases.
     *
     * @param \Illuminate\Foundation\Contracts\Application $app
     *
     * @return array
     */
    protected function getApplicationAliases($app)
    {
        return $app['config']['app.aliases'];
    }

    /**
     * Get application providers.
     *
     * @param \Illuminate\Foundation\Contracts\Application $app
     *
     * @return array
     */
    protected function getApplicationProviders($app)
    {
        return $app['config']['app.providers'];
    }

    /**
     * Setup the application environment.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $this->additionalSetup($app);
    }

    /**
     * Additional application environment setup.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function additionalSetup($app)
    {
        //
    }

    /**
     * Get the service provider class.
     *
     * @return string
     */
    protected function getServiceProviderClass()
    {
        // this may be overwritten, and must be overwritten
        // if used with the service provider test case trait
    }
}
