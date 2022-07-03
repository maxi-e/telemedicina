<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Rutas Usuarios
Route::get('/usuarios','App\Http\Controllers\UsuarioController@index'); //mostrar todos los registros
Route::post('/usuarios','App\Http\Controllers\UsuarioController@store'); //crear usuario
Route::post('/usuarios/login','App\Http\Controllers\UsuarioController@login'); //login usuario
Route::put('/usuarios','App\Http\Controllers\UsuarioController@update'); //actualiza usuario
Route::delete('/usuarios','App\Http\Controllers\UsuarioController@destroy'); //elimina usuario

//Rutas Pacientes
Route::get('/pacientes','App\Http\Controllers\PacienteController@index'); //mostrar todos los registros
Route::get('/pacientes/{id}','App\Http\Controllers\PacienteController@show'); //
Route::get('/pacientes/dni/{dni}','App\Http\Controllers\PacienteController@getdni'); //Busca un paciente por dni

//Rutas Medicos
//generarClaves
Route::get('/medicos/{id}','App\Http\Controllers\MedicoController@getIdUsuario'); //Busca un medico por el id de usuario; por si se quiere mostrar algun dato del mismo
Route::get('/medicos/clave/{id}','App\Http\Controllers\MedicoController@generarClaves'); //Genera las claves publica y privada del medico en cuestion y se guarda la clave publica en un archivo pem, la privada se retorna

//Rutas Medicamentos

Route::get('/medicamentos','App\Http\Controllers\MedicamentoController@getall'); //mostrar todos los registros
Route::get('/medicamentos/{descripcion}','App\Http\Controllers\MedicamentoController@getdescripcion'); //mostrar todos los registros



//Rutas Receta

Route::get('/recetas/{id_paciente}','App\Http\Controllers\RecetaController@getRecetas'); //listar recetas
Route::post('/recetas','App\Http\Controllers\RecetaController@store'); //agregar una receta
Route::post('/recetas/validar','App\Http\Controllers\RecetaController@validarHash'); //agregar una receta




