<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use Illuminate\Http\Request;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\HeadingRowImport;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

Use App\Imports\BaseCarga;

class AsignacionController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $resultado=explode("\r\n",$request->codigos);
        $codigosActualizados=0;
        for ($i=0; $i < count($resultado); $i++) {
          //$ucliente['estado']=$request->subestado;
            $ucliente['usuario_id']=Auth::user()->id; 
            $ucliente['subestado_id']=$request->subestado;
            $ucliente['estado_id']=$request->estado;
            $result=Asignacion::where('tramite_id','=',$resultado[$i])->update($ucliente);
            if($result){
                $codigosActualizados++;
            }
        }              
        $message= 'Registros actualizados '.$codigosActualizados ;
        return redirect()->route('registroGestion')->with('message',$message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if($request->hasFile('file')){            
            $path = $request->file('file')->getRealPath();            
             //Excel::import(new BaseCarga,  $request->file);                
            //$data= (new HeadingRowImport)->toArray($request->file);
            
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
                $message= 'Error en el archivo, No se cargo la Base de Datos';
                return redirect()->route('dbCarga')->with('message',$message);
        }      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imgreso\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imgreso\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignacion $asignacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imgreso\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignacion $asignacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imgreso\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignacion $asignacion)
    {
        //
    }
}
