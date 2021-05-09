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
                        <x-squadms-default-theme::button class="btn-warning" wire:loading.attr="disabled">
                            Edit
                        </x-squadms-default-theme::button>
                        <x-squadms-default-theme::button class="btn-danger" wire:loading.attr="disabled">
                            Delete
                        </x-squadms-default-theme::button>
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