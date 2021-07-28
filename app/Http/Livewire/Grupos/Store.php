<?php

namespace App\Http\Livewire\Grupos;

use Livewire\Component;
use App\Models\Grupo;

class Store extends Component
{
    public Grupo $grupo;

    public function rules()
    {        
        return [
            'grupo.name' => 'required|string',
            'grupo.virtual' => 'boolean',
            'grupo.presencial' => 'boolean',
            'grupo.wem_jovenes' => 'required|boolean',
            'grupo.activo' => 'required|boolean',
            'grupo.ubicacion' => 'required|string',
            'grupo.horario' => 'required|string',
        ];
    }

    public function mount()
    {
        $this->grupo = new Grupo();

    }

    public function render()
    {
        return view('livewire.grupos.store');
    }

    public function save()
    {
        $this->validate();
        $this->grupo->save();
        $this->modo = 'show';
        redirect()->route('grupos');
    }
}
