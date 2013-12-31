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

use Mockery;

/**
 * This is the relation test case trait.
 *
 * @package    Laravel-TestBench
 * @author     Graham Campbell
 * @copyright  Copyright 2013 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-TestBench/blob/develop/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-TestBench
 */
trait RelationTestCaseTrait
{
    /**
     * Assert a one-to-one relationship exists.
     *
     * @param  string  $parent
     * @param  string  $child
     * @return void
     */
    protected function assertHasOne($relation, $class)
    {
        $this->assertRelationship($relation, $class, 'hasOne', 'HasOne');
    }

    /**
     * Assert a polymorphic one-to-one relationship exists.
     *
     * @param  string  $parent
     * @param  string  $child
     * @return void
     */
    protected function assertMorphOne($relation, $class)
    {
        $this->assertRelationship($relation, $class, 'morphOne', 'MorphOne');
    }

    /**
     * Assert an inverse one-to-one relationship exists.
     *
     * @param  string  $parent
     * @param  string  $child
     * @return void
     */
    protected function assertBelongsTo($parent, $child)
    {
        $this->assertRelationship($parent, $child, 'belongsTo', 'BelongsTo');
    }

    /**
     * Assert a polymorphic inverse one-to-one relationship exists.
     *
     * @param  string  $parent
     * @param  string  $child
     * @return void
     */
    protected function assertMorphTo($relation, $class)
    {
        $this->assertRelationship($relation, $class, 'morphTo', 'BelongsTo');
    }

    /**
     * Assert a one-to-many relationship exists.
     *
     * @param  string  $parent
     * @param  string  $child
     * @return void
     */
    protected function assertHasMany($relation, $class)
    {
        $this->assertRelationship($relation, $class, 'hasMany', 'HasMany');
    }

    /**
     * Assert a has-many-through relationship exists.
     *
     * @param  string  $parent
     * @param  string  $child
     * @return void
     */
    protected function assertHasManyThrough($relation, $class)
    {
        $this->assertRelationship($relation, $class, 'hasManyThrough', 'HasManyThrough');
    }

    /**
     * Assert a polymorphic one-to-many relationship exists.
     *
     * @param  string  $parent
     * @param  string  $child
     * @return void
     */
    protected function assertMorphMany($relation, $class, $morphable)
    {
        $this->assertRelationship($relation, $class, 'morphMany', 'MorphMany');
    }

    /**
     * Assert a many-to-many relationship exists.
     *
     * @param  string  $parent
     * @param  string  $child
     * @return void
     */
    protected function assertBelongsToMany($parent, $child)
    {
        $this->assertRelationship($parent, $child, 'belongsToMany', 'BelongsToMany');
    }

    /**
     * Assert a polymorphic many-to-many relationship exists.
     *
     * @param  string  $parent
     * @param  string  $child
     * @return void
     */
    protected function assertMorphToMany($parent, $child)
    {
        $this->assertRelationship($parent, $child, 'morphToMany', 'MorphToMany');
    }

    /**
     * Assert a polymorphic inverse many-to-many relationship exists.
     *
     * @param  string  $parent
     * @param  string  $child
     * @return void
     */
    protected function assertMorphByMany($parent, $child)
    {
        $this->assertRelationship($parent, $child, 'morphByMany', 'MorphToMany');
    }

    /**
     * Assert a specified relationship exists.
     *
     * @param  string  $relationship
     * @param  string  $parent
     * @param  string  $child
     * @param  string  $relation
     * @return void
     */
    private function assertRelationship($relationship, $class, $type, $relation)
    {
        $this->assertMethodExists($relationship, $class);

        $this->assertRelationshipClass($relationship, $class, $type, $relation);
    }

    /**
     * Assert a specified relationship exists.
     *
     * @param  string  $relationship
     * @param  string  $parent
     * @param  string  $child
     * @param  string  $relation
     * @return void
     */
    private function assertRelationshipClass($relationship, $class, $type, $relation)
    {
        $class = Mockery::mock($class."[$type]");

        $relation = 'Illuminate\Database\Eloquent\Relations\\'.$relation;

        $mock = Mockery::mock($relation);

        $args = $this->getArgumentsRelationship($relationship, $class, $type);

        switch (count($args)) {
            case 1 :
                $class->shouldReceive($type)->once()
                    ->with('/'.str_singular($relationship).'/i')->andReturn($mock);
                break;
            case 2 :
                $class->shouldReceive($type)->once()
                    ->with('/'.str_singular($relationship).'/i', $args[1])->andReturn($mock);
                break;
            case 3 :
                $class->shouldReceive($type)->once()
                    ->with('/'.str_singular($relationship).'/i', $args[1], $args[2])->andReturn($mock);
                break;
            case 4 :
                $class->shouldReceive($type)->once()
                    ->with('/'.str_singular($relationship).'/i', $args[1], $args[2], $args[3])->andReturn($mock);
                break;
            default :
                $class->shouldReceive($type)->once()->andReturn($mock);
                break;
        }

        $msg = "Expected the relationship object to be an instance of '$relation'.";

        $this->assertEquals($mock, $class->$relationship(), $msg);
    }

    /**
     * Get the relationship arguments.
     *
     * @param  string  $relationship
     * @param  string  $class
     * @param  string  $type
     * @return void
     */
    private function getArgumentsRelationship($relationship, $class, $type)
    {
        $mocked = Mockery::mock($class."[$type]");

        $mocked->shouldReceive($type)->once()->andReturnUsing(function () {
            return func_get_args();
        });

        return $mocked->$relationship();
    }
}
