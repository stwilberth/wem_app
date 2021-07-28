<?php

namespace App\Http\Livewire\Grupos;

use Livewire\Component;
use App\Models\Grupo as GrupoModel;

class Item extends Component
{
    public GrupoModel $grupo;
    public $modo = 'show';

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
    
    public function render()
    {
        return view('livewire.grupos.item');
    }

    public function delete()
    {
        //no borra solo manda a la papelera

    }

    public function edit(){
        $this->modo = 'edit';
    }

    public function save()
    {
        $this->validate();
        $this->grupo->save();
        $this->modo = 'show';
    }
}
