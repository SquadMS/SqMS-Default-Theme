<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class DeleteRole extends Component
{
    public bool $showModal = false;
    public Role $role;

    public function deleteRole() {
        /* Delete the Role */
        $this->role->delete();

        /* Emit event */
        $this->emit('role:deleted');

        /* Reset state */
        $this->reset();        
    }
    
    public function render()
    {
        return view('squadms-default-theme::admin.livewire.rbac.delete-role');
    }
}