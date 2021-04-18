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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'squadms-default-theme');
    }
}
