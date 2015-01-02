<?php

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Tests\TestBench;

use GrahamCampbell\TestBench\Traits\FacadeTestCaseTrait;

/**
 * This is the facade test class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
class FacadeTest extends AbstractTestCase
{
    use FacadeTestCaseTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'testbench.foostub';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return 'GrahamCampbell\Tests\TestBench\FooFacade';
    }

    /**
     * Get the facade route.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return 'GrahamCampbell\Tests\TestBench\FooStub';
    }
}
