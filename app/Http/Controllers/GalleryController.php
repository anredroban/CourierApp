<?php

namespace App\Http\Controllers;
use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    
    public function index()
    {
        return view('administracion.gestion.imagenes');
    }

}
