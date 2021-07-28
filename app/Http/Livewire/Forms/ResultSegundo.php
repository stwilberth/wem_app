<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class ResultSegundo extends Component
{
    public function render()
    {
        return view('livewire.result-segundo')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData([
                'titulo' => 'Resultados 15 - 20 sesiones', 
            ]);
    }
}
