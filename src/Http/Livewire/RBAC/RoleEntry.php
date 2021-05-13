<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleEntry extends Component
{
    public Role $role;

    protected $listeners = [
        'role:updated' => '$refresh',
    ];
    
    public function render()
    {
        return view('squadms-default-theme::admin.livewire.rbac.role-entry');
    }
}