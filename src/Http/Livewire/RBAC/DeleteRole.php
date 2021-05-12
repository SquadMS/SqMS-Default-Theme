<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Spatie\Permission\Models\Role;
use SquadMS\DefaultTheme\Http\Livewire\Contracts\AbstractModalComponent;

class DeleteRole extends AbstractModalComponent
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