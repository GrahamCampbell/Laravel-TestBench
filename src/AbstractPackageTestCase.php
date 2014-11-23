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
 * This is the abstract package test case class.
 *
 * @author    Graham Campbell <graham@mineuk.com>
 * @copyright 2013-2014 Graham Campbell
 * @license   <https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md> Apache 2.0
 */
abstract class AbstractPackageTestCase extends TestCase
{
    use HelperTestCaseTrait, LaravelTestCaseTrait;


    /**
     * Setup the application environment.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('cache.driver', 'array');

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app['config']->set('mail.drive', 'log');

        $app['config']->set('session.driver', 'array');

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
     * Get the package service providers.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string[]
     */
    protected function getPackageProviders($app)
    {
        $provider = $this->getServiceProviderClass($app);

        if ($provider) {
            return array_merge($this->getRequiredServiceProviders($app), [$provider]);
        }

        return $this->getRequiredServiceProviders($app);
    }

    /**
     * Get the required service providers.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string[]
     */
    protected function getRequiredServiceProviders($app)
    {
        return [];
    }

    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        // this may be overwritten, and must be overwritten
        // if used with the service provider test case trait
    }    
}
