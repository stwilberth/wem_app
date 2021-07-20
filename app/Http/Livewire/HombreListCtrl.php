<?php

namespace App\Http\Livewire;
use App\Models\Hombre;

use Livewire\Component;

class HombreListCtrl extends Component
{
    public $hombres;
    public function mount()
    {
        $this->hombres = Hombre::all();
    }
    public function render()
    {
        return view('livewire.hombre-list', ['hombre' => $this->hombres]);
    }
}
