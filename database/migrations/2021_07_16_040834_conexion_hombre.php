<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConexionHombre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('sesiones', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
            $table->timestamps();
        });
    
        
        Schema::table('hombres', function (Blueprint $table) {
            $table->foreignId('grupo_id')->constrained()->nullable();  
        });

        Schema::table('form_primeros', function (Blueprint $table) {
            $table->foreignId('hombre_id')->unique()->constrained();  
        });

        Schema::table('form_segundos', function (Blueprint $table) {
            $table->foreignId('hombre_id')->unique()->constrained();  
        });

        Schema::table('form_terceros', function (Blueprint $table) {
            $table->foreignId('hombre_id')->unique()->constrained();  
        });

        Schema::table('sesiones', function (Blueprint $table) {
            $table->foreignId('hombre_id')->constrained();  
        });

        Schema::table('form_asistencias', function (Blueprint $table) {
            $table->foreignId('hombre_id')->constrained();  
            $table->foreignId('grupo_id')->constrained();  
            $table->foreignId('user_id')->constrained(); //psicologo
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
