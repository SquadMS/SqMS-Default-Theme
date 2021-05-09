<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public bool $showModal = false;
    public string $input = '';

    protected $rules = [
        'input' => 'required|string|unique:Spatie\Permission\Models\Role,name',
    ];

    public function createRole() {
        /* Validate the data first */
        $this->validate();

        /* Create the Role */
        Role::create([
            'name' => $this->input,
        ]);

        /* Emit event */
        $this->emit('role:created');

        /* Reset state */
        $this->reset();
    }
    
    public function render()
    {
        return view('squadms-default-theme::admin.livewire.rbac.create-role');
    }
}