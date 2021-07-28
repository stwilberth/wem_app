<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class ResultTercero extends Component
{
    public function render()
    {
        return view('livewire.result-tercero')
        ->extends('layouts.app')
        ->section('content')
        ->layoutData([
            'titulo' => 'Resultados 30 - 45 sesiones', 
        ]);
    }
}
