<?php

namespace SquadMS\DefaultTheme;

use Illuminate\Support\Facades\Artisan;
use SquadMS\Foundation\Modularity\Contracts\SquadMSModule as SquadMSModuleContract;

class SquadMSModule extends SquadMSModuleContract {
    static function getIdentifier() : string
    {
        return 'sqms-default-theme';
    }

    static function getName() : string
    {
        return 'SquadMS Default Theme';
    }

    static function publishAssets() : void
    {
        Artisan::call('vendor:publish', [
            '--provider' => SquadMSDefaultThemeServiceProvider::class,
            '--tag'     => 'assets',
            '--force'  => true,
        ]);
    }
}
