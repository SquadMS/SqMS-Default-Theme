<?php

namespace SquadMS\DefaultTheme\Http\Livewire\RBAC;

use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;
use SquadMS\DefaultTheme\Http\Livewire\Contracts\LivewireSelect;
use SquadMS\Foundation\Repositories\UserRepository;

class NewMemberSearch extends LivewireSelect
{
    public Role $role;

    public function options($searchTerm = null) : Collection 
    {
        return UserRepository::getUserModelQuery()
        ->whereNotIn('id', $this->role->users()->allRelatedIds())
        ->where(function ($query) use ($searchTerm) {
            return $query->where('name', 'like', $searchTerm)
            ->orWhere('name', 'like', '%' . $searchTerm)
            ->orWhere('name', 'like', $searchTerm . '%')
            ->orWhere('name', 'like', '%'. $searchTerm . '%');
        })
        ->limit(10)
        ->get()
        ->map(fn ($user) => [ 'value' => $user['steam_id_64'], 'description' => $user['name'] ]);
    }

    public function selectedOption($steamId64)
    {
        $user = UserRepository::getUserModelQuery()
        ->where('steam_id_64', $steamId64)
        ->first();

        return [
            'value' => $user['steam_id_64'],
            'description' => $user['name']
        ];
    }

    public function styles()
    {
        return array_merge(parent::styles(), [
            'root' => 'flex-grow-1',
        ]);
    }
}