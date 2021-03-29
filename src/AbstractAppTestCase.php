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
use Illuminate\Foundation\Application;
use Orchestra\Database\MigrationServiceProvider;
use Orchestra\Testbench\TestCase;
use ReflectionClass;
use RuntimeException;

/**
 * This is the abstract app test case class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
abstract class AbstractAppTestCase extends TestCase
{
    use HelperTrait;
    use LaravelTrait;
    use MockeryTrait;

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
        $pos = count($parents) - 5;

        if ($pos < 0) {
            throw new RuntimeException('The base path could not be automatically determined.');
        }

        // get the reflection class for the selected class
        $selected = new ReflectionClass($parents[$pos]);

        // get the filepath of the selected class
        $path = $selected->getFileName();

        // return the filepath one up from the folder the selected class is saved in
        return realpath(dirname($path).'/../');
    }

    /**
     * Get application aliases.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return array
     */
    protected function getApplicationAliases($app)
    {
        return $app->config['app.aliases'];
    }

    /**
     * Get application providers.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return array
     */
    protected function getApplicationProviders($app)
    {
        if (class_exists(MigrationServiceProvider::class)) {
            return array_merge($app->config['app.providers'], [MigrationServiceProvider::class]);
        }

        return $app->config['app.providers'];
    }

    /**
     * Resolve application implementation.
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    protected function resolveApplication()
    {
        return new Application($this->getBasePath());
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
