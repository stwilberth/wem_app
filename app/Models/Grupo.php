<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'virtual',
        'wem_jovenes',
        'presencial',
        'activo',
        'ubicacion',
        'horario',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function hombres()
    {
        return $this->belongsToMany(Hombre::class);
    }
}
