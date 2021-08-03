<?php

namespace App\Http\Livewire\Grupos;

use App\Models\Grupo;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $titulo;
    public $grupos;
    public ?Grupo $grupo = null;


    public function mount(){
        if (Auth::user()->hasRole(['admin'])) {
            $this->grupos = Grupo::all();
            $this->titulo = 'Grupos';
        } else {
            $this->titulo = 'Mis Grupos';
            $this->grupos = Auth::user()->grupos;
        }
    }

    public function render()
    {
        return view('livewire.grupos.index')
        ->extends('layouts.app')
        ->section('content')
        ->layoutData(['titulo' => $this->titulo]);
    }

}
