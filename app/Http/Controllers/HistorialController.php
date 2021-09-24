<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Tramites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class HistorialController extends Controller
{
    function index()
    {
     return view('administracion.historico.busqueda');
    }
  
    public function nuevo($req)
    {
        $request=DB::table('tramites')->where('numero_guia',$req)->first();
        $date=Carbon::now();
        Historial::create([
            'id'=>$request->id,
            'tramite_id'=>$request->tramite_id,
            'numero_guia'=>$request->numero_guia,
            'numero_lote'=>$request->numero_lote,
            'nombre_cliente'=>$request->nombre_cliente,
            'estado'=>$request->estado,
            'fecha_registro'=>$request->fecha_registro,
            'ciclo'=>$request->ciclo,
            'fecha_para_entrega'=>$request->fecha_para_entrega,
            'cedula_destinatario'=>$request->cedula_destinatario,
            'nombre_destinatario'=>$request->nombre_destinatario,
            'direccion_destinatario'=>$request->direccion_destinatario,
            'ciudad_destino'=>$request->ciudad_destino,
            'telefono'=>$request->telefono,
            'id_tarjeta'=>$request->id_tarjeta,
            'fecha_entrega'=>$request->fecha_entrega,
            'recibido_por'=>$request->recibido_por,
            'fecha_excepcion'=>$request->fecha_excepcion,
            'contenido'=>$request->contenido,
            'motivo_excepcion'=>$request->motivo_excepcion,
            'mensajero_actual'=>$request->mensajero_actual,
            'cantidad'=>$request->cantidad,
            'id_venta'=>$request->id_venta,
            'is_active'=>$request->is_active,                       
            'fecha_gestion_courier'=>$date,
            'estado_id'=>$request->estado_id,
            'subestado_id'=>$request->subestado_id ,
            'subsubestado_id'=>$request->subsubestado_id ,
            'usuario_asignado'=>$request->usuario_asignado ,
            'usuario_id'=>$request->usuario_id ,
            'inventario'=>$request->inventario ,
            'agendamiento'=>$request->agendamiento ,
            'provincia_ruta'=>$request->provincia_ruta ,
            'punto_distribucion'=>$request->punto_distribucion ,
            'observaciones'=>$request->observaciones ,            
            'cedula'=>$request->cedula ,
            'nombres'=>$request->nombres ,
            'apellidos'=>$request->apellidos ,
            'nombres_y_apellidos'=>$request->nombres_y_apellidos ,
            'provincia_domicilio'=>$request->provincia_domicilio ,
            'ciudad_domicilio'=>$request->ciudad_domicilio ,
            'parroquia_domicilio'=>$request->parroquia_domicilio ,
            'cll_p_domicilio'=>$request->cll_p_domicilio ,
            'numeracion_domicilio'=>$request->numeracion_domicilio ,
            'call_secundaria_domicilio'=>$request->call_secundaria_domicilio ,
            'referencias_domicilio'=>$request->referencias_domicilio ,
            'direccion_completa_domicilio'=>$request->direccion_completa_domicilio ,
            'provincia_trabajo'=>$request->provincia_trabajo ,
            'ciudad_trabajo'=>$request->ciudad_trabajo ,
            'parroquia_trabajo'=>$request->parroquia_trabajo ,
            'cll_p_trabajo'=>$request->cll_p_trabajo ,
            'numeracion_trabajo'=>$request->numeracion_trabajo ,
            'call_secundaria_trabajo'=>$request->call_secundaria_trabajo ,
            'referencias_trabajo'=>$request->referencias_trabajo ,
            'direccion_completa_trabajo'=>$request->direccion_completa_trabajo ,
            'telefono_contactado'=>$request->telefono_contactado ,
            'telefono_referencia'=>$request->telefono_referencia ,
            'telefono1'=>$request->telefono1 ,
            'telefono2'=>$request->telefono2 ,
            'telefono3'=>$request->telefono3 ,
            'telefono4'=>$request->telefono4 ,
            'telefono5'=>$request->telefono5 ,
            'telefono6'=>$request->telefono6 ,
            'telefono7'=>$request->telefono7 ,
            'telefono8'=>$request->telefono8 ,
            'telefono9'=>$request->telefono9 ,
            'telefono10'=>$request->telefono10 ,
            'id_cliente'=>$request->id_cliente ,
            'fecha_gestion'=>$request->fecha_gestion,
            'creadas_no_creadas'=>$request->creadas_no_creadas,
            'imputable'=>$request->imputable ,
            'detalle_imputable'=>$request->detalle_imputable ,
            'fecha_envio_creacion'=>$request->fecha_envio_creacion,
            'nombre_de_la_base'=>$request->nombre_de_la_base ,
            'lote'=>$request->lote ,
            'codigo_campania'=>$request->codigo_campania ,
            'ciclo_courier'=>$request->ciclo_courier ,
            'cierre_de_ciclo'=>$request->cierre_de_ciclo ,
            'guia_courier'=>$request->guia_courier ,
            'cedula_titular'=>$request->cedula_titular,      
            'persona_recibir'=>$request->persona_recibir,
            'tracking'=>$request->tracking,
            'codigo_general'=>$request->codigo_general,

        ]);
    }

    function buscar(Request $request)
    {
        $historials= DB::table('historials')
                    ->leftjoin('estados', 'estados.id', '=', 'historials.estado_id')
                    ->leftjoin('sub_estados', 'sub_estados.id', '=', 'historials.subestado_id')
                    ->leftjoin('subsub_estados', 'subsub_estados.id', '=', 'historials.subsubestado_id')

                    ->leftjoin('users', 'users.id', '=', 'historials.usuario_id')
                    
                    ->select('historials.*','subsub_estados.nombre as subsub_estadosNombre', 'estados.nombre as estadoNombre', 'sub_estados.nombre as subestadoNombre','users.name as usuario','historials.fecha_gestion_courier as Tfecha_gestion','users.location as localizacion')
                    //->exclude(['tramites.is_active','tramites.estado_id','tramites.subestado_id', 'tramites.usuario_id', 'tramites.updated_at', 'tramites.created_at'])
                    ->where('historials.is_active','=',true)
                    ->where('numero_guia',$request->guia)
                    //->whereBetween('tramites.fecha_gestion_courier',[$request->fecha1.' 00:00:00',$request->fecha2.' 23:59:59'])
                    ->orderBy('id','desc')->get();
        
        //Historial::where('numero_guia',$request->guia)->get();
        

        $output = '<div class="row">';
        $output .='<table class="table table-responsive">';
        $output .= '<thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Historial ID</th>
        <th scope="col">Numero Guia</th>
        <th scope="col">Tramite ID</th>
        <th scope="col">Fecha Gestion</th>

        <th scope="col">Estado</th>
        <th scope="col">Subestad</th>
        <th scope="col">Sub Subestado</th>
        <th scope="col">Usuario </th>
        <th scope="col">Inventario </th>
        <th scope="col">Agendamiento </th>
        <th scope="col">Provincia Ruta </th>
        <th scope="col">Punto Distribucion</th>
        <th scope="col">Observacion </th>
        </tr>
    </thead>';
$i=1;
foreach($historials as $historial)
{
$output .= '<tr>
            <th scope="row">' . $i++.'</th>
            <th >' . $historial->id.'</th>
            <td>' . $historial->numero_guia.'</td>
            <td>' . $historial->tramite_id.'</td>
            <td>' . $historial->Tfecha_gestion.'</td>

            <td>' . $historial->estadoNombre.'</td>
            <td>' . $historial->subestadoNombre.'</td>
            <td>' . $historial->subsub_estadosNombre.'</td>
            <td>' . $historial->usuario_id.'</td>
            
            <td>' .$historial->inventario.'</th>
<td>' .$historial->agendamiento.'</th>
<td>' .$historial->provincia_ruta.'</th>
<td>' .$historial->punto_distribucion.'</th>

            <td>' . $historial->observaciones.'</td>                                                        
        </tr>';

/* <div class="col-md-2 imgRemove"  id="imgRmv" style="margin-bottom:16px;" align="center">
    <img src="'.asset('imagenes/'.$request->ruta.'/' . $image->getFilename()).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
    <a href="'.asset('imagenes/'.$request->ruta.'/' . $image->getFilename()).'" download class="btn btn-sm btn-info"><i class="fa fa-download"></i> </a>
    <a href="'.asset('imagenes/'.$request->ruta.'/' . $image->getFilename()).'"  class="btn btn-sm btn-info" target="_blank" ><i class="fa fa-picture">Ver</i> </a>
    
    <!--<button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">eliminar</button>-->
</div>
';*/
} 

$output .= '</table';
$output .= '</div>';

        
        echo $output;
    }

}
