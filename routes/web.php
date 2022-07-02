<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use SquadMS\Foundation\Helpers\SquadMSRouteHelper;

/* WEB routes */
Route::group([
    'prefix' => Config::get('sqms-default-theme.routes.prefix'),
    'middleware' => Config::get('sqms-default-theme.routes.middleware'),
], function () {//
    /* Get route definitions from config */
    $definitions = Config::get('sqms-default-theme.routes.def', []);

    $modules = [
        'SquadMS\\Servers\\SquadMSModule' => ['server-population'],
    ];

    /* Register all definitions except those for modules */
    SquadMSRouteHelper::configurableRoutes(Arr::except($definitions, Arr::flatten($modules)));

    foreach ($modules as $module => $definitionNames) {
        /* Check if the SquadMSModule class does exist */
        if (class_exists($module)) {
            /* Register definitions for this module */
            SquadMSRouteHelper::configurableRoutes(Arr::only($definitions, $definitionNames));
        }
    }
});
