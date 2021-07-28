<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provincia;

class ProvinciaSeeder extends Seeder
{
    public function __construct()
    {
        $file = __DIR__.'/csv/provincia.csv';
        $csv = array_map('str_getcsv', file($file));
        array_walk($csv, function(&$a) use ($csv) {
          $a = array_combine($csv[0], $a);
        });
        array_shift($csv); # remove column header

        $this->paises = $csv;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        foreach ($this->paises as $pais){
            Provincia::create($pais);
        }
    }
}
