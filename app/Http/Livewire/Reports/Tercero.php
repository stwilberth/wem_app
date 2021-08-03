<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;

class Tercero extends Component
{
    public function render()
    {
        return view('livewire.reports.tercero')
        ->extends('layouts.app')
        ->section('content')
        ->layoutData([
            'titulo' => 'Resultados 30 - 45 sesiones', 
        ]);
    }
}
