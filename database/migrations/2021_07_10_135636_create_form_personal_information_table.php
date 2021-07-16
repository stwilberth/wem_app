<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_personal_information', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            //$table->foreignId('hombre_id')->references('id')->on('users');
            //$table->foreignId('grupo_id')->references('id')->on('grupos');    // ¿A cual grupo de Wem es al que más asiste?,
            
            $table->date('fecha_nacimiento');	    // ¿Cuál es tu edad (digite un número)?,
            $table->string('estado_civil');         // ¿Cuál es tu estado civil?,
            $table->boolean('tiene_pareja');        // ¿Tiene pareja en este momento?,
            $table->boolean('vive_con_ella');       // ¿Si tiene pareja, está conviviendo con ella?,
            $table->boolean('wem_jovenes');         // Wem jovenes,
            $table->string('estudio');              // ¿Cuál es su nivel educativo?,
            $table->boolean('tiene_hijos');         // ¿hijos tiene?
            $table->integer('cantidad_hijos');      // ¿Cuántos hijos/as tiene? Si no tiene hijos/as escriba el número cero en la respuesta.,
            $table->boolean('situacion_laboral');   // ¿Cuál es su situación laboral?,
            $table->string('ocupacion');            // ¿Cuál es su ocupación?,
            $table->string('nacionalidad');         // ¿Cuál es su nacionalidad?,
            $table->integer('total_sesiones');      // Cantidad de sesiones de venir a Wem (digite un número),
            $table->integer('provincia');           // Provincia,
            $table->integer('canton');              // Cantón,
            $table->integer('distrito');            // Distrito,
            $table->integer('barrio');              // Barrio,
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_personal_information');
    }
}
