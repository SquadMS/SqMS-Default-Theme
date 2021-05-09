<?php

namespace SquadMS\Foundation\Http\Livewire\RBAC;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public bool $showModal = false;
    public bool $input = '';

    public function createRole() {
        /* Create the Role */
        Role::create([
            'name' => $this->input,
        ]);

        /* Reset state */
        $this->reset();
    }
    
    public function render()
    {
        return view('admin.livewire.create-role');
    }
}