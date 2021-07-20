<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHombresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hombres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('tipo_identificacion')->nullable();  //tipo identificacion segun hacienda
            $table->string('dni')->unique()->nullable();        // Digite su cédula,
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->boolean('activo')->nullable(1);
            $table->string('telefono')->unique()->nullable();             // Digite su número de teléfono,
            $table->boolean('wem_jovenes')->nullable();         // Wem jovenes,

            $table->boolean('tiene_pareja')              ->nullable(); //radio_boolean
            $table->boolean('esta_conviviendo_pareja')   ->nullable(); //radio_boolean

            $table->enum('form_primero', ['sin_iniciar', 'editando', 'finalizado'])->default('sin_iniciar')->nullable();
            $table->enum('form_segundo', ['sin_iniciar', 'editando', 'finalizado'])->default('sin_iniciar')->nullable();
            $table->enum('form_tercero', ['sin_iniciar', 'editando', 'finalizado'])->default('sin_iniciar')->nullable();

            $table->date('fecha_nacimiento')->nullable();	    // ¿Cuál es tu edad (digite un número)?,
            $table->enum('estado_civil',                ['soltero', 'casado', 'union_libre', 'divorciado', 'viudo'])->nullable(); // ¿Cuál es tu estado civil?,
            $table->string('estudio')->nullable();              // ¿Cuál es su nivel educativo?,
            $table->boolean('tiene_hijos')->nullable();         // ¿hijos tiene?
            $table->integer('cantidad_hijos')->nullable();      // ¿Cuántos hijos/as tiene? Si no tiene hijos/as escriba el número cero en la respuesta.,
            $table->boolean('situacion_laboral')->nullable();   // ¿Cuál es su situación laboral?,
            $table->string('ocupacion')->nullable();            // ¿Cuál es su ocupación?,
            $table->string('nacionalidad')->nullable();         // ¿Cuál es su nacionalidad?,
            $table->integer('total_sesiones')->nullable();      // Cantidad de sesiones de venir a Wem (digite un número),
            $table->integer('asistencias')->nullable();         // Cantidad de asistencias obligatovias, permite reestablecer en 0,
            $table->integer('provincia')->nullable();           // Provincia,
            $table->integer('canton')->nullable();              // Cantón,
            $table->integer('distrito')->nullable();            // Distrito,
            $table->integer('barrio')->nullable();              // Barrio,
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hombres');
    }
}
