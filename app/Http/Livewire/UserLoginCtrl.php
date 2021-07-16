<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserLoginCtrl extends Component
{
    public function render()
    {
        return view('livewire.user-login')
        ->extends('layouts.app')
        ->section('content')
        ->layoutData([
            'titulo' => 'Login', 
            'body_class' => '', 
        ]);
    }
}
