<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Spatie\Permission\Models\Role;
use SquadMS\DefaultTheme\Http\Livewire\Contracts\AbstractModalComponent;

class RoleEntry extends AbstractModalComponent
{
    public bool $showModal = false;
    public Role $role;

    protected $listeners = [
        'role:updated' => '$refresh',
    ];
    
    public function render()
    {
        return view('squadms-default-theme::admin.livewire.rbac.role-entry');
    }
}