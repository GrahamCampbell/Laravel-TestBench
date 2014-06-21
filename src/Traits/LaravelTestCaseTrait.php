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

namespace GrahamCampbell\TestBench\Traits;

/**
 * This is the laravel test case trait.
 *
 * @package    Laravel-TestBench
 * @author     Graham Campbell
 * @copyright  Copyright 2013-2014 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-TestBench/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-TestBench
 */
trait LaravelTestCaseTrait
{
    /**
     * Look for matches in the response DOM.
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
     * @param  string    $text
     * @param  string    $element
     * @param  int|null  $times
     * @return void
     */
    protected function assertSee($text, $element = 'body', $times = null)
    {
        $matches = count($this->getMatches($text, $element));

        if (is_int($times)) {
            $msg = "Expected to see '$text' within a '$element' $times times, but counted $matches occurrences.";
            $this->assertEquals($times, $matches, $msg);
        } else {
            $msg = "Expected to see '$text' within a '$element' at least once, but counted $matches occurrences.";
            $this->assertGreaterThan(0, $matches, $msg);
        }
    }

    /**
     * Assert that the text is not in the specified element.
     *
     * @param  string  $text
     * @param  string  $element
     * @return void
     */
    protected function assertNotSee($text, $element = 'body')
    {
        return $this->assertSee($text, $element, 0);
    }

    /**
     * Assert that a class can be automatically injected.
     *
     * @param  string  $name
     * @return void
     */
    protected function assertIsInjectable($name)
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
     * @param  string  $name
     * @return mixed
     */
    protected function makeInjectableClass($name)
    {
        $class = str_random(64);

        eval("
            class $class {
                protected \$object;
                __construct(\\$name \$object) {
                    \$this->object = \$object;
                }
                public function getInjectedObject() {
                    return \$this->object;
                }
            }
        ");

        return $this->app->make($class);
    }
}
