<div>
    @if ($roles->count())
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <th scope="row">{{ $role->name }}</th>
                    <td>
                        <livewire:sqms-default-theme.admin.rbac.members-role :role="$role" :wire:key="'members-role'.$role->id"></livewire:sqms-default-theme.admin.rbac.members-role/>
                        <livewire:sqms-default-theme.admin.rbac.edit-role :role="$role" :wire:key="'edit-role'.$role->id"></livewire:sqms-default-theme.admin.admin.rbac.edit-role/>
                        <livewire:sqms-default-theme.admin.rbac.delete-role :role="$role" :wire:key="'delete-role'.$role->id"></livewire:sqms-default-theme.admin.admin.rbac.delete-role/>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $roles->links() }}
    </div>
    @else
    <p class="text-center">No Roles have been created yet.</p>
    @endif
</div>