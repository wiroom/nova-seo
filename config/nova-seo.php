<?php /** @noinspection LaravelFunctionsInspection */

return [
    /*
    |--------------------------------------------------------------------------
    | SEO status
    |--------------------------------------------------------------------------
    |
    | Set SEO status, if its set to false then all pages will have
    | the 'noindex, nofollow' follow type and also removed the meta tags except the title tag.
    |
    */

    'seo_status' => env('SEO_STATUS', true),

    /*
    |--------------------------------------------------------------------------
    | Default robots meta
    |--------------------------------------------------------------------------
    |
    | Set the default follow type.
    |
    */
    'default_robots_noindex' => env('SEO_DEFAULT_ROBOTS_NOINDEX', false),
    'default_robots_nofollow' => env('SEO_DEFAULT_ROBOTS_NOFOLLOW', false),

];
