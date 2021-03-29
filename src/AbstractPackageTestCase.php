<?php

declare(strict_types=1);

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\TestBench;

use GrahamCampbell\TestBenchCore\HelperTrait;
use GrahamCampbell\TestBenchCore\LaravelTrait;
use GrahamCampbell\TestBenchCore\MockeryTrait;
use Orchestra\Testbench\TestCase;

/**
 * This is the abstract package test case class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
abstract class AbstractPackageTestCase extends TestCase
{
    use HelperTrait;
    use LaravelTrait;
    use MockeryTrait;

    /**
     * Setup the application environment.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app->config->set('app.key', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');

        $app->config->set('cache.driver', 'array');

        $app->config->set('database.default', 'sqlite');
        $app->config->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app->config->set('mail.driver', 'log');

        $app->config->set('session.driver', 'array');
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
     * @return string
     */
    protected function getServiceProviderClass()
    {
        // this may be overwritten, and must be overwritten
        // if used with the service provider test case trait
    }
}
