<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionSesionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion_sesions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->foreignId('hombre_id')->references('id')->on('users');;
            $table->tinyInteger('individualmente');     // individualmente (bienestar personal) 
            $table->tinyInteger('con_otras_personas');  // con_otras_personas (familia y relaciones próximas) *
            $table->tinyInteger('en_lo_social');        // en_lo_social (trabajo, amistades, estudio) *
            $table->tinyInteger('en_general');          // En general (sensación general de bienestar) *
            $table->smallInteger('sesiones');           // cantidad de sesiones cumplidas incluyendo la de hoy
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluacion_sesions');
    }
}
