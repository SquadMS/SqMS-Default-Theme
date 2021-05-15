<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Illuminate\Support\Collection;
use SquadMS\DefaultTheme\Http\Livewire\Contracts\LivewireSelect;
use SquadMS\Foundation\Repositories\UserRepository;

class NewMemberSearch extends LivewireSelect
{
    public function options($searchTerm = null) : Collection 
    {
        return UserRepository::getUserModelQuery()->where('name', 'like', $searchTerm)
        ->orWhere('name', 'like', '%' . $searchTerm)
        ->orWhere('name', 'like', $searchTerm . '%')
        ->orWhere('name', 'like', '%'. $searchTerm . '%')
        ->limit(10)
        ->get();
    }
}