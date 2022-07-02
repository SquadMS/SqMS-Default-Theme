<?php

namespace SquadMS\DefaultTheme;

use Spatie\LaravelPackageTools\Package;
use SquadMS\Foundation\Contracts\SquadMSModuleServiceProvider;

class SquadMSDefaultThemeServiceProvider extends SquadMSModuleServiceProvider
{
    public static string $name = 'sqms-default-theme';

    public function configureModule(Package $package): void
    {
        $package->hasAssets()
                ->hasConfigFile()
                ->hasRoutes(['web']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function registeringModule(): void
    {
    }

    public function bootedModule(): void
    {
    }
}
