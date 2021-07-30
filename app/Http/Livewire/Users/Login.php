<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.users.login')
        ->extends('layouts.app')
        ->section('content')
        ->layoutData([
            'titulo' => 'Login', 
            'body_class' => '', 
        ]);
    }
}
