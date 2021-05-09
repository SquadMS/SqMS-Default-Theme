<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public bool $showModal = false;
    public string $input = '';

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
        return view('squadms-default-theme::admin.livewire.create-role');
    }
}