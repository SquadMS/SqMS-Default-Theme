<?php

namespace SquadMS\DefaultTheme\Http\Livewire\Contracts;

use Livewire\Component;

abstract class AbstractModalComponent extends Component
{
    public bool $showModal = false;

    /**
     * Small helper to hide the modal
     *
     * @return void
     */
    public function hideModal() : void
    {
        $this->showModal = false;
    }
}