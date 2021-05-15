<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use SquadMS\DefaultTheme\Http\Livewire\Contracts\AbstractModalComponent;
use SquadMS\Foundation\Contracts\SquadMSUser;
use SquadMS\Foundation\Repositories\UserRepository;

class MembersRole extends AbstractModalComponent
{
    use WithPagination;

    public Role $role;

    protected $listeners = [
        'newMemberUpdated' => 'addMember',
        'role:memberAdded' => '$refresh',
        'role:memberRemoved' => '$refresh',
    ];

    public function addMember(string $name, string $value)
    {
        /* Remove the User from the Role */
        $this->role->users()->attach(UserRepository::getUserModelQuery()->where('steam_id_64', $value)->first());

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
        return view('squadms-default-theme::admin.livewire.rbac.members-role', [
            'users' => $this->role->users()->paginate(10),
        ]);
    }
}