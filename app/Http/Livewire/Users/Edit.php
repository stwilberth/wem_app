<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use App\Models\Grupo;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public ?User $user = null;
    public $grupos;
    public $roles;
    private $user_id;

    public function rules ()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|email',
            'user.activo' => 'nullable',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->user->save();
    }

    public function mount($id)
    {
        $this->user_id = $id;
        $this->user = User::find($this->user_id);
        $this->grupos = Grupo::all();
        $this->roles = Role::all();
    }

    public function render()
    {
        $this->user->roles = $this->user->getRoleNames();
        
        return view('livewire.users.edit')
        ->extends('layouts.app')
        ->section('content')
        ->layoutData(['titulo' => $this->user->name]);

    }

    public function save()
    {
        $this->validate();
        $this->user->save();
    }

    public function grupoChange($grupo_id, $checked)
    {
        if ($checked) {
            $this->user->grupos()->detach($grupo_id);
        } else {
            $this->user->grupos()->attach($grupo_id);
        }

        return redirect()->route('user-edit', $this->user->id);
    }

    public function roleChange($role, $checked)
    {
        if ($checked) {
            $this->user->removeRole($role);
        } else {
            $this->user->assignRole($role);
        }
    }
}
