<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserRegisterCtrl extends Component
{
    public function render()
    {
        return view('livewire.user-register')->extends('layouts.app')->section('content')->layoutData(['titulo' => 'Registro', 'body_class' => '', ]);
    }
}
