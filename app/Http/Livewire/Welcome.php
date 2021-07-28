<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        return view('livewire.welcome')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['titulo' => 'Wem App']);
    }
}
