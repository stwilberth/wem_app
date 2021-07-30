<?php

namespace App\Http\Livewire\Hombre;

use Livewire\Component;
use App\Models\Hombre;
use App\Models\Grupo;
use Livewire\WithPagination;


class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $grupo_id;
    public $grupos;

    public function mount()
    {
      $this->grupos = Grupo::all();   
    }

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $hombres = null;
        if ($this->grupo_id) {
            $hombres = Hombre::where('grupo_id', $this->grupo_id)
                ->where('name', 'like', '%'.$this->search.'%')->orderBy('created_at')
                ->paginate(20);
        } else {
            $hombres = Hombre::where('name', 'like', '%'.$this->search.'%')->orderBy('created_at')
                ->paginate(20);
        }

        return view('livewire.hombre.index', ['hombres' => $hombres])
        ->extends('layouts.app')
        ->section('content')
        ->layoutData(['titulo' => 'Hombres']);
    }
}
