<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class ResultAsistencia extends Component
{
    public function render()
    {
        return view('livewire.result-asistencia')
        ->extends('layouts.app')
        ->section('content')
        ->layoutData([
            'titulo' => 'Asistencias', 
        ]);
    }
}
