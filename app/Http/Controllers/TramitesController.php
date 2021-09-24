<?php

namespace App\Http\Controllers;

use App\Models\Tramites;
use Illuminate\Http\Request;
Use App\Imports\BaseCarga;
use Carbon\Carbon;
use Auth;
use App\Gallery;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\HeadingRowImport;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
Use App\Exports\ReporteGestion;
Use App\Http\Controllers\HistorialController;
use App\Models\Estados;
use App\Models\SubEstados;
use App\Models\subsubEstado;
use App\User;
use App\Models\Provincia;
use App\Models\UserGuia;
Use App\Models\Asignacion;

class TramitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('administracion.courierHome');
    }
     public function index()
    {
        return view('administracion.baseDatos.cargaBase');
    }
    public function formAsignarBase()
    {
        $usuarios=User::where('rol','<>','1')->get();
        $provincias=Provincia::select('id','provincia')->where('is_active','=',true)->get();
        $estados=Estados::where('is_active','=',true)->whereIn('id',[4,5])->get();
        return view('administracion.gestion.asignar',compact('estados','usuarios','provincias'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tramites  $tramites
     * @return \Illuminate\Http\Response
     */
    public function show(Tramites $tramites)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tramites  $tramites
     * @return \Illuminate\Http\Response
     */
    public function edit(Tramites $tramites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tramites  $tramites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return $request;
        
        $resultado=explode("\r\n",$request->codigos);
        $codigo_general="";
        //var_dump($resultado);
        $codigo_general=$resultado[0].$resultado[count($resultado)-1];
       $codigosActualizados=0;
       
       for ($i=0; $i < count($resultado); $i++) {
            
            $ucliente['usuario_id']=Auth::user()->name; 
            $ucliente['subestado_id']=$request->subestado;
            $ucliente['subsubestado_id']=$request->subsubestado;
            $ucliente['estado_id']=$request->estado;
            $now = Carbon::now();
            $ucliente['fecha_gestion_courier']=$now;
            $ucliente['inventario']=$request->inventario;
                if ($request->fechaAgendamiento!=null){
                    $ucliente['agendamiento']=$request->fechaAgendamiento.' '.$request->horaAgendamiento ;
                }

            $ucliente['provincia_ruta']=$request->provincia;
            $ucliente['punto_distribucion']=$request->pdistribucion;
            $ucliente['observaciones']=$request->observaciones;         
            if($request->tracking!=null){
                $ucliente['tracking']=$request->tracking;
                $ucliente['persona_recibir']=$request->personaRecibir;             
                $ucliente['codigo_general']=$codigo_general; 
            }
            $ucliente['estado_banco']=$request->estadoBanco;
                        
            $result=Tramites::where('numero_guia','=',$resultado[$i])->update($ucliente);
            if($result){
                $codigosActualizados++;
                app('App\Http\Controllers\HistorialController')->nuevo($resultado[$i]);
            }            
        }
        
       // echo $codigo_general;
        $message= 'Registros actualizados '.$codigosActualizados ;
        return redirect()->route('registroGestion')->with('message',$message);        
        
    }

    public function updateBodega(Request $request)
    {
        //return $request;
        
        $resultado=explode("\r\n",$request->codigos);
        $codigo_general="";
        //var_dump($resultado);
        $codigo_general=$resultado[0].$resultado[count($resultado)-1];
       $codigosActualizados=0;
       
       for ($i=0; $i < count($resultado); $i++) {
            
            $ucliente['usuario_id']=Auth::user()->name; 
            $ucliente['subestado_id']=$request->subestado;
            $ucliente['subsubestado_id']=$request->subsubestado;
            $ucliente['estado_id']=$request->estado;
            $now = Carbon::now();
            $ucliente['fecha_gestion_courier']=$now;
            $ucliente['inventario']=$request->inventario;
                if ($request->fechaAgendamiento!=null && ($request->subestado==6 || $request->subestado==7)){
                    $ucliente['agendamiento']=$request->fechaAgendamiento.' '.$request->horaAgendamiento ;
                    $ucliente['nueva_direccion']=$request->nueva_direccion;
                }else{
                    $ucliente['agendamiento']=null;                    
                }
               
            $ucliente['provincia_ruta']=$request->provincia;
            $ucliente['punto_distribucion']=$request->pdistribucion;
            $ucliente['observaciones']=$request->observaciones; 
                    
            if($request->tracking!=null){
                $ucliente['tracking']=$request->tracking;
                $ucliente['persona_recibir']=$request->personaRecibir;             
                $ucliente['codigo_general']=$codigo_general; 
            }
            $ucliente['estado_banco']=$request->estadoBanco;
                        
            $result=Tramites::where('numero_guia','=',$resultado[$i])->update($ucliente);
            if($result){
                $codigosActualizados++;
                app('App\Http\Controllers\HistorialController')->nuevo($resultado[$i]);
            }            
        }
        
       // echo $codigo_general;
        $message= 'Registros actualizados '.$codigosActualizados ;
        return redirect()->route('bodega.index')->with('message',$message);        
        
    }

    public function updateVisador(Request $request)
    {
        //return $request;
        
        $resultado=explode("\r\n",$request->codigos);
        $codigo_general="";
        //var_dump($resultado);
        $codigo_general=$resultado[0].$resultado[count($resultado)-1];
       $codigosActualizados=0;
       
       for ($i=0; $i < count($resultado); $i++) {
            
            $ucliente['usuario_id']=Auth::user()->name; 
            $ucliente['subestado_id']=$request->subestado;
            $ucliente['subsubestado_id']=$request->subsubestado;
            $ucliente['estado_id']=$request->estado;
            $now = Carbon::now();
            $ucliente['fecha_gestion_courier']=$now;
            $ucliente['inventario']=$request->inventario;
                if ($request->fechaAgendamiento!=null){
                    $ucliente['agendamiento']=$request->fechaAgendamiento.' '.$request->horaAgendamiento ;
                }

            $ucliente['provincia_ruta']=$request->provincia;
            $ucliente['punto_distribucion']=$request->pdistribucion;
            $ucliente['observaciones']=$request->observaciones;         
 
            
            $result=Tramites::where('numero_guia','=',$resultado[$i])->update($ucliente);
            if($result){
                $codigosActualizados++;
                app('App\Http\Controllers\HistorialController')->nuevo($resultado[$i]);
            }
            
        }
        
       // echo $codigo_general;
        $message= 'Registros actualizados '.$codigosActualizados ;
        return redirect()->route('indexVisador')->with('message',$message);        
        
    }

    public function updateMotorizado(Request $request)
    {
            
        $i = 0;
        foreach($request->file('Documento') as $file){
            $photo = new Gallery;
            $imageName = time().'-'.$file->getClientOriginalName().''. $i . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('imagenes/'.$request->codigos), $imageName);
            // assign the location of folder to the model
            $photo->tramite_id=$request->codigos;
            $photo->path = 'imagenes/'.$request->codigos.'/'. $imageName;
            $photo->filename = $imageName;
            $photo->save();
            $i++;
        }
        if(count($request->file('Documento'))==$i){
            $ucliente['usuario_id']=Auth::user()->name; 
            $ucliente['subestado_id']=$request->subestado;
            $ucliente['subsubestado_id']=$request->subsubestado;
            $ucliente['estado_id']=$request->estado;
            $now = Carbon::now();
            $ucliente['fecha_gestion_courier']=$now;
            $ucliente['inventario']=$request->inventario;
                if ($request->fechaAgendamiento!=null){
                    $ucliente['agendamiento']=$request->fechaAgendamiento.' '.$request->horaAgendamiento ;
                }
            $ucliente['provincia_ruta']=$request->provincia;
            
            $ucliente['observaciones']=$request->observaciones;
            $ucliente['numeroImagenes']=$i; 
            
            $codigosActualizados=0;
            $result=Tramites::where('numero_guia','=',$request->codigos)->update($ucliente);
                if($result){
                    $codigosActualizados=1;
                    app('App\Http\Controllers\HistorialController')->nuevo($request->codigos);

                }
            $message= 'Registros actualizados '.$codigosActualizados.'numero de imagenes Guardadas '.$i ;
            return redirect()->route('registroMotorizado')->with('message',$message);
            //return count($request->file('Documento'));
        }
    }


    public function updateDistribucion(Request $request){
        $i = 0;
        //return $request;
        
        foreach($request->file('Documento') as $file){
            $photo = new Gallery;
            $imageName = time().'-'.$file->getClientOriginalName().''. $i . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('imagenesDistribucion/'.$request->balija.'/'), $imageName);
            // assign the location of folder to the model
            $photo->tramite_id=($request->balija);
            $photo->path = 'imagenesDistribucion/'.$request->balija.'/'. $imageName;
            $photo->filename = $imageName;
            $photo->save();
            $i++;
        }
        if(count($request->file('Documento'))==$i){

            $ucliente['usuario_id']=Auth::user()->name; 
            $ucliente['subestado_id']=$request->subestado;
            
            $ucliente['estado_id']=$request->estado;
            $now = Carbon::now();
            $ucliente['fecha_gestion_courier']=$now;
            
                if ($request->fechaAgendamiento!=null){
                    $ucliente['agendamiento']=$request->fechaAgendamiento.' '.$request->horaAgendamiento ;
                }

            $ucliente['provincia_ruta']=$request->provincia;
            $ucliente['punto_distribucion']=$request->pdistribucion;
            $ucliente['observaciones']=$request->observaciones; 
            $ucliente['codigo_general']=$request->balija;
            if($request->tracking!=null){
                $ucliente['tracking']=$request->tracking;
                $ucliente['persona_recibir']=$request->personaRecibir;                             
            }
                        
            $result=Tramites::where('codigo_general','=',$request->balija)->update($ucliente);
            
          /*  if($result){
                $codigosActualizados++;
                app('App\Http\Controllers\HistorialController')->nuevo($resultado[$i]);
            }  */          
            $codigosActualizados=0;
              if($result){
                  $dataActualizada=Tramites::where('codigo_general','=',$request->balija)->get();
                  foreach ($dataActualizada as $key) {
                    $codigosActualizados++;
                    app('App\Http\Controllers\HistorialController')->nuevo($key->numero_guia);
                  }
                 
                 //   $codigosActualizados=1;

                    //app('App\Http\Controllers\HistorialController')->nuevo($request->codigos);
                    app('App\Http\Controllers\DistribucionController')->nuevo($ucliente);
                }



                //-------------------------------------------------------------------
                //Update Segundo Estado
                $ucliente1['usuario_id']=Auth::user()->name; 
                if($request->validadorEstados=="BODEGA"){
                $ucliente1['estado_id']=2;
                $ucliente1['subestado_id']=10;
                }else{
                    $ucliente1['estado_id']=4;
                    $ucliente1['subestado_id']=13;
                }
                
                $now = Carbon::now();
                $ucliente1['fecha_gestion_courier']=$now;
            
                if ($request->fechaAgendamiento!=null){
                    $ucliente1['agendamiento']=$request->fechaAgendamiento.' '.$request->horaAgendamiento ;
                }

                $ucliente1['provincia_ruta']=$request->provincia;
                $ucliente1['punto_distribucion']=$request->pdistribucion;
                $ucliente1['observaciones']=$request->observaciones; 
                $ucliente1['codigo_general']=$request->balija;
                if($request->tracking!=null){
                    $ucliente1['tracking']=$request->tracking;
                    $ucliente1['persona_recibir']=$request->personaRecibir;                             
                }
                        
            $result1=Tramites::where('codigo_general','=',$request->balija)->update($ucliente1);
            
          /*  if($result){
                $codigosActualizados++;
                app('App\Http\Controllers\HistorialController')->nuevo($resultado[$i]);
            }  */          
            $codigosActualizados1=0;
              if($result1){
                  $dataActualizada1=Tramites::where('codigo_general','=',$request->balija)->get();
                  foreach ($dataActualizada1 as $key1) {
                    $codigosActualizados1++;
                    app('App\Http\Controllers\HistorialController')->nuevo($key1->numero_guia);
                  }
                 
                 //   $codigosActualizados=1;

                    //app('App\Http\Controllers\HistorialController')->nuevo($request->codigos);
                    app('App\Http\Controllers\DistribucionController')->nuevo($ucliente1);
                }



                //-------------------------------------------------------------------
           $message= 'Valija actualizada. Registros actualizados '.$codigosActualizados ;
            return redirect()->route('indexDistribucion')->with('message',$message);
           //return $ucliente;
        }
    }


    public function upload(Request $request)
    {
        if($request->hasFile('file')){            
            $path = $request->file('file')->getRealPath();            
             //Excel::import(new BaseCarga,  $request->file);                
          //  $data= (new HeadingRowImport)->toArray($request->file);
          //  return $data;
          
            if (Excel::import(new BaseCarga,  $request->file)) {
                $message= 'Carga de datos exitosa';
                //return redirect('cargaBase')->with("message",$message);
                return redirect()->route('dbCarga')->with('message',$message);  
            }else{
                $message= 'No se cargo la Base de Datos';
                //return redirect('cargaBase')->with("message",$message);
                return redirect()->route('dbCarga')->with('message',$message);
            }
        }else{
                $message= 'No se cargo la Base de Datos';
                return redirect()->route('dbCarga')->with('message',$message);
        }      
    }
    public function bitacora(Request $request)
    {
        $f1=$request->fecha1.' 00:00:00';
        $f2=$request->fecha2.' 23:59:59';
       // $data['data']=DB::table('tramites')->select('id','nombre1','nombre2','apellido1','apellido2','estado_civil')->get();
       //$data['data']=DB::select(DB::raw(" 
       $data=DB::select(DB::raw(" 
       SELECT tramites.id,tramites.tramite_id , tramites.numero_guia , tramites.numero_lote , 
       tramites.nombre_cliente , tramites.estado , tramites.fecha_registro , tramites.ciclo , 
       tramites.fecha_para_entrega , tramites.cedula_destinatario , tramites.nombre_destinatario , 
       tramites.direccion_destinatario , tramites.ciudad_destino , tramites.telefono , 
       tramites.id_tarjeta , tramites.fecha_entrega , tramites.recibido_por , tramites.fecha_excepcion , 
       tramites.contenido , tramites.motivo_excepcion , tramites.mensajero_actual , tramites.cantidad , 
       tramites.id_venta , tramites.cedula , tramites.nombres , tramites.apellidos , 
       tramites.nombres_y_apellidos , tramites.provincia_domicilio , tramites.ciudad_domicilio , 
       tramites.parroquia_domicilio , tramites.cll_p_domicilio , tramites.numeracion_domicilio , 
       tramites.call_secundaria_domicilio , tramites.referencias_domicilio , tramites.direccion_completa_domicilio , 
       tramites.provincia_trabajo , tramites.ciudad_trabajo , tramites.parroquia_trabajo , tramites.cll_p_trabajo , 
       tramites.numeracion_trabajo , tramites.call_secundaria_trabajo , tramites.referencias_trabajo , 
       tramites.direccion_completa_trabajo , tramites.telefono_contactado , tramites.telefono_referencia , 
       tramites.telefono1 , tramites.telefono2 , tramites.telefono3 , tramites.telefono4 , tramites.telefono5 , 
       tramites.telefono6 , tramites.telefono7 , tramites.telefono8 , tramites.telefono9 , tramites.telefono10 , 
       tramites.id_cliente , tramites.fecha_gestion , tramites.creadas_no_creadas , tramites.imputable , 
       tramites.detalle_imputable , tramites.fecha_envio_creacion , tramites.nombre_de_la_base , tramites.lote , 
       tramites.codigo_campania , tramites.ciclo_courier , tramites.cierre_de_ciclo , tramites.guia_courier , 
       tramites.cedula_titular , tramites.estado_id , tramites.subestado_id, tramites.subsubestado_id , 
       tramites.usuario_id , tramites.fecha_gestion_courier as Tfecha_gestion,'' as localizacion from tramites where tramites.fecha_gestion_courier between '$f1' and '$f2'"));
    /*   $data['data'] = DB::table('tramites')
                            ->leftjoin('estados','tramites.estado_id' , '=', 'estados.id')
                            ->leftjoin('sub_estados', 'tramites.subestado_id' , '=','sub_estados.id')
                            ->leftjoin('subsub_estados', 'tramites.subsubestado_id' , '=','subsub_estados.id')
                            ->leftjoin('users', 'tramites.usuario_id' , '=','users.id')
                            ->select('tramites.tramite_id','tramites.numero_guia','tramites.numero_lote','tramites.nombre_cliente','tramites.estado','tramites.fecha_registro'
                            ,'tramites.ciclo','tramites.fecha_para_entrega','tramites.cedula_destinatario','tramites.nombre_destinatario'
                            ,'tramites.direccion_destinatario','tramites.ciudad_destino','tramites.telefono','tramites.id_tarjeta','tramites.fecha_entrega','tramites.recibido_por'
                            ,'tramites.fecha_excepcion','tramites.contenido','tramites.motivo_excepcion','tramites.mensajero_actual','tramites.cantidad','tramites.id_venta'
                            ,'tramites.cedula',
                            'tramites.nombres'  ,
                            'tramites.apellidos'  ,
                            'tramites.nombres_y_apellidos'  ,
                            'tramites.provincia_domicilio'  ,
                            'tramites.ciudad_domicilio'  ,
                            'tramites.parroquia_domicilio'  ,
                            'tramites.cll_p_domicilio'  ,
                            'tramites.numeracion_domicilio'  ,
                            'tramites.call_secundaria_domicilio'  ,
                            'tramites.referencias_domicilio'  ,
                            'tramites.direccion_completa_domicilio'  ,
                            'tramites.provincia_trabajo'  ,
                            'tramites.ciudad_trabajo'  ,
                            'tramites.parroquia_trabajo'  ,
                            'tramites.cll_p_trabajo'  ,
                            'tramites.numeracion_trabajo'  ,
                            'tramites.call_secundaria_trabajo'  ,
                            'tramites.referencias_trabajo'  ,
                            'tramites.direccion_completa_trabajo'  ,
                            'tramites.telefono_contactado'  ,
                            'tramites.telefono_referencia'  ,
                            'tramites.telefono1'  ,
                            'tramites.telefono2'  ,
                            'tramites.telefono3'  ,
                            'tramites.telefono4'  ,
                            'tramites.telefono5'  ,
                            'tramites.telefono6'  ,
                            'tramites.telefono7'  ,
                            'tramites.telefono8'  ,
                            'tramites.telefono9'  ,
                            'tramites.telefono10'  ,
                            'tramites.id_cliente'  ,
                            'tramites.fecha_gestion'  ,
                            'tramites.creadas_no_creadas'  ,
                            'tramites.imputable'  ,
                            'tramites.detalle_imputable'  ,
                            'tramites.fecha_envio_creacion'  ,
                            'tramites.nombre_de_la_base'  ,
                            'tramites.lote'  ,
                            'tramites.codigo_campania'  ,
                            'tramites.ciclo_courier'  ,
                            'tramites.cierre_de_ciclo'  ,
                            'tramites.guia_courier'  ,
                            'tramites.cedula_titular' 
                            
                            ,'estados.nombre as estadoNombre', 'sub_estados.nombre as subestadoNombre','subsub_estados.nombre as subsubestadosNombre','users.name as usuario','tramites.fecha_gestion_courier as Tfecha_gestion','users.location as localizacion')
                            //->exclude(['tramites.is_active','tramites.estado_id','tramites.subestado_id', 'tramites.usuario_id', 'tramites.updated_at', 'tramites.created_at'])
                            ->where('tramites.is_active','=',true)
                            ->whereBetween('tramites.fecha_gestion_courier',[$request->fecha1.' 00:00:00',$request->fecha2.' 23:59:59'])
                            ->get();
*/
//return $data[0]->estado_id;
//            return Estados::findOrFail($data[0]->estado_id)->nombre;

//return $data;
$i=0;
foreach ($data as $tr) {
    $data[$i]->estado_id=Estados::findOrFail($tr->estado_id)->nombre;
    $data[$i]->subestado_id=SubEstados::findOrFail($tr->subestado_id)->nombre; 
    if($data[$i]->subsubestado_id !=null ||$data[$i]->subsubestado_id!=''){
        $data[$i]->subsubestado_id=subsubEstado::findOrFail($tr->subsubestado_id)->nombre;   
    }    
    $i++;
}

        return Excel::download(new ReporteGestion($data),"Bitacora.xlsx");
    }

    public function asignarBase(Request $request)
    {
        $now = Carbon::now();
        $resultado=explode("\r\n",$request->codigos);
        $codigosActualizados=0;
        $userguia= UserGuia::create([
            'usuario_id'=>$request->usuarioGestion,
            'fecha'=> $now,
            'visible'=> '1'          
        ]);
       
        if($userguia){

            for ($i=0; $i < count($resultado); $i++) {

                $ucliente['usuario_id']=Auth::user()->name;                             
                $ucliente['estado_id']=$request->estado;
                $ucliente['subestado_id']=$request->subestado;
                $ucliente['subsubestado_id']=$request->subsubestado;   
                $ucliente['fecha_gestion_courier']=$now;          
                $ucliente['observaciones']=$request->observaciones; 
                $ucliente['usuario_asignado']=$request->usuarioGestion;
                $ucliente['provincia_ruta']=$request->provincia;
                $ucliente['punto_distribucion']=$request->pdistribucion;
                $result=Tramites::where('numero_guia','=',$resultado[$i])->update($ucliente);
                if($result){
                    Asignacion::create(['numero_guia'=>$resultado[$i],                                        
                        'usuario_asignado'=>$request->usuarioGestion,
                        'usuario_id'=>Auth::user()->name,
                        'user_guia_id'=>$userguia->id         
                    ]);
                    $codigosActualizados++;
    
                    app('App\Http\Controllers\HistorialController')->nuevo($resultado[$i]);
                }
            }
            
        }

            
        if($codigosActualizados==0){
            //Asignacion::where('user_guia_id', '=', $$userguia->id)->delete();
            UserGuia::destroy($userguia->id );
        }
        
        $message= 'Registros actualizados '.$codigosActualizados ;
        return redirect()->route('asignarBaseHome')->with('message',$message);             
    }

    public function destroy(Tramites $tramites)
    {
        //
    }
    public function editTramite($id)
    {
    $tramites=Tramites::findOrFail($id);
    return $tramites;
    //return $rolhaspermiso;
    //return view('administracion.Seguridad.editRol',compact('rol','permisos','rolhaspermiso'));
    }
}
