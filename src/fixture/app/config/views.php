<?php

/*
 * This file is part of Laravel TestBench by Graham Campbell.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at http://bit.ly/UWsjkb.
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

return array(

    /*
    |--------------------------------------------------------------------------
    | Page Layout
    |--------------------------------------------------------------------------
    |
    | This specifies the view that most views in Laravel Platform extend.
    | Note that changing this view is not recommended can can brake "partials"
    | settings further down this file.
    |
    */

    'default' => 'layouts.default',

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    |
    | This specifies the view that email views in Laravel Platform extend.
    |
    */

    'email' => 'layouts.email',

    /*
    |--------------------------------------------------------------------------
    | Error Page
    |--------------------------------------------------------------------------
    |
    | This specifies the view that is used for the error pages.
    |
    */

    'error' => 'error',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Page
    |--------------------------------------------------------------------------
    |
    | This specifies the view that is used for the maintenance page.
    |
    */

    'maintenance' => 'maintenance',

    /*
    |--------------------------------------------------------------------------
    | Header Partial
    |--------------------------------------------------------------------------
    |
    | This specifies the partial that is used for header.
    |
    */

    'header' => 'partials.header',

    /*
    |--------------------------------------------------------------------------
    | Footer Partial
    |--------------------------------------------------------------------------
    |
    | This specifies the partial that is used for footer.
    |
    */

    'footer' => 'partials.footer',

    /*
    |--------------------------------------------------------------------------
    | Notifications Partial
    |--------------------------------------------------------------------------
    |
    | This specifies the partial that is used for the notifications.
    |
    */

    'notifications' => 'partials.notifications',

    /*
    |--------------------------------------------------------------------------
    | Analytics Partial
    |--------------------------------------------------------------------------
    |
    | This specifies the partial that is used for analytics when it is enabled.
    |
    */

    'analytics' => 'partials.analytics',

);
