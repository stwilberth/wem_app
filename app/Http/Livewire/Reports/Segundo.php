<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;

class Segundo extends Component
{
    public function render()
    {
        return view('livewire.reports.segundo')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData([
                'titulo' => 'Resultados 15 - 20 sesiones', 
            ]);
    }
}
