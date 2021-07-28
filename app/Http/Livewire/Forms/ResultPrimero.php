<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Livewire\WithPagination;
use DB;

class ResultPrimero extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $buscar;
    public $resultados;


    public function render()
    {
        $this->resultados = DB::table('form_primeros')->paginate(25);
            // ->leftJoin('hombres', 'form_primeros.hombre_id', '=', 'hombres.id')
            // ->leftJoin('grupos', 'hombres.grupo_id', '=', 'grupos.id')
            // ->select('form_primeros.id', 'form_primeros.created_at', 'hombres.name as hombre_name', 'hombres.dni as hombre_dni', 'grupos.name as hombre_grupo')
            // // ->where('hombres.name', 'like', '%'.$this->buscar.'%')
            // ->paginate(25);

            // dd($this->resultados);

        return view('livewire.result-primero')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData([
                'titulo' => 'Resultados Primer ingreso', 
                'resultados' => $this->resultados,
            ]);
    }
}
