<?php

namespace SquadMS\DefaultTheme;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
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

        /* Load views */
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'squadms-default-theme');

        /* Load components */
        foreach (File::allFiles(__DIR__ . '/../resources/views/components') as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }

            Blade::component('squadms-default-theme::' . $file->getBasename('.blade'), $file->getBasename('.blade'), 'squadms-default-theme');
        }
    }
}
