<?php

namespace SquadMS\DefaultTheme\Http\Livewire\Contracts;

use Asantibanez\LivewireSelect\LivewireSelect as Component;

/**
 * @inheritDoc
 */
abstract class LivewireSelect extends Component
{
    public function styles()
    {
        return [
            'default' => 'form-select',

            'searchSelectedOption' => 'p-2 rounded border w-full bg-white flex items-center',
            'searchSelectedOptionTitle' => 'text-start',
            'searchSelectedOptionReset' => 'h-4 w-4',

            'search' => 'position-relative',
            'searchInput' => 'form-control',
            'searchOptionsContainer' => 'position-absolute top-0 left-0 mt-5 w-100 zindex-dropdown',

            'searchOptionItem' => 'p-3 cursor-pointer text-sm',
            'searchOptionItemActive' => 'p-3 cursor-pointer bg-gray',
            'searchOptionItemInactive' => 'bg-gray-dark',

            'searchNoResults' => 'p-3 w-100 bg-white border text-center',
        ];
    }
}