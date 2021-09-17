<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropzoneController extends Controller
{
    function index()
    {
        $codigoGeneral=DB::table('tramites')
            ->select('codigo_general')
            ->whereNotNull('codigo_general')
            ->distinct()
            ->get();
     return view('administracion.gestion.dropzone',compact('codigoGeneral'));
    }

    function upload(Request $request)
    {
        $image = $request->file('file');

        $imageName = time() . '.' . $image->extension();
   
        $image->move(public_path('images'), $imageName);

     return response()->json(['success' => $imageName]);
    }

    function fetch(Request $request)
    {
    
    
        $path=public_path($request->ruta);
     $images = \File::Files($path);
     $output = '<div class="row">';
    // $nombre_fichero = '/path/to/foo.txt';


     if(file_exists($path)){
        foreach($images as $image)
        {
         $output .= '
         <div class="col-md-2 imgRemove"  id="imgRmv" style="margin-bottom:16px;" align="center">
                   <img src="'.asset($request->ruta.'/' . $image->getFilename()).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                   <a href="'.asset($request->ruta.'/' . $image->getFilename()).'" download class="btn btn-sm btn-info"><i class="fa fa-download"></i> </a>
                   <a href="'.asset($request->ruta.'/' . $image->getFilename()).'"  class="btn btn-sm btn-info" target="_blank" ><i class="fa fa-picture">Ver</i> </a>
                   
                   <!--<button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">eliminar</button>-->
               </div>
         ';
        } 
        }else{
            $output .= '<h3>'.$path.'te</h3>';
     }
    
     $output .= '</div>';
     echo $output;
    }

    function delete(Request $request)
    {
     if($request->get('name'))
     {
      \File::delete(public_path('imagenes/186027949/2021-09-08/' . $request->get('name')));
     }
    }
}
