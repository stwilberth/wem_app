<?php

namespace App\Http\Livewire\Grupos;

use Livewire\Component;
use App\Models\Grupo;

class Index extends Component
{
    public $grupos;
    public ?Grupo $grupo = null;

    public function mount(){
        $this->grupos = Grupo::all();
    }

    public function render()
    {
        return view('livewire.grupos.index')
        ->extends('layouts.app')
        ->section('content')
        ->layoutData(['titulo' => 'Grupos']);
    }

}
