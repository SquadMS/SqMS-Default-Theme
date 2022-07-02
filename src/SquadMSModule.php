<?php

namespace SquadMS\DefaultTheme;

use Illuminate\Support\Facades\Artisan;
use SquadMS\Foundation\Modularity\Contracts\SquadMSModule as SquadMSModuleContract;

class SquadMSModule extends SquadMSModuleContract
{
    public static function getIdentifier(): string
    {
        return 'sqms-default-theme';
    }

    public static function getName(): string
    {
        return 'SquadMS Default Theme';
    }

    public static function publishAssets(): void
    {
        Artisan::call('vendor:publish', [
            '--provider' => SquadMSDefaultThemeServiceProvider::class,
            '--tag'     => 'assets',
            '--force'  => true,
        ]);
    }
}
