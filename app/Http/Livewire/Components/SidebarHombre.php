<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class SidebarHombre extends Component
{
    public function render()
    {
        return view('livewire.components.sidebar-hombre');
    }

    public function logout()
    {
        session()->forget('hombre_id');
        return redirect()->route('welcome');
    }
}
