<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribucions', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_general_tramite')->nullable();
            $table->datetime('fecha')->nullable();
            $table->string('provincia_ruta')->nullable();
            $table->string('punto_distribucion')->nullable();
            $table->string('traking')->nullable();
            $table->string('persona')->nullable();            
            $table->string('rutaImagen')->nullable();                        
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
        Schema::dropIfExists('distribucions');
    }
}
