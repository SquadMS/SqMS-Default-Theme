<div class="d-inline-block text-start">
    <x-squadms-default-theme::button class="btn-danger" wire:click="$toggle('showModal')" wire:loading.attr="disabled">
        Delete
    </x-squadms-default-theme::button>

    <x-squadms-default-theme::confirm-modal wire:model="showModal">
        <x-slot name="title">
            Delete Role
        </x-slot>
    
        <x-slot name="content">
            <p>Are you sure that you want to delete the Role?</p>
        </x-slot>
    
        <x-slot name="footer">
            <x-squadms-default-theme::button class="btn-dark" wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                Cancel
            </x-squadms-default-theme::button>
    
            <div class="flex-grow-1"></div>

            <x-squadms-default-theme::button class="btn-danger" wire:click="deleteRole" wire:loading.attr="disabled">
                Delete
            </x-squadms-default-theme::button>
        </x-slot>
    </x-squadms-default-theme::confirm-modal>
</div>