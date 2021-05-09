<?php

namespace SquadMS\DefaultTheme\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use SquadMS\Foundation\Http\Livewire\RBAC\RoleList;

class LivewireProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* Register livewire components */
        Livewire::component('sqms-default-theme.admin.rbac.role-list', RoleList::class);
    }
}
