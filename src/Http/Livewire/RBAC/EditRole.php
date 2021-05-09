<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class MembersRole extends Component
{
    public bool $showModal = false;
    public Role $role;
    
    public function render()
    {
        return view('squadms-default-theme::admin.livewire.rbac.members-role');
    }
}