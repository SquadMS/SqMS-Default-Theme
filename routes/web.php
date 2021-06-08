<?php

use Illuminate\Support\Facades\Config;
use SquadMS\Foundation\Facades\SquadMSRouter;

/* Define routes from config */
SquadMSRouter::webRoutes(Config::get('sqms-default-theme.routes.def', []));