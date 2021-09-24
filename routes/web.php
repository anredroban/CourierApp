<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\SubEstadosController;
use App\Http\Controllers\TramitesController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SubsubEstadoController;

use App\Http\Controllers\DropzoneController;
use App\Http\controllers\ReportExcelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('auth.login');
});
*/

Auth::routes();
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::group([ 'middleware' => ['auth']], function(){

Route::get('/dc', function () {
    return view('layouts.template');
});
Route::get('/', function () {
    return view('administracion.courierHome');
});
//rol
Route::get('/rol',[RolController::Class,'index'])->name('listRol');
Route::post('/rol/save',[RolController::Class,'newRol'])->name('newRol');
Route::get('/rol/create', [RolController::Class,'create'])->name('formRol');
Route::get('/rolEdit/{rol}', [RolController::Class,'edit'])->name('rolEdit');
Route::put('/rolEdit/{rol}', [RolController::Class,'update'])->name('editRol');

//Registro de Usuarios
Route::get('/nuevoUsuario',[UsuariosController::Class,'home'])->name('formUser');
Route::post('/nuevoUsuario/save',[UsuariosController::Class,'store'])->name('newUser');
Route::get('/gestionUsuario',[UsuariosController::Class,'index'])->name('gestionUser');
Route::delete('/user/{id}', [UsuariosController::Class,'destroy']);

Route::get('/userEdit/{user}', [UsuariosController::Class,'edit'])->name('userEdit');
Route::put('/userEdit/{user}', [UsuariosController::Class,'update'])->name('userUpdate');


//editar datos de usuarios
Route::get('/userEditFrom/{user}', [UsuariosController::Class,'editUser'])->name('userEditForm');
Route::put('/userEditFrom/{user}', [UsuariosController::Class,'updateUser'])->name('userEditFormUpdate');

//Gestion
Route::post('/guardarGestionGeneral',[TramitesController::class,'update']);
Route::post('/guardarGestionVisador',[TramitesController::class,'updateVisador']);
Route::post('/guardarGestion',[TramitesController::class,'updateMotorizado']);

//GestionAsignarBase
Route::get('/asignarBase',[TramitesController::Class,'formAsignarBase'])->name('asignarBaseHome');
Route::post('/asignarBaseSave',[TramitesController::Class,'asignarBase'])->name('asignarBase');

//home courier
Route::get('/courier',[TramitesController::class,'home'])->name('homeCourier');

//Registro Codigo
Route::get('/registro',[GestionController::class,'home'])->name('registroGestion');

//Registro Codigo registroMotorizado
Route::get('/registroMotorizado',[GestionController::class,'homeMotorizado'])->name('registroMotorizado');

//vista gestion distribucion
Route::get('/indexDistribucion',[GestionController::class,'indexDistribucion'])->name('indexDistribucion');
Route::post('/guardarGestionArribo',[TramitesController::class,'updateDistribucion']);

//indexVisador
Route::get('/indexVisador',[GestionController::class,'indexVisador'])->name('indexVisador');

//Registro Codigo
Route::get('/gestion',[GestionController::class,'index'])->name('listadoCodigos');
//Metodos BaseDatos

Route::get('/cargarBase',[TramitesController::class,'index'])->name('dbCarga');
Route::post('/descargar_bitacora',[TramitesController::class,'bitacora'])->name('dbDescarga');
//metodo
Route::get('/descargarReporte',function () {
    return view('administracion.baseDatos.descargaBase');
})->name('vistaReporte');
Route::post('/carga_base',[TramitesController::class,'upload']);

//Vista General
Route::get('/dc',function () {
    return view('layouts.index2');
});
Route::get('/testHistorial/{id}',[HistorialController::class,'nuevo']);
//obtener subestado y subsubestado
Route::get('/subestado/{id?}', [SubEstadosController::class, 'getSubestado'])->name('getSubestado');
Route::get('/subsubestado/{id?}', [SubsubEstadoController::class, 'getSubSubestado'])->name('getSubsubestado');



Route::get('/home', 'HomeController@index')->name('home');


// Dropzone
Route::get('dropzone', [DropzoneController::class,'index'])->name('indexImagenes');

Route::post('dropzone/upload', [DropzoneController::class,'upload'])->name('dropzone.upload');
Route::get('dropzone/fetch', [DropzoneController::class,'fetch'])->name('dropzone.fetch');
Route::get('dropzone/delete', [DropzoneController::class,'delete'])->name('dropzone.delete');
//historico
Route::get('historico', [HistorialController::class,'index'])->name('indexHistorico');
Route::get('historico/buscar', [HistorialController::class,'buscar'])->name('historico.buscar');

//reporte Imprimir Motorizado
Route::get('/impresion', [ReportExcelController::class, 'index'])->name('impresion.index');
Route::get('/impresion/pdf', [ReportExcelController::class, 'createPDF'])->name('impresion.pdf');
Route::get('/impresion/{id}', [ReportExcelController::Class,'edit'])->name('impresion');
// Route::delete('/eliminarUserGuia/{id}', [ReportExcelController::Class,'destroy']);

//listar registros de gestion
Route::get('/litaGestion', [GestionController::class, 'indexAsignarListado'])->name('asignado.index');
Route::get('/litaGestion/{tramite}', [TramitesController::Class,'editTramite'])->name('tramiteEdit');

//gestion de vista para estado bodega
Route::get('/registroBodega',[GestionController::class,'homeBodega'])->name('bodega.index');
Route::post('/guardarGestionBodega',[TramitesController::class,'updateBodega']);

}); 