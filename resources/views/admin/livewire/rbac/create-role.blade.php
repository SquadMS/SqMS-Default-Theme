<div>
    <button type="button" class="btn btn-primary">Create</button>

    <x-squadms-default-theme::modal wire:model="showModal">
        <x-slot name="title">
            Delete Account
        </x-slot>
    
        <x-slot name="content">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="New role name" aria-label="New role name" wire:model="input">
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-squadms-default-theme::button wire:click="$toggle('showModal')" wire:loading.attr="disabled">
                Nevermind
            </x-squadms-default-theme::button>
    
            <x-squadms-default-theme::button class="btn-success" wire:click="createRole" wire:loading.attr="disabled">
                Delete Account
            </x-squadms-default-theme::button>
        </x-slot>
    </x-squadms-default-theme::modal>
</div>