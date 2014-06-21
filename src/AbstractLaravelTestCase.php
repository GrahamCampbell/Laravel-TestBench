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

namespace GrahamCampbell\TestBench;

use Orchestra\Testbench\TestCase;
use GrahamCampbell\TestBench\Traits\HelperTestCaseTrait;
use GrahamCampbell\TestBench\Traits\LaravelTestCaseTrait;

/**
 * This is the abstract laravel test case class.
 *
 * @package    Laravel-TestBench
 * @author     Graham Campbell
 * @copyright  Copyright 2013-2014 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-TestBench
 */
abstract class AbstractLaravelTestCase extends TestCase
{
    use HelperTestCaseTrait, LaravelTestCaseTrait;

    /**
     * Get the application base path.
     *
     * @return string
     */
    abstract protected function getBasePath();

    /**
     * Setup the application environment.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['path.base'] = realpath($this->getBasePath());

        $app['config']->set('cache.driver', 'array');

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', array(
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => ''
        ));

        $app['config']->set('mail.pretend', true);

        $app['config']->set('session.driver', 'array');

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
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function additionalSetup($app)
    {
        //
    }

    /**
     * Get the package service providers.
     *
     * @return array
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
     * @return array
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
        return null;
    }
}
