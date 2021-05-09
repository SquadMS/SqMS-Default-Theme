<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('admin.livewire.rbac.role-list', [
            'roles' => Role::paginate(10),
        ]);
    }
}