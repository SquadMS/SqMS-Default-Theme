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
                        <x-squadms-default-theme::button class="btn-primary" wire:loading.attr="disabled">
                            Members
                        </x-squadms-default-theme::button>

                        <livewire:sqms-default-theme.admin.rbac.role-members :role="$role"></livewire:admin.rbac.role-members/>
                        <livewire:sqms-default-theme.admin.rbac.edit-role :role="$role"></livewire:admin.rbac.edit-role/>
                        <livewire:sqms-default-theme.admin.rbac.delete-role :role="$role"></livewire:admin.rbac.delete-role/>
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