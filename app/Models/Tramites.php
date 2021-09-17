<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tramites extends Model
{
    public $table = "tramites";
    //protected $dateFormat = 'Y-m-d h:m:s';
    protected $fillable = ['tramite_id','numero_guia','numero_lote','nombre_cliente'
    ,'fecha_registro','estado','ciclo','fecha_para_entrega','cedula_destinatario','nombre_destinatario'
    ,'direccion_destinatario','ciudad_destino','telefono','id_tarjeta','fecha_entrega','recibido_por'
    ,'fecha_excepcion','contenido','motivo_excepcion','mensajero_actual','cantidad','id_venta'
    ,'is_active','estado_id','subestado_id','subestado_id','subsubestado_id','usuario_asignado'
    ,'usuario_id','fecha_gestion_courier',
    'usuario_asignado',
    'usuario_id',
    'inventario',
    'agendamiento',
   'provincia_ruta',
    'punto_distribucion',
    'observaciones' ,
    'cedula',
    'nombres'  ,
    'apellidos'  ,
    'nombres_y_apellidos'  ,
    'provincia_domicilio'  ,
    'ciudad_domicilio'  ,
    'parroquia_domicilio'  ,
    'cll_p_domicilio'  ,
    'numeracion_domicilio'  ,
    'call_secundaria_domicilio'  ,
    'referencias_domicilio'  ,
    'direccion_completa_domicilio'  ,
    'provincia_trabajo'  ,
    'ciudad_trabajo'  ,
    'parroquia_trabajo'  ,
    'cll_p_trabajo'  ,
    'numeracion_trabajo'  ,
    'call_secundaria_trabajo'  ,
    'referencias_trabajo'  ,
    'direccion_completa_trabajo'  ,
    'telefono_contactado'  ,
    'telefono_referencia'  ,
    'telefono1'  ,
    'telefono2'  ,
    'telefono3'  ,
    'telefono4'  ,
    'telefono5'  ,
    'telefono6'  ,
    'telefono7'  ,
    'telefono8'  ,
    'telefono9'  ,
    'telefono10'  ,
    'id_cliente'  ,
    'fecha_gestion'  ,
    'creadas_no_creadas'  ,
    'imputable'  ,
    'detalle_imputable'  ,
    'fecha_envio_creacion'  ,
    'nombre_de_la_base'  ,
    'lote'  ,
    'codigo_campania'  ,
    'ciclo_courier'  ,
    'cierre_de_ciclo'  ,
    'guia_courier'  ,
    'cedula_titular' ,
    'persona_recibir',
    'tracking',
    'codigo_general',
    'numeroImagenes',
'campo1','campo2','campo3','campo4','campo5','campo6','campo7','campo8','campo9','campo10' 
];
}
