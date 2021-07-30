<?php

namespace App\Http\Livewire\Psicologos;

use App\Models\User;
use App\Models\Grupo;
use Livewire\Component;
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
        $psicologos = null;
        if ($this->grupo_id) {
            // where('grupo_id', $this->grupo_id)
            $psicologos = User::where('name', 'like', '%'.$this->search.'%')->orderBy('created_at')
                ->paginate(20);
        } else {
            $psicologos = User::where('name', 'like', '%'.$this->search.'%')->orderBy('created_at')
                ->paginate(20);
        }

        return view('livewire.psicologos.index', ['users' => $psicologos])
        ->extends('layouts.app')
        ->section('content')
        ->layoutData(['titulo' => 'Psicólogos']);
    }
}
