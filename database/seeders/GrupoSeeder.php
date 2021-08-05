<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            ['activo' => 1, 'name' => 'Alajuela Centro'],
            ['activo' => 1, 'name' => 'San Pedro de Montes de Oca'],
            ['activo' => 1, 'name' => 'Curridabat'],
            ['activo' => 1, 'name' => 'Tibás'],
            ['activo' => 1, 'name' => 'Escazú'],
            ['activo' => 1, 'name' => 'Puriscal'],
            ['activo' => 1, 'name' => 'Grecia'],
            ['activo' => 1, 'name' => 'Heredia Centro'],
            ['activo' => 1, 'name' => 'San Pablo de Heredia'],
            ['activo' => 1, 'name' => 'San Rafael de Heredia'],
            ['activo' => 1, 'name' => 'Belén'],
            ['activo' => 1, 'name' => 'Esparza'],
            ['activo' => 1, 'name' => 'Pérez Zeledón'],

        ];

        foreach ($groups as $group){
            Grupo::create($group);
        }

    }
}
