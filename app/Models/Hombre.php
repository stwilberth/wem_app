<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hombre extends Model
{
    use HasFactory;

    protected  $fillable = [
        'tipo_identificacion', 
        'dni', 
        'name', 
        'email', 
        'activo', 
        'telefono', 
        'wem_jovenes', 
        'form_primero', 
        'form_segundo', 
        'form_tercero', 
        'fecha_nacimiento', 
        'estado_civil', 
        'estudio', 
        'tiene_hijos', 
        'cantidad_hijos', 
        'situacion_laboral', 
        'ocupacion', 
        'nacionalidad', 
        'total_sesiones', 
        'asistencias', 
        'provincia', 
        'canton', 
        'distrito', 
        'barrio', 
        'grupo_id'
    ];
}
