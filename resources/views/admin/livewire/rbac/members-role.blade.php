<div>
    <x-squadms-default-theme::button class="btn-primary" wire:click="$toggle('showModal')" wire:loading.attr="disabled">
        Members
    </x-squadms-default-theme::button>

    <x-squadms-default-theme::dialog-modal wire:model="showModal">
        <x-slot name="title">
            Role Members
        </x-slot>
    
        <x-slot name="content">
            <p>Coming Soon</p>
        </x-slot>
    
        <x-slot name="footer">
            <div class="flex-grow-1"></div>

            <x-squadms-default-theme::button class="btn-dark" wire:click="$toggle('showModal')" wire:loading.attr="disabled">
                Close
            </x-squadms-default-theme::button>
        </x-slot>
    </x-squadms-default-theme::dialog-modal>
</div>