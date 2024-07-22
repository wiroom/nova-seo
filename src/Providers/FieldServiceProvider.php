<?php

namespace Wiroom\WiroomSeo\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Wiroom\WiroomSeo\Traits\LoadsConfigs;
use Wiroom\WiroomSeo\Traits\LoadsRoutes;
use Wiroom\WiroomSeo\Traits\LoadsTranslations;

class FieldServiceProvider extends ServiceProvider
{
    public const string FIELD_NAME = 'wiroom-seo';

    use LoadsTranslations;
    use LoadsConfigs;
    use LoadsRoutes;

    public function register()
    {
    }

    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script(self::FIELD_NAME, __DIR__.'/../../dist/js/field.js');
            Nova::style(self::FIELD_NAME, __DIR__.'/../../dist/css/field.css');
        });

        $this->loadTranslations(__DIR__.'/../../resources/lang', self::FIELD_NAME);

        $this->loadConfigs(__DIR__.'/../../config');

        $this->loadRoutes(__DIR__.'/../../routes');
    }
}
