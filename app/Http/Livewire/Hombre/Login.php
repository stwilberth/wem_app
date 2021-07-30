<?php

namespace App\Http\Livewire\Hombre;

use Livewire\Component;
use App\Models\Hombre;

class Login extends Component
{
    public $dni;
    public $pin;

    public function mount()
    {
        if (session()->get('hombre_id')) {
            return redirect()->route('hombre-show');
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
            return redirect()->to('/hombre-show');
        } else {
            session()->flash('datos_invalidos', 'Datos inválidos');
        }        
    }
}
