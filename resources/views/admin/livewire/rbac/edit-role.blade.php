<div>
    <x-squadms-default-theme::button class="btn-warning" wire:click="$toggle('showModal')" wire:loading.attr="disabled">
        Edit
    </x-squadms-default-theme::button>

    <x-squadms-default-theme::dialog-modal wire:model="showModal" maxWidth="xl" fullscreen="xl">
        <x-slot name="title">
            Edit Role
        </x-slot>
    
        <x-slot name="content">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Name of the role" aria-label="Name of the role" value="{{ $role->name }}" wire:model.lazy="role.name">
                <x-squadms-default-theme::button class="btn-outline-success" wire:click="updateRole" wire:loading.attr="disabled">
                    Update
                </x-squadms-default-theme::button>
              </div>
            <div>
                @foreach (\SquadMSPermissions::getModules() as $module)
                <div class="m-2 border border-dark">
                    <h3>{{ $module }}</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (\SquadMSPermissions::getPermissions($module) as $definition => $displayName)
                                    <tr>
                                        <td>{{ $displayName }}</td>
                                        <td>
                                            @if ($role->hasPermissionTo($definition))
                                                <button class="btn btn-primary" type="button" wire:click="togglePermission('{{ $definition }}', false)">
                                                    <i class="bi bi-check"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-secondary" type="button" wire:click="togglePermission('{{ $definition }}', true)">
                                                    <i class="bi bi-x"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-squadms-default-theme::button class="btn-dark" wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                Close
            </x-squadms-default-theme::button>
    
            <div class="flex-grow-1"></div>
        </x-slot>
    </x-squadms-default-theme::dialog-modal>
</div>