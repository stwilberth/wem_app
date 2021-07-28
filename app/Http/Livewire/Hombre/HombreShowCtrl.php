<?php

namespace App\Http\Livewire\Hombre;
use App\Models\Hombre;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class HombreShowCtrl extends Component
{
    public $hombre;

    public $hombre_id;

    public function mount()
    {

        if (!session()->get('hombre_id')) {
            return redirect()->route('welcome');
        }

        $this->hombre_id = session()->get('hombre_id');

        $hombre = DB::table('hombres')
        ->leftJoin('grupos', 'hombres.grupo_id', '=', 'grupos.id')
        ->leftJoin('paises', 'hombres.nacionalidad', '=', 'paises.id')
        ->leftJoin('provincias', 'hombres.provincia', '=', 'provincias.id')
        ->leftJoin('cantones', 'hombres.canton', '=', 'cantones.id')
        ->leftJoin('distritos', 'hombres.distrito', '=', 'distritos.id')
        ->leftJoin('barrios', 'hombres.barrio', '=', 'barrios.id')
        ->select(
            'hombres.*', 
            'grupos.name as grupo_name', 
            'paises.nombre as pais_name',
            'provincias.provincia as provincia_name',
            'cantones.canton as canton_name',
            'distritos.distrito as distrito_name',
            'barrios.barrio as barrio_name' 
        )
        ->where('hombres.id', $this->hombre_id)
        ->first();
        $this->hombre = (array)$hombre;

    }

    public function render()
    {
        return view('livewire.hombre.show')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['titulo' => $this->hombre['name'], 'body_class' => '' ]);
    }
}
