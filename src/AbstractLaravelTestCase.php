<?php

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\TestBench;

use GrahamCampbell\TestBench\Traits\HelperTestCaseTrait;
use GrahamCampbell\TestBench\Traits\LaravelTestCaseTrait;
use Orchestra\Testbench\TestCase;

/**
 * This is the abstract laravel test case class.
 *
 * @author Graham Campbell <graham@mineuk.com>
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

        return [
            'app'     => "{$basePath}/app",
            'public'  => "{$basePath}/public",
            'base'    => $basePath,
            'storage' => "{$basePath}/app/storage",
        ];
    }

    /**
     * Setup the application environment.
     *
     * @param \Illuminate\Foundation\Application $app
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
            return array_merge($this->getRequiredServiceProviders(), [$provider]);
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
        return [];
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
