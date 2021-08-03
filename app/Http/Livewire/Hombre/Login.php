<?php

namespace App\Http\Livewire\Hombre;

use App\Models\Hombre;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $dni;
    public $pin;
    public $asistencia = 0;

    public function mount()
    {
        if (Auth::user()) {
            return redirect()->route('welcome');
        }
        
        if (session()->get('hombre_id')) {
            return redirect()->route('hombre', session()->get('hombre_id'));
        }

    }
    public function render()
    {
        
        return view('livewire.hombre.login')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['titulo' => 'Ingresar Hombre Wem']);

    }

    public function ingresar()
    {
        $hombre = Hombre::where([
            ['dni', '=', $this->dni],
            ['pin', '=', $this->pin]            
        ])->first();
        if ($hombre) {
            session(['hombre_id' => $hombre->id]);
            session(['hombre_name' => $hombre->name]);
            if (!$this->asistencia) {
                return redirect()->route('hombre', $hombre->id);
            }
        } else {
            session()->flash('datos_invalidos', 'Datos inválidos');
        }        
    }
}
