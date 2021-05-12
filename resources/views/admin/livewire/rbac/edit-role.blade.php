<div>
    <x-squadms-default-theme::button class="btn-warning" wire:click="$toggle('showModal')" wire:loading.attr="disabled">
        Edit
    </x-squadms-default-theme::button>

    <x-squadms-default-theme::dialog-modal wire:model="showModal">
        <x-slot name="title">
            Edit Role
        </x-slot>
    
        <x-slot name="content">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Name of the role" aria-label="Name of the role" wire:model.lazy="role.name">
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-squadms-default-theme::button class="btn-dark" wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                Cancel
            </x-squadms-default-theme::button>
    
            <div class="flex-grow-1"></div>

            <x-squadms-default-theme::button class="btn-success" wire:click="saveRole" wire:loading.attr="disabled">
                Save
            </x-squadms-default-theme::button>
        </x-slot>
    </x-squadms-default-theme::dialog-modal>
</div>