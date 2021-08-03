<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Welcome extends Component
{
    public function render()
    {
        return view('livewire.welcome')
            ->extends('layouts.welcome')
            ->section('content')
            ->layoutData(['titulo' => 'Wem App']);
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('hombre_id');
        return redirect()->route('welcome');
    }
}
