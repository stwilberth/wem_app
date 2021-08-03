<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Grupo;
use App\Models\Hombre;
use App\Models\User;
use App\Models\FormAsistencia;
use App\Models\FormPrimero;
use App\Models\FormSegundo;
use App\Models\FormTercero;
use App\Models\EvaluacionSesion;
use DB;

class Admin extends Component
{
    public $grupos;
    public $hombres;
    public $users;
    public $form_asistencias;
    public $form_primeros;
    public $form_segundos;
    public $form_terceros;
    public $buscar_hombre;
    public $buscar_user;

    public $hombres_activos;
    public $psicologos_activos;
    public $grupos_activos;

    public function mount()
    {
        // $this->grupos = Grupo::all();
        // $this->form_asistencias = FormAsistencia::all();
        // $this->form_primeros = FormPrimero::all();
        // $this->form_segundos = FormSegundo::all();
        // $this->form_terceros = FormTercero::all();

        $this->hombres_activos = Hombre::where('activo', 1)->count();
        $this->psicologos_activos = User::role('psicologo')->count();
        $this->grupos_activos = Grupo::where('activo', 1)->count();
    }
    public function render()
    {
        // $this->hombres = Hombre::where('name', 'like', '%'.$this->buscar_hombre.'%')->limit(10)->get();
        // $this->users = User::where('name', 'like', '%'.$this->buscar_user.'%')->limit(10)->get();

        return view('livewire.dashboard.admin')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData([
                'titulo' => 'Tablero'
            ]);


    }
}
