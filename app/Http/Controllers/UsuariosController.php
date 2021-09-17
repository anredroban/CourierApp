<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UsuariosController extends Controller
{
    public function home()
    {
        $roles=Role::all();
        return view('administracion.Usuarios.userRegistro',compact('roles'));
    }
    public function index()
    {
        $usuarios['usuarios']=User::all();
        //$usuarios['usuarios']=User::where('rol','!=','admin')->get();
        return view('administracion.Usuarios.userListado',$usuarios);
    }
   

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'user'=>'required|unique:users|string|max:255',
            'location'=>'required',
            'rol'=>'required',
            'ci' => 'required',
            'password' => 'required|string|min:8|confirmed',
            
         ]);
         
         $usuario=User::create([
             'name'=>$request->name,
             'user'=>$request->user,
             'ci'=>$request->ci,
             'rol'=>$request->rol,
             'location'=>$request->location,
             
             'is_active'=>true,
             'password'=>Hash::make($request->password),             
         ])->assignRole($request->rol);
         
         $message=$usuario ? 'Usuario Creado' : 'No se Puedo crear el usuario';          
         return redirect()->route('formUser')->with('message',$message);
    }

    public function destroy($id)
    {
        $result=User::destroy($id);
        $message=$result ? 'Usuario Eliminado' : 'No se elimino el Usuario';
        return redirect()->route('gestionUser')->with('mensaje',$message);
    }
    public function edit(User $user)
    {

    $role=Rol::all();
    //return ($role);
      return view('administracion.Usuarios.editUsuario',compact('user','role'));
    }
    public function update(Request $request, User $user)
    {
       $usuario=$user;
        $usuario->rol=$request->roles[0];
        $usuario->save();
       // return $request->roles[0];
        $user->roles()->sync($request->roles); 
    return redirect()->route('userEdit',$user)->with('message','Se asigno los roles');
    }
}
