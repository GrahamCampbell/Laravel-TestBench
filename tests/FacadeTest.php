<?php

declare(strict_types=1);

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <hello@gjcampbell.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Tests\TestBench;

use GrahamCampbell\TestBenchCore\FacadeTrait;

/**
 * This is the facade test class.
 *
 * @author Graham Campbell <hello@gjcampbell.co.uk>
 */
class FacadeTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'testbench.foostub';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected static function getFacadeClass()
    {
        return FooFacade::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected static function getFacadeRoot()
    {
        return FooStub::class;
    }
}
