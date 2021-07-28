<?php

namespace App\Http\Livewire\Forms;
use App\Models\Grupo;
use App\Models\FormAsistencia;

use Livewire\Component;

class AsistenciaCtrl extends Component
{
    public ?FormAsistencia $FormAsistencia = null;

    function rules(){
        return [
            'FormAsistencia.individualmente' => 'required|numeric',
            'FormAsistencia.con_otras_personas' => 'required|numeric',
            'FormAsistencia.en_lo_social' => 'required|numeric',
            'FormAsistencia.en_general' => 'required|numeric',
            // 'FormAsistencia.grupo_id' => 'required|numeric',
            // 'FormAsistencia.hombre_id' => 'required|numeric',
        ];
    }
    public function mount()
    {
        if (!session()->get('hombre_id')) {
            $this->FormAsistencia ??= new FormAsistencia();
        }
    }



    public function render()
    {
        return view('livewire.forms.asistencia')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData([
                'titulo' => 'Asistencia', 
            ]);
    }

    public function save(){
        $this->validate();
        $this->FormAsistencia->hombre_id = session()->get('hombre_id');
        $this->FormAsistencia->save();
        Hombre::find(session()->get('hombre_id'))->increment('total_sesiones');
        $this->Hombre->save();
        //return redirect()->to('/form-asistencia');
    }
}
