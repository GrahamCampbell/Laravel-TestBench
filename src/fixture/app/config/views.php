<?php

/*
 * This file is part of Laravel TestBench.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

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

];
