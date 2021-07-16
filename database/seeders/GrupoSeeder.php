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
            ['name' => 'Alajuela Centro'],
            ['name' => 'San Pedro de Montes de Oca'],
            ['name' => 'Curridabat'],
            ['name' => 'Tibás'],
            ['name' => 'Escazú'],
            ['name' => 'Puriscal'],
            ['name' => 'Grecia'],
            ['name' => 'Heredia Centro'],
            ['name' => 'San Pablo de Heredia'],
            ['name' => 'San Rafael de Heredia'],
            ['name' => 'Belén'],
            ['name' => 'Esparza'],
            ['name' => 'Pérez Zeledón'],

        ];

        foreach ($groups as $group){
            Grupo::create($group);
        }

    }
}
