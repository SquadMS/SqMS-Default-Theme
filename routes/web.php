<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use SquadMS\Foundation\Helpers\SquadMSRouteHelper;

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
