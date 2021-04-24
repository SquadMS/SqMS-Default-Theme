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
              __DIR__ . '/../public' => public_path('themes/squadms-default-theme'),
            ], 'assets');
          
        }

        /* Load Translations */
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'squadms-default-theme');
    }
}
