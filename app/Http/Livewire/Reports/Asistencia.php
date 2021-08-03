<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;

class Asistencia extends Component
{
    public function render()
    {
        return view('livewire.reports.asistencia')
        ->extends('layouts.app')
        ->section('content')
        ->layoutData([
            'titulo' => 'Asistencias', 
        ]);
    }
}
