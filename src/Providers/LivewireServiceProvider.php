<?php

namespace SquadMS\DefaultTheme\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use SquadMS\Foundation\Http\Livewire\RBAC\CreateRole;
use SquadMS\Foundation\Http\Livewire\RBAC\RoleList;

class LivewireServiceProvider extends ServiceProvider
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
        Livewire::component('sqms-default-theme.admin.rbac.create-role', CreateRole::class);
    }
}
