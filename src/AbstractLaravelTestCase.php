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

use GrahamCampbell\TestBench\Traits\HelperTestCaseTrait;
use GrahamCampbell\TestBench\Traits\LaravelTestCaseTrait;
use Orchestra\Testbench\TestCase;

/**
 * This is the abstract laravel test case class.
 *
 * @author    Graham Campbell <graham@mineuk.com>
 * @copyright 2013-2014 Graham Campbell
 * @license   <https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md> Apache 2.0
 */
abstract class AbstractLaravelTestCase extends TestCase
{
    use HelperTestCaseTrait, LaravelTestCaseTrait;

    /**
     * Get application paths.
     *
     * @return string[]
     */
    protected function getApplicationPaths()
    {
        $basePath = realpath(__DIR__.'/fixture');

        return array(
            'app'     => "{$basePath}/app",
            'public'  => "{$basePath}/public",
            'base'    => $basePath,
            'storage' => "{$basePath}/app/storage",
        );
    }






    /**
     * Setup the application environment.
     *
     * @param  \Illuminate\Foundation\Application   $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        if ($this->enableFilters()) {
            $app['router']->enableFilters();
        }

        $this->additionalSetup($app);
    }

    /**
     * Specify if routing filters are enabled.
     *
     * @return bool
     */
    protected function enableFilters()
    {
        return false;
    }

    /**
     * Additional application environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function additionalSetup($app)
    {
        //
    }

    /**
     * Get the package service providers.
     *
     * @return string[]
     */
    protected function getPackageProviders()
    {
        $provider = $this->getServiceProviderClass();

        if ($provider) {
            return array_merge($this->getRequiredServiceProviders(), array($provider));
        }

        return $this->getRequiredServiceProviders();
    }

    /**
     * Get the required service providers.
     *
     * @return string[]
     */
    protected function getRequiredServiceProviders()
    {
        return array();
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
