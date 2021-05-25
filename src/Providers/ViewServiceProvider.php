<?php

namespace SquadMS\DefaultTheme\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        /* Load views */
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'sqms-default-theme');
    }
}
