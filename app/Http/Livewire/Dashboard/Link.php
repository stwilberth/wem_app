<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
use App\Models\Grupo;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class Link extends Component
{

    public $grupos = array();
    public $grupo_id;
    public $modalidad;
    public $tiempo;

    public function rules()
    {
        return [
            'grupo_id' =>       'numeric|required',
            'modalidad'  =>     ['required', Rule::in(['virtual', 'presencial'])],
            'tiempo' =>         'numeric|required',
        ];
    }

    public function mount(){
        if (Auth::user()->hasRole(['admin'])) {
            $this->grupos = Grupo::all();
        } else {
            if (Auth::user()->hasRole(['psicologo'])) {
                $this->grupos = Auth::user()->grupos;
            }
        }
    }
    
    public function render()
    {
        return view('livewire.dashboard.link');
    }

    public function save()
    {
        $this->validate();
        $link = URL::temporarySignedRoute('form-asistencia', now()->addMinutes(30), [
            'grupo_id' => $this->grupo_id, 
            'tiempo' => $this->tiempo, 
            'modalidad' => $this->modalidad,
            'user_id' => Auth::user()->id
        ]);

        session(['link_asistencia' => $link]);
        session(['fecha_link_asistencia' => Carbon::now('America/Costa_Rica')]);
        session(['fecha_expiracion_asistencia' => Carbon::now('America/Costa_Rica')->addMinutes((int)$this->tiempo)]);
    }

    public function nuevo()
    {
        session()->forget('link_asistencia');
        session()->forget('fecha_link_asistencia');
    }
}
