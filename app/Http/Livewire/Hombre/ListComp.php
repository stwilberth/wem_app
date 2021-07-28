<?php

namespace App\Http\Livewire\Hombre;

use Livewire\Component;
use App\Models\Hombre;

class ListComp extends Component
{
    public $grupo_id;
    public $buscar_hombre;

    public function mount()
    {
        
    }
    public function render()
    {
        if ($this->grupo_id) {
            $this->hombres = Hombre::where('grupo_id', $this->grupo_id)->where('name', 'like', '%'.$this->buscar_hombre.'%')->get();
        } else {
            $this->hombres = Hombre::where('name', 'like', '%'.$this->buscar_hombre.'%')->get();
        }
        
        return view('livewire.hombre.list-comp', ['hombres' => $this->hombres]);
    }
}
