<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Spatie\Permission\Models\Role;
use SquadMS\DefaultTheme\Http\Livewire\Contracts\AbstractModalComponent;
use SquadMS\Foundation\Contracts\SquadMSUser;

class MembersRole extends AbstractModalComponent
{
    public Role $role;

    protected $listeners = [
        'role:memberAdded' => '$refresh',
        'role:memberRemoved' => '$refresh',
    ];

    public function addMember(SquadMSUser $user)
    {
        /* Remove the User from the Role */
        $this->role->users()->attach($user);

        /* Fire the member added event */
        $this->emit('role:memberAdded');
    }

    public function removeMember(SquadMSUser $user)
    {
        /* Remove the User from the Role */
        $this->role->users()->detach($user);

        /* Fire the member removed event */
        $this->emit('role:memberRemoved');
    }
    
    public function render()
    {
        return view('squadms-default-theme::admin.livewire.rbac.members-role');
    }
}