<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Spatie\Permission\Models\Role;
use SquadMS\DefaultTheme\Http\Livewire\Contracts\AbstractModalComponent;

class EditRole extends AbstractModalComponent
{
    public Role $role;

    public function updateRole() {
        /* Validate the data first */
        $this->validate();
        
        /* Create the Role */
        $this->role->save();

        $this->hideModal();

        /* Emit event */
        $this->emitUp('role:updated');
    }
    
    public function render()
    {
        return view('squadms-default-theme::admin.livewire.rbac.edit-role');
    }

    protected function rules() : array
    {
        return [
            'role.name' => 'required|string|unique:Spatie\Permission\Models\Role,name,' . $this->role->id,
        ];
    }
}