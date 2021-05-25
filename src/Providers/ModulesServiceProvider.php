<?php

namespace SquadMS\DefaultTheme\Providers;

use Illuminate\Support\ServiceProvider;
use SquadMS\DefaultTheme\SquadMSModule;
use SquadMS\Foundation\Facades\SquadMSModuleRegistry;

class ModulesServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        SquadMSModuleRegistry::register(SquadMSModule::class);
    }
}