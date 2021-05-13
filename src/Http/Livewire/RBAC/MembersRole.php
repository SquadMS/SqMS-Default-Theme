<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Spatie\Permission\Models\Role;
use SquadMS\DefaultTheme\Http\Livewire\Contracts\AbstractModalComponent;

class MembersRole extends AbstractModalComponent
{
    public Role $role;
    
    public function render()
    {
        return view('squadms-default-theme::admin.livewire.rbac.members-role');
    }
}