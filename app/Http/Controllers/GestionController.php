<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignacion;
use App\Models\Estados;
use App\Models\SubEstados;
use App\Models\Provincia;
use Illuminate\Support\Facades\DB;

class GestionController extends Controller
{
    public function home()
    {
        
        $provincias=Provincia::select('id','provincia')->where('is_active','=',true)->get();
        $estados=Estados::where('is_active','=',true)->get();
        
        return view('administracion.gestion.registro',compact('provincias','estados'));
    }
    public function homeMotorizado()
    {
        $infor['provincias']=Provincia::select('id','provincia')->where('is_active','=',true)->get();
        $infor['estados']=Estados::where('is_active','=',true)->where('id',4)->get();
        return view('administracion.gestion.registroMotorizado',$infor);
    }

    public function index()
    {
        $infor['data'] = DB::table('tramites')
        ->leftjoin('estados', 'estados.id', '=', 'tramites.estado_id')
        ->leftjoin('sub_estados', 'sub_estados.id', '=', 'tramites.subestado_id')
        ->leftjoin('subsub_estados', 'subsub_estados.id', '=', 'tramites.subsubestado_id')
        ->leftjoin('users', 'users.id', '=', 'tramites.usuario_id')
        ->select('tramites.*','tramites.fecha_gestion_courier as Tfecha_gestion', 'estados.nombre as estadoNombre', 'sub_estados.nombre as subestadoNombre','users.name as usuario','subsub_estados.nombre as subsubestadoNombre')
        ->where('tramites.is_active','=',true)
        ->take(1000)
        ->get();

        //$infor['data']=Asignacion::where('is_active','=',true)->get();
       
        return view('administracion.gestion.listado',$infor);
      //return $infor;
    }
    public function indexDistribucion()
    {       
        $codigoGeneral=DB::table('tramites')
            ->select('codigo_general')
            ->whereNotNull('codigo_general')
            ->distinct()
            ->get();
        $provincias=Provincia::select('id','provincia')->where('is_active','=',true)->get();
        $estados=Estados::where('is_active','=',true)->whereIn('id',[3])->first();
        $subestados=SubEstados::where('is_active','=',true)->whereIn('id',[12])->first();
        //return view('administracion.gestion.registroDistribucion', compact('estados','usuarios','provincias'));
        return view('administracion.gestion.registroDistribucion',compact('estados','provincias','subestados','codigoGeneral'));
        //return $codigoGeneral;
    }
}
