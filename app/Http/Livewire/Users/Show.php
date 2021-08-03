<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use App\Models\Grupo;
use Livewire\Component;

class Show extends Component
{
    public User $user;

    public function mount($id)
    {
        $this->user = User::find($id);
        $this->user->roles = $this->user->getRoleNames();
    }

    public function render()
    {
        return view('livewire.users.show')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['titulo' => $this->user->name]);
    }
}
