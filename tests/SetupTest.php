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

use GrahamCampbell\TestBench\AbstractLaravelTestCase;

/**
 * This is the setup test class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
class SetupTest extends AbstractLaravelTestCase
{
    /**
     * Specify if routing filters are enabled.
     *
     * @return bool
     */
    protected function enableFilters()
    {
        return true;
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

    public function testFilters()
    {
        $this->assertTrue($this->isFiltering(), 'Expected filtering to be enabled.');
    }
}
