<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Tramites;
use Carbon\Carbon;

class BaseCarga implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
  /*  public function collection(Collection $collection)
    {
        //
    }*/

    public function model(array  $row)
    {
       // return dd($row);
        return new Tramites([
            'tramite_id'=>$row['tramites_id'],
            'numero_guia'=>$row['tramites_numero_guia'],
            'numero_lote'=>$row['tramites_numero_lote'],
            'nombre_cliente'=>$row['tramites_nombre_cliente'],
            'estado'=>$row['tramites_estado'],
            //'fecha_registro'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tramites_fecha_registro'])->format('Y-m-d h:m:s'),
            'fecha_registro'=> $row['tramites_fecha_registro'],
            //'ciclo'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tramites_ciclo'])->format('Y-m-d'),
            'ciclo'=> $row['tramites_ciclo'],
            //'fecha_para_entrega'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tramites_fecha_para_entrega'])->format('Y-m-d  h:m:s'),
            'fecha_para_entrega'=> $row['tramites_fecha_para_entrega'],
            'cedula_destinatario'=>$row['tramites_cedula_destinatario'],
            'nombre_destinatario'=>$row['tramites_nombre_destinatario'],
            'direccion_destinatario'=>$row['tramites_direccion_destinatario'],
            'ciudad_destino'=>$row['tramites_ciudad_destino'],
            'telefono'=>$row['tramites_telefono'],
            'id_tarjeta'=>$row['tramites_id_tarjeta'],
            //'fecha_entrega'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tramites_fecha_entrega'])->format('Y-m-d  h:m:s'),
            'fecha_entrega'=> $row['tramites_fecha_entrega'] ,
            'recibido_por'=>$row['tramites_recibido_por'],
            //'fecha_excepcion'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tramites_fecha_excepcion'])->format('Y-m-d  h:m:s'),
            'fecha_excepcion'=> $row['tramites_fecha_excepcion'],
            'contenido'=>$row['tramites_contenido'],
            'motivo_excepcion'=>$row['tramites_motivo_excepcion'],
            'mensajero_actual'=>$row['tramites_mensajero_actual'],
            'cantidad'=>$row['tramites_cantidad'],
            'id_venta'=>$row['id_venta'],
            'is_active'=>true,
            'estado_id'=>2,
            'subestado_id'=>5,
            'usuario_id'=>null,
            'cedula'  =>$row['cedula'],
            'nombres'=>$row['nombres'],
            'apellidos' =>$row['apellidos'],
            'nombres_y_apellidos' =>$row['nombres_y_apellidos'],
            'provincia_domicilio' =>$row['provincia_domicilio'],
            'ciudad_domicilio'   =>$row['ciudad_domicilio'],
            'parroquia_domicilio' =>$row['parroquia_domicilio'],
            'cll_p_domicilio'  =>$row['cll_p_domicilio'],
            'numeracion_domicilio'  =>$row['numeracion_domicilio'],
            'call_seundaria_domicilio'  =>$row['call_secundaria_domicilio'],
            'referencias_domicilio' =>$row['referencias_domicilio'],
            'direccion_completa_domicilio' =>$row['direccion_completa_domicilio'],
            'provincia_trabajo' =>$row['provincia_trabajo'],
            'ciudad_trabajo'  =>$row['ciudad_trabajo'],
            'parroquia_trabajo' =>$row['parroquia_trabajo'],
            'cll_p_trabajo'  =>$row['cll_p_trabajo'],
            'numeracion_trabajo'  =>$row['numeracion_trabajo'],
            'call_secundaria_trabajo' =>$row['call_secundaria_trabajo'],
            'referencias_trabajo' =>$row['referencias_trabajo'],
            'direccion_completa_trabajo' =>$row['direccion_completa_trabajo'],
            'telefono_contactado'  =>$row['telefono_contactado'],
            'telefono_referencia'  =>$row['telefono_referencia'],
            'telefono1'  =>$row['telefono_1'],
            'telefono2'  =>$row['telefono_2'],
            'telefono3'  =>$row['telefono_3'],
            'telefono4'  =>$row['telefono_4'],
            'telefono5'  =>$row['telefono_5'],
            'telefono6'  =>$row['telefono_6'],
            'telefono7'  =>$row['telefono_7'],
            'telefono8'  =>$row['telefono_8'],
            'telefono9'  =>$row['telefono_9'],
            'telefono10'  =>$row['telefono_10'],
            'id_cliente'  =>$row['id_cliente'],
            'fecha_gestion'  =>$row['fecha_gestion'],
            'creadas_no_creadas'  =>$row['creadas_no_creadas'],
            'imputable' =>$row['imputable'],
            'detalle_imputable'  =>$row['detalle_imputable'],
            'fecha_envio_creacion'  =>$row['fecha_envio_creacion'],
            'nombre_de_la_base'  =>$row['nombre_de_la_base'],
            'lote'  =>$row['lote'],
            'codigo_campania'  =>$row['codigo_campania'],
            'ciclo_courier' =>$row['ciclo_courier'],
            'cierre_de_ciclo'  =>$row['cierre_de_ciclo'],
            'guia_courier'  =>$row['guia_courier'],
            'cedula_titular'  =>$row['cedula_titular'],

            'campo1'  =>$row['campo1'],
            'campo2'  =>$row['campo2'],
            'campo3'  =>$row['campo3'],
            'campo4'  =>$row['campo4'],
            'campo5'  =>$row['campo5'],
            'campo6'  =>$row['campo6'],
            'campo7'  =>$row['campo7'],
            'campo8'  =>$row['campo8'],
            'campo9'  =>$row['campo9'],
            'campo10'  =>$row['campo10'],
        ]);
        /*return new Tramites([
            'id'=>$row['id'],
           'codigo'=>$row['codigo'],
            'identificacion'=>$row['identificacion'],
            'nombre'=>$row['nombre'],
            'subestado_id'=>$row['subestado'],
            'detalle'=>$row['detalle'],
            'is_active'=>true,
            'fecha'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha'])->format('Y-m-d')
            //'fecha'=> Carbon::parse(($row['fecha']).toString())->format('d/m/Y'),
        ]);     */   
    }
}
