<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace Wiroom\NovaSeo\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Wiroom\NovaSeo\Resources\SeoMeta;
use Wiroom\NovaSeo\Traits\LoadsConfigs;
use Wiroom\NovaSeo\Traits\LoadsRoutes;
use Wiroom\NovaSeo\Traits\LoadsTranslations;

class FieldServiceProvider extends ServiceProvider
{
    public const string FIELD_NAME = 'nova-seo';

    use LoadsTranslations;
    use LoadsConfigs;
    use LoadsRoutes;

    public function register(): void
    {
        Nova::resources([
            SeoMeta::class,
        ]);
    }

    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script(self::FIELD_NAME, __DIR__.'/../../dist/js/field.js');
            Nova::style(self::FIELD_NAME, __DIR__.'/../../dist/css/field.css');
        });


        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'nova-seo');

        //$this->loadTranslations(__DIR__.'/../../resources/lang', self::FIELD_NAME);
        //$this->loadRoutes(__DIR__.'/../../routes');

        // php artisan vendor:publish --tag="nova-seo-config"
        $this->loadConfigs(__DIR__.'/../../config');

        // php artisan vendor:publish --tag="nova-seo-migrations"
        $this->publishesMigrations([
            __DIR__.'/../../database/migrations' => database_path('migrations'),
        ], 'nova-seo-migrations');
        // php artisan vendor:publish --tag="nova-seo-views"
        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/nova-seo'),
        ], 'nova-seo-views');
    }
}
