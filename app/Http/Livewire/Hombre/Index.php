<?php

namespace App\Http\Livewire\Hombre;

use App\Models\Grupo;
use App\Models\Hombre;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $grupo_id;
    public $grupos;

    public function mount()
    {
        if (Auth::user()->hasRole(['admin'])) {
            $this->grupos = Grupo::all();
        } else {
            $this->grupos = Auth::user()->grupos;
        }
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
