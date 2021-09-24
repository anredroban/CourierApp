<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramites;
use PDF;
use Auth;
use App\User;
use App\Models\UserGuia;
Use App\Models\Asignacion;

class ReportExcelController extends Controller
{
    public function index(){
        $data=UserGuia::where('visible','1')->orderBy('id', 'DESC')->get(); 
        //return $data;
        return view('administracion.reportes.listadoMotorizado', compact('data'));
    }
    public function edit(UserGuia $id){
        $data=Asignacion::select('numero_guia')->where('user_guia_id',$id->id)->pluck('numero_guia');
        $count=count($data);
        $numOrden=$id->id;
        $courier=User::select('user')->where('name',$id->usuario_id)->first();
        $tramites = Tramites::whereIn('numero_guia',$data)->get();
       
        return view('administracion.reportes.reporteMotorizado', compact('data','count','courier','numOrden','tramites'));
    }
    public function createPDF(){
        //Recuperar todos los productos de la db
        $productos = Tramites::where('usuario_id',1)->get();
        view()->share('productos', $productos);
        //$pdf = PDF::loadView('administracion.reportes.reporteMotorizado', $productos);
        //return $pdf->download('archivo-pdf.pdf');
        return \PDF::loadView('administracion.reportes.reporteMotorizado', $productos)
        ->setPaper('A4', null)
        
        ->stream();
    }
}
