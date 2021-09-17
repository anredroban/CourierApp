<?php

namespace App\Http\Controllers;

use App\Models\SubEstados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SubEstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSubestado(Request $request)
 {
    //$data=$clientes=DB::table('sub_estados')->where('is_active',true)->where('estado_id',$request->id)->orderBy('id')->get(); 
    $subestado=SubEstados::select('id','nombre')->where('is_active',true)->where('estado_id',$request->id)->get();
     //$subestado=SubEstados::all();
    //$datos = Arr::collapse([$subestado->id, $subestado->nombre]);
    $collection = collect($subestado);
    $keyed = $collection->mapWithKeys(function ($item, $key) {
        return [$item['id'] => $item['nombre']];
    });
    
    $keyed->all();   
     return $subestado;
 }
    public function index()
    {
        //
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
     * @param  \App\SubEstados  $subEstados
     * @return \Illuminate\Http\Response
     */
    public function show(SubEstados $subEstados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubEstados  $subEstados
     * @return \Illuminate\Http\Response
     */
    public function edit(SubEstados $subEstados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubEstados  $subEstados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubEstados $subEstados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubEstados  $subEstados
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubEstados $subEstados)
    {
        //
    }
}
