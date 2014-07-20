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

return array(

    /**
     * The paths where the assets will be searched in,
     * relative to the project root
     */
    'search_paths' => array(
        '/workbench',
        '/vendor',
        '/app/assets'
    ),

    /**
     * The directory, relative to "public" where the assets will
     * be published to.
     */
    'public_dir' => 'assets',

    /**
     * Turn on/off assets minification.
     */
    'minify' => false,

    /**
     * The patterns for minified assets.
     * If an asset filename contains one of these patterns,
     * then it will be considered already minified and skip
     * the minification process.
     * Ex. jquery.min.js, yui-min.js
     */
    'minify_patterns' => array('-min.', '.min.'),

    /**
     * Turn on/off assets merge.
     */
    'combine' => false,

    /**
     * The filename of the combined styles.
     */
    'combined_styles' => 'application.css',

    /**
     * The filename of the combined scripts.
     */
    'combined_scripts' => 'application.js',

    /**
     * Turn on/off assets caching.
     */
    'use_cache' => true

);
