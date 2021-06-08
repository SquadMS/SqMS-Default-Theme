<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use SquadMS\Foundation\Facades\SquadMSRouter;

/* Get route definitions from config */
$definitions = Config::get('sqms-default-theme.routes.def', []);

$modules = [
    'SquadMS\\Servers\\SquadMSModule' => ['server-population'],
];

/* Register all definitions except those for modules */
SquadMSRouter::webRoutes(Arr::except($definitions, Arr::flatten($modules)));

foreach ($modules as $module => $definitions) {
    /* Check if the SquadMSModule class does exist */
    if (class_exists($module)) {
        /* Register definitions for this module */
        SquadMSRouter::webRoutes(Arr::only($definitions, $definitions));
    }
}
