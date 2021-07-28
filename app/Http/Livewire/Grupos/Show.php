<?php

namespace App\Http\Livewire\Grupos;

use Livewire\Component;
use App\Models\Grupo;

class Show extends Component
{
    public Grupo $grupo;

    public function mount($id)
    {
        $this->grupo = Grupo::find($id);
    }

    public function render()
    {

        return view('livewire.grupos.show')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['titulo' => $this->grupo->name]);
    }
}
