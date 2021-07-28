<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class TerceroCtrl extends Component
{

    public function mount()
    {
        if (!session()->get('hombre_id')) {
            return redirect()->route('welcome');
        }
    }
    public function render()
    {
        return view('livewire.forms.tercero')
        ->extends('layouts.app')
        ->section('content')
        ->layoutData([
            'titulo' => 'Resultados 15 - 20 sesiones', 
            'body_class' => '', 
        ]);
    }
}
