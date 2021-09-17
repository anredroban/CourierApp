<?php

namespace App\Http\Controllers;

use App\Models\subsubEstado;
use Illuminate\Http\Request;

class SubsubEstadoController extends Controller
{
    public function getSubSubestado(Request $request)
    {
       //$data=$clientes=DB::table('subsub_estados')->where('is_active',true)->where('subestado_id',$request->id)->orderBy('id')->get(); 
       $subestado=subsubEstado::select('id','nombre')->where('is_active',true)->where('subestado_id',$request->id)->get();
        //$subestado=SubEstados::all();
       //$datos = Arr::collapse([$subestado->id, $subestado->nombre]);
       $collection = collect($subestado);
       $keyed = $collection->mapWithKeys(function ($item, $key) {
           return [$item['id'] => $item['nombre']];
       });
       
       $keyed->all();   
        return $subestado;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\subsubEstado  $subsubEstado
     * @return \Illuminate\Http\Response
     */
    public function show(subsubEstado $subsubEstado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subsubEstado  $subsubEstado
     * @return \Illuminate\Http\Response
     */
    public function edit(subsubEstado $subsubEstado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subsubEstado  $subsubEstado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subsubEstado $subsubEstado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subsubEstado  $subsubEstado
     * @return \Illuminate\Http\Response
     */
    public function destroy(subsubEstado $subsubEstado)
    {
        //
    }
}
