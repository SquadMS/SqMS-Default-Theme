<?php

namespace SquadMS\DefaultTheme\Http\Livewire\Contracts;

use Livewire\Component;

abstract class AbstractModalComponent extends Component
{
    public bool $showModal = false;

    public function hideModal() : void
    {
        $this->showModal = false;
    }
}