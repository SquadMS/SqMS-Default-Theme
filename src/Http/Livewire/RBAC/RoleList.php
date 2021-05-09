<?php

namespace SquadMS\Foundation\Http\Livewire\RBAC;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{
    public function render()
    {
        return view('admin.livewire.role-list', [
            'roles' => Role::all(),
        ]);
    }
}