<?php

namespace SquadMS\DefaultTheme\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        /* Routes */
        $routesPath = __DIR__ . '/../../routes';
        
        /* WEB routes */
        Route::group([
            'prefix' => Config::get('sqms-default-theme.routes.prefix'),
            'middleware' => Config::get('sqms-default-theme.routes.middleware'),
        ], function () use ($routesPath) {
            $this->loadRoutesFrom($routesPath . '/web.php');
        });
    }
}