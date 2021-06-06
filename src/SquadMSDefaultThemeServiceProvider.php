<?php

namespace SquadMS\DefaultTheme;

use Illuminate\Support\ServiceProvider;

class SquadMSDefaultThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* Publish Assets */
        if ($this->app->runningInConsole()) {
            // Publish assets
            $this->publishes([
              __DIR__ . '/../public' => public_path('themes/sqms-default-theme'),
            ], 'assets');
          
        }

        /* Configuration */
        $this->mergeConfigFrom(__DIR__ . '/../config/sqms-servers.php', 'sqms-servers');

        /* Load Translations */
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'sqms-default-theme');
    }
}
