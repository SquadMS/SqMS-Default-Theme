<div>
    <x-squadms-default-theme::button class="btn-primary" wire:click="$toggle('showModal')" wire:loading.attr="disabled">
        Create
    </x-squadms-default-theme::button>

    <x-squadms-default-theme::dialog-modal wire:model="showModal">
        <x-slot name="title">
            Create Role
        </x-slot>
    
        <x-slot name="content">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="New role name" aria-label="New role name" wire:model.lazy="input">
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-squadms-default-theme::button class="btn-dark" wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                Cancel
            </x-squadms-default-theme::button>
    
            <div class="flex-grow-1"></div>

            <x-squadms-default-theme::button class="btn-success" wire:click="createRole" wire:loading.attr="disabled">
                Create
            </x-squadms-default-theme::button>
        </x-slot>
    </x-squadms-default-theme::dialog-modal>
</div>