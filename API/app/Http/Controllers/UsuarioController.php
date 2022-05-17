<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return $usuarios;
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
        $usuario = new Usuario();
        $usuario->email =  $request->email;
        $usuario->nombreusuario =  $request->nombreusuario;
        $usuario->password =  $request->password;
        $usuario->rol =  $request->rol;

        $usuario->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $usuario = Usuario::findOrFail($request->id);
        $usuario->email =  $request->email;
        $usuario->nombreusuario =  $request->nombreusuario;
        $usuario->password =  $request->password;
        $usuario->rol =  $request->rol;

        $usuario->save();

        return $usuario;
    }


    public function login(Request $request)
    {
        $usuario = Usuario::where('nombreusuario', $request->nombreusuario)->where('password', $request->password)->first();   //unico registro
        //$usuario = Usuario::where('nombreusuario', $request->nombreusuario)->get();   //multiples registros
        if(!($usuario == null)){
            $valido = 'true';
            return [
                'valido'=>$valido,
                'id'=>$usuario->id,
                'rol'=>$usuario->rol
            ];
        }
        //$usuario = Usuario::findOrFail($request->id);
        $valido = 'false';
        return [
            'valido'=>$valido,
            'id'=>null,
            'rol'=>null
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
     $usuario = Usuario::destroy($request->id);
     return $usuario; 
    }
}
