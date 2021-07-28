<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NavBar extends Component
{
    public function render()
    {
        return view('livewire.components.nav-bar');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');

    }

    public function logoutHombre()
    {
        session()->forget('hombre_id');
        return redirect()->route('welcome');
    }
}
