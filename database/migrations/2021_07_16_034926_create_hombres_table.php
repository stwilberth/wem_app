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

            $table->string('tipo_identificacion');  //tipo identificacion segun hacienda
            $table->string('dni')->unique();        // Digite su cédula,
            $table->string('name');
            $table->boolean('tiene_correo');

            $table->enum('form_datos_personales', ['sin_iniciar', 'editando', 'finalizado'])->default('sin_iniciar');
            $table->enum('form_primero', ['sin_iniciar', 'editando', 'finalizado'])->default('sin_iniciar');
            $table->enum('form_segundo', ['sin_iniciar', 'editando', 'finalizado'])->default('sin_iniciar');
            $table->enum('form_tercero', ['sin_iniciar', 'editando', 'finalizado'])->default('sin_iniciar');
            $table->boolean('activo')->default(1);
            $table->string('telefono')->unique();             // Digite su número de teléfono,

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
