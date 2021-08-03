<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Sidebar extends Component
{
    public function render()
    {
        return view('livewire.components.sidebar');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
