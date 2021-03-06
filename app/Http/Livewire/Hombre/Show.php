<?php

namespace App\Http\Livewire\Hombre;
use Carbon\Carbon;
use App\Models\Hombre;
use Livewire\Component;
use App\Models\FormAsistencia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $hombre;
    public $hombre_id;

    public function mount($id)
    {

        if (Auth::user()) {
            if (Auth::user()->hasRole('psicologo') || Auth::user()->hasRole('admin')) {
                $this->hombre_id = $id;
            } else {
                return redirect()->route('welcome');
            }
        } else {
            if (session('hombre_id')) {
                $this->hombre_id = session('hombre_id');
            } else {
                return redirect()->route('welcome');
            }
        }
        
        


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

        $dateS = new Carbon('first day of this month');
        $dateE = new Carbon('last day of this month');
        $this->hombre['asistencias'] = FormAsistencia::where('hombre_id', $this->hombre_id)->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->count();

        $date2S = new Carbon('first day of last month');
        $date2E = new Carbon('last day of last month');
        $this->hombre['asistencias_anterior'] = FormAsistencia::where('hombre_id', $this->hombre_id)->whereBetween('created_at', [$date2S->format('Y-m-d')." 00:00:00", $date2E->format('Y-m-d')." 23:59:59"])->count();

    }

    public function render()
    {
        return view('livewire.hombre.show')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['titulo' => $this->hombre['name'], 'body_class' => '' ]);
    }
}
