<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class Register extends Component
{
    public function render()
    {
        return view('livewire.users.register')->extends('layouts.app')->section('content')->layoutData(['titulo' => 'Registro']);
    }
}
