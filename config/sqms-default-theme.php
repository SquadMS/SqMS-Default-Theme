<?php

return [
    'routes' => [
        'prefix' => null,
        'middleware' => ['web'],
        'def' => [
            'server-population' => [
                'type' => 'get',
                'name' => 'server',
                'path' => 'servers/{server}/population',
                'middlewares' => [],
                'controller' => \SquadMS\DefaultTheme\Http\Controllers\ServersController::class,
                'executor' => 'population',
                'localized' => true,
            ],
        ]
    ],
];