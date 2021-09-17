<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\RolHasPermiso;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    public function index(Request $request)
    {
        $rols=Rol::all();        
        return view('administracion.Seguridad.rolListado',compact('rols'));
    }
    public function create()
    {
        $permisos=Permission::all();
        return view('administracion.Seguridad.rolRegistro',compact('permisos'));
    }
    public function newRol(Request $request)
    {
        $date=Carbon::now();  
        $cont=0;
        $rol = Role::create(['name' => $request->name]);
        $message=$rol ? 'Rol Creado' : 'No se Puedo crear el Rol';   
         if ($message=='Rol Creado') {
            //foreach ($request->perm as $key ) {
                return $rol->permissions()->sync($request->perm);
                /* if(Permission::create(['name' => $key])->syncRoles([$rol])){
                    $cont++;
                }*/
                           
            //}
           /* if(count($request->perm)==$cont)
            {
                $message="Rol Creado, Permisos Erroneos";
            }*/
         }
                 
         //return redirect()->route('formRol')->with('message',$message);           
    }
    public function edit(Rol $rol)
    {

    $permisos=Permission::all();
    $rolhaspermiso=RolHasPermiso::where('role_id',$rol->id)->get();
    //return $rolhaspermiso;
    return view('administracion.Seguridad.editRol',compact('rol','permisos','rolhaspermiso'));
    }
    public function update(Request $request, Role $rol)
    {
    //return $request;
    //$rol->permissions()->sync($request->perm);
    return $rol->permissions()->sync($request->permisos);
    //$user->roles()->sync($request->roles); 
   //return redirect()->route('rolEdit',$rol)->with('message','Se cambio los Permisos');
    }
}
