<div class="d-inline-block text-start">
    <x-squadms-default-theme::button class="btn-primary" wire:click="$toggle('showModal')" wire:loading.attr="disabled">
        Members
    </x-squadms-default-theme::button>

    <x-squadms-default-theme::dialog-modal wire:model="showModal" maxWidth="xl" fullscreen="xl">
        <x-slot name="title">
            Role Members
        </x-slot>
    
        <x-slot name="content">
            <div class="input-group mb-3">
                <livewire:sqms-default-theme.admin.rbac.new-member-search name="newMember" :searchable="true" :key="now()" />
                <button class="btn btn-outline-primary" type="button" wire:click="addMember">Add</button>
            </div>

            <hr>

            <div>
                @if ($users->count())
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td class="text-end">
                                        <button class="btn btn-secondary" type="button" wire:click="removeMember('{{ $user->id }}', true)">
                                            <i class="bi bi-x"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $users->links() }}
                @else
                <p class="text-center mb-0">This Role does not have any members.</p>
                @endif
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <div class="flex-grow-1"></div>

            <x-squadms-default-theme::button class="btn-dark" wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                Close
            </x-squadms-default-theme::button>
        </x-slot>
    </x-squadms-default-theme::dialog-modal>
</div>