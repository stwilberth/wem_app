<?php

namespace App\Http\Livewire;
use App\Models\Hombre;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class HombreShowCtrl extends Component
{
    public $hombre;

    public function mount($id)
    {

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
        ->where('hombres.id', $id)
        ->first();
        $this->hombre = (array)$hombre;

        // dd($this->hombre);
    }

    public function render()
    {
        return view('livewire.hombre-show')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['titulo' => 't', 'body_class' => '' ]);
    }
}
