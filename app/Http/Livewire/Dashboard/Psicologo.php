<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Psicologo extends Component
{
    public function render()
    {
        return view('livewire.dashboard.psico')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData([
                'titulo' => 'Tablero Psicólogo']);
    }
}
