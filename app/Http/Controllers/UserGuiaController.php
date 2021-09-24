<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserGuia;

class UserGuiaController extends Controller
{
    public function store($request){
        return UserGuia::create([
            'usuario_id'=>$request->usuarioGestion            
        ]);
    }
}
