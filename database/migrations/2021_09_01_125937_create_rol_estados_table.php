<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_estados', function (Blueprint $table) {
            $table->id();
           
        
            $table->unsignedBigInteger('subestado_id')->nullable();
            $table->foreign('subestado_id')->references('id')
                                            ->on('sub_estados')
                                            ->onDelefete('set null');
            $table->unsignedBigInteger('rol_id')->nullable();
            $table->foreign('rol_id')->references('id')
                                            ->on('rols')
                                            ->onDelefete('set null');
            
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
        Schema::dropIfExists('rol_estados');
    }
}
