<?php

namespace App\Http\Controllers;

use App\Models\Distribucion;
use Illuminate\Http\Request;

class DistribucionController extends Controller
{
    
    
    public function nuevo($req)
    {
       
        
        Distribucion::create([

    'codigo_general_tramite'=>$req['codigo_general'],
    'fecha'=>$req['agendamiento'],
    'provincia_ruta'=>$req['provincia_ruta'],
    'punto_distribucion'=>$req['punto_distribucion'],
    'traking'=>$req['tracking'],
    'persona'=>$req['persona_recibir'],            
        ]);
    }

}
