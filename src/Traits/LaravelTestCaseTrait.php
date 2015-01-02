<?php

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\TestBench\Traits;

use ReflectionClass;

/**
 * This is the laravel test case trait.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
trait LaravelTestCaseTrait
{
    /**
     * Are routing filters enabled?
     *
     * @return bool
     */
    protected function isFiltering()
    {
        $router = $this->app['router'];

        $reflection = new ReflectionClass(get_class($router));
        $property = $reflection->getProperty('filtering');
        $property->setAccessible(true);

        return $property->getValue($router);
    }

    /**
     * Look for matches in the response DOM.
     *
     * @param string $text
     * @param string $element
     *
     * @return \Symfony\Component\DomCrawler\Crawler
     */
    protected function getMatches($text, $element)
    {
        $crawler = $this->client->getCrawler();

        return $crawler->filter("{$element}:contains('{$text}')");
    }

    /**
     * Assert that the text is in the specified element.
     *
     * @param string   $text
     * @param string   $element
     * @param int|null $times
     *
     * @return void
     */
    public function assertSee($text, $element = 'body', $times = null)
    {
        $matches = $this->getMatches($text, $element)->count();

        if (is_int($times)) {
            $msg = "Expected to see '$text' within a '$element' $times times, but counted $matches occurrences.";
            $this->assertSame($times, $matches, $msg);
        } else {
            $msg = "Expected to see '$text' within a '$element' at least once, but counted $matches occurrences.";
            $this->assertGreaterThan(0, $matches, $msg);
        }
    }

    /**
     * Assert that the text is not in the specified element.
     *
     * @param string $text
     * @param string $element
     *
     * @return void
     */
    public function assertNotSee($text, $element = 'body')
    {
        return $this->assertSee($text, $element, 0);
    }

    /**
     * Assert that a class can be automatically injected.
     *
     * @param string $name
     *
     * @return void
     */
    public function assertIsInjectable($name)
    {
        $injectable = true;

        try {
            $class = $this->makeInjectableClass($name);
            $this->assertInstanceOf($name, $class->getInjectedObject());
        } catch (\Exception $e) {
            $injectable = false;
        }

        $this->assertTrue($injectable, "The class '$name' couldn't be automatically injected.");
    }

    /**
     * Register and make a stub class to inject into.
     *
     * @param string $name
     *
     * @return object
     */
    protected function makeInjectableClass($name)
    {
        do {
            $class = 'testBenchStub'.str_random();
        } while (class_exists($class));

        eval("
            class $class
            {
                protected \$object;

                public function __construct(\\$name \$object)
                {
                    \$this->object = \$object;
                }

                public function getInjectedObject()
                {
                    return \$this->object;
                }
            }
        ");

        return $this->app->make($class);
    }
}
