<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            
            $table->integer('tramite_id',)->length(30)->nullable();
            $table->integer('numero_guia')->nullable();
            $table->integer('numero_lote')->nullable();
            $table->string('nombre_cliente')->nullable();
            $table->string('estado')->nullable();
            $table->string('fecha_registro')->nullable();
            $table->date('ciclo')->nullable();
            $table->datetime('fecha_para_entrega')->nullable();
            $table->text('cedula_destinatario')->nullable();
            $table->string('nombre_destinatario')->nullable();
            $table->text('direccion_destinatario')->nullable();
            $table->string('ciudad_destino')->nullable();
            $table->string('telefono')->nullable();
            $table->string('id_tarjeta')->nullable();
            $table->datetime('fecha_entrega')->nullable();
            $table->string('recibido_por')->nullable();
            $table->datetime('fecha_excepcion')->nullable();
            $table->string('contenido')->nullable();
            $table->string('motivo_excepcion')->nullable();
            $table->string('mensajero_actual')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('id_venta')->nullable();
            $table->boolean('is_active')->nullable();
            
            
             //Gestion
             $table->string('estado_id')->nullable();
             $table->string('subestado_id')->nullable();
             $table->string('subsubestado_id')->nullable();
            
             $table->string('usuario_asignado')->nullable();
 
             $table->string('usuario_id')->nullable();
             $table->string('inventario')->nullable();
             $table->datetime('agendamiento')->nullable();
             $table->string('provincia_ruta')->nullable();
             $table->string('punto_distribucion')->nullable();
             $table->string('observaciones')->nullable(); 
             $table->datetime('fecha_gestion_courier')->nullable();           
             //
             $table->string('cedula')->length(25)->nullable();
             $table->string('nombres')->nullable();
             $table->string('apellidos')->nullable();
             $table->string('nombres_y_apellidos')->nullable();
             $table->string('provincia_domicilio')->nullable();
             $table->string('ciudad_domicilio')->nullable();
             $table->string('parroquia_domicilio')->nullable();
             $table->string('cll_p_domicilio')->nullable();
             $table->string('numeracion_domicilio')->nullable();
             $table->string('call_secundaria_domicilio')->nullable();
             $table->text('referencias_domicilio')->nullable();
             $table->text('direccion_completa_domicilio')->nullable();
             $table->string('provincia_trabajo')->nullable();
             $table->string('ciudad_trabajo')->nullable();
             $table->string('parroquia_trabajo')->nullable();
             $table->string('cll_p_trabajo')->nullable();
             $table->string('numeracion_trabajo')->nullable();
             $table->string('call_secundaria_trabajo')->nullable();
             $table->text('referencias_trabajo')->nullable();
             $table->text('direccion_completa_trabajo')->nullable();
             $table->string('telefono_contactado')->nullable();
             $table->string('telefono_referencia')->nullable();
             $table->string('telefono1')->nullable();
             $table->string('telefono2')->nullable();
             $table->string('telefono3')->nullable();
             $table->string('telefono4')->nullable();
             $table->string('telefono5')->nullable();
             $table->string('telefono6')->nullable();
             $table->string('telefono7')->nullable();
             $table->string('telefono8')->nullable();
             $table->string('telefono9')->nullable();
             $table->string('telefono10')->nullable();
             $table->integer('id_cliente')->length(15)->nullable();
             $table->datetime('fecha_gestion')->nullable();
             $table->string('creadas_no_creadas')->nullable();
             $table->string('imputable')->nullable();
             $table->string('detalle_imputable')->nullable();
             $table->date('fecha_envio_creacion')->nullable();
             $table->string('nombre_de_la_base')->nullable();
             $table->string('lote')->nullable();
             $table->string('codigo_campania')->nullable();
             $table->date('ciclo_courier')->nullable();
             $table->string('cierre_de_ciclo')->nullable();
             $table->integer('guia_courier')->length(25)->nullable();
            $table->string('cedula_titular')->length(255)->nullable();

             //
            $table->string('persona_recibir')->nullable();
            $table->string('tracking')->nullable();
            $table->string('codigo_general')->nullable();

            $table->string('numeroImagenes')->nullable();
            $table->text('campo1')->nullable();
            $table->text('campo2')->nullable();
            $table->text('campo3')->nullable();
            $table->text('campo4')->nullable();
            $table->text('campo5')->nullable();
            $table->text('campo6')->nullable();
            $table->text('campo7')->nullable();
            $table->text('campo8')->nullable();
            $table->text('campo9')->nullable();
            $table->text('campo10')->nullable();
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
        Schema::dropIfExists('historials');
    }
}
