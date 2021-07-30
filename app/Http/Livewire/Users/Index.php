<?php

namespace App\Http\Livewire\Users;

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
        $users = null;
        if ($this->grupo_id) {
            // where('grupo_id', $this->grupo_id)
            $users = User::where('name', 'like', '%'.$this->search.'%')->orderBy('created_at')
                ->paginate(20);
        } else {
            $users = User::where('name', 'like', '%'.$this->search.'%')->orderBy('created_at')
                ->paginate(20);
        }

        return view('livewire.users.index', ['users' => $users])
        ->extends('layouts.app')
        ->section('content')
        ->layoutData(['titulo' => 'Usuarios']);
    }
}
