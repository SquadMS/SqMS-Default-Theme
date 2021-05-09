<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'role:created' => '$refresh',
        'role:deleted' => '$refresh',
        'role:updated' => '$refresh',
    ];

    public function render()
    {
        return view('squadms-default-theme::admin.livewire.rbac.role-list', [
            'roles' => Role::paginate(10),
        ]);
    }
}