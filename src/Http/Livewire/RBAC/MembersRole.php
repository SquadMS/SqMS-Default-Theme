<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Illuminate\Support\Str;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use SquadMS\DefaultTheme\Http\Livewire\Contracts\AbstractModalComponent;
use SquadMS\Foundation\Contracts\SquadMSUser;
use SquadMS\Foundation\Repositories\UserRepository;

class MembersRole extends AbstractModalComponent
{
    use WithPagination;

    public Role $role;

    public string $searchInstance;;
    public ?SquadMSUser $selectedUser;

    function __construct($id = null)
    {
        parent::__construct($id);

        $this->searchInstance =Str::random();
        $this->selectedUser = null;
    }

    protected $listeners = [
        'newMemberUpdated' => 'selectUser',
        'role:memberAdded' => '$refresh',
        'role:memberRemoved' => '$refresh',
    ];

    public function selectUser($data)
    {
        $this->selectedUser = UserRepository::getUserModelQuery()->where('steam_id_64', $data['value'])->first();
    }

    public function addMember()
    {
        if (is_null($this->selectedUser)) {
            return;
        }

        /* Remove the User from the Role */
        $this->role->users()->attach($this->selectedUser);

        $this->searchInstance = Str::random();
        $this->selectedUser = null;

        /* Fire the member added event */
        $this->emit('role:memberAdded');
    }

    public function removeMember($user)
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