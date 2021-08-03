<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public function render()
    {
        return view('livewire.components.header');
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('hombre_id');
        return redirect()->route('welcome');
    }
}
