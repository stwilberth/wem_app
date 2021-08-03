<?php

namespace App\Http\Livewire\Forms;
use Carbon\Carbon;
use App\Models\Grupo;
use App\Models\Hombre;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\FormAsistencia;
use App\Models\EvaluacionSesion;
use Illuminate\Support\Facades\Auth;

class Asistencia extends Component
{
    public ?FormAsistencia $FormAsistencia = null;
    public ?EvaluacionSesion $EvaluacionSesion = null;
    public ?Hombre $hombre = null;
    
    public $grupo_id;
    public $modalidad;
    public $tiempo;
    public $user_id;
    public $dni;
    public $pin;

    function rules(){
        return [
            'EvaluacionSesion.individualmente' => 'required|numeric',
            'EvaluacionSesion.con_otras_personas' => 'required|numeric',
            'EvaluacionSesion.en_lo_social' => 'required|numeric',
            'EvaluacionSesion.en_general' => 'required|numeric',
        ];
    }
    public function mount(Request $request)//$grupo_id, $modalidad, $tiempo, $user_id
    {
        if (!$request->hasValidSignature()) {
            return redirect()->route('welcome');
        }

        if (Auth::user()) {
            return redirect()->route('welcome');
        }

        $this->grupo_id = $request['grupo_id'];
        $this->modalidad = $request['modalidad'];
        $this->tiempo = $request['tiempo'];
        $this->user_id = $request['user_id'];

        $this->FormAsistencia ??= new FormAsistencia();
        $this->EvaluacionSesion ??= new EvaluacionSesion();


        if (session('hombre_id')) {
            $this->hombre = Hombre::find(session('hombre_id'));
            $form_asistencias = FormAsistencia::where('id', session('hombre_id'))->whereDate('created_at', Carbon::today())->count();
            if ($form_asistencias > 0) {
                session()->flash('asistencia_duplicada', 'Intentó registrar su asistencia por segunda vez');
                return redirect()->route('hombre', session()->get('hombre_id'));
            }
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
        $this->hombre->increment('total_sesiones');
        $this->hombre->save();

        $this->FormAsistencia->grupo_id = $this->grupo_id;
        $this->FormAsistencia->modalidad = $this->modalidad;
        $this->FormAsistencia->user_id = $this->user_id;
        $this->FormAsistencia->hombre_id = session('hombre_id');
        $this->FormAsistencia->save();

        $this->EvaluacionSesion->sesiones = $this->hombre->total_sesiones;
        $this->EvaluacionSesion->hombre_id = session('hombre_id');
        $this->EvaluacionSesion->save();


        session()->flash('asistencia_guardada', 'Su asistencia se guardó correctamente');
        return redirect()->route('hombre', session()->get('hombre_id'));
    }

    public function ingresar()
    {
        $this->hombre = Hombre::where([
            ['dni', '=', $this->dni],
            ['pin', '=', $this->pin]            
        ])->first();
        if ($this->hombre) {
            session(['hombre_id' => $this->hombre->id]);
            session(['hombre_name' => $this->hombre->name]);
            $form_asistencias = FormAsistencia::where('id', session('hombre_id'))->whereDate('created_at', Carbon::today())->count();
            if ($form_asistencias > 0) {
                session()->flash('asistencia_duplicada', 'Intentó registrar su asistencia por segunda vez');
                return redirect()->route('hombre', session()->get('hombre_id'));
            }
            $this->FormAsistencia->hombre_id = $this->hombre->id;
        } else {
            session()->flash('datos_invalidos', 'Datos inválidos');
        }        
    }
}
