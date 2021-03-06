<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPrimero extends Model
{
    use HasFactory;

    public function hombre()
    {
        return $this->hasOne(Hombre::class);
    }
}
