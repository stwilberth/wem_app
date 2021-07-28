<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ubicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Schema::table('hombres', function (Blueprint $table) {
        //     $table->foreignId('grupo_id')->constrained()->nullable();  
        // });
        
        Schema::create('barrios', function (Blueprint $table) {
            $table->id();
            $table->string('barrio');
            $table->string('codigo');
            $table->bigInteger('distrito_id');  
            $table->timestamps();
        });

        Schema::create('distritos', function (Blueprint $table) {
            $table->id();
            $table->string('distrito');
            $table->timestamps();
            $table->string('codigo');
            $table->bigInteger('canton_id');  
        });

        Schema::create('cantones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('provincia_id');  
            $table->string('codigo');
            $table->string('canton');
            $table->timestamps();
        });

        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('provincia');
            $table->string('codigo');
            $table->timestamps();
        });

        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('iso2');
            $table->string('iso3');
            $table->string('codigo_telefono');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
