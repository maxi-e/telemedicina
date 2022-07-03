<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getIdUsuario($id_usuario)
    {
        $medico = Medico::query()->where('id_usuario','=', $id_usuario)->first();
        return $medico;
    }

    public function generarClaves($id_usuario){
    
        $medico = Medico::query()->where('id_usuario','=', $id_usuario)->first();

        $rsaKey = openssl_pkey_new(array( 
            'private_key_bits' => 1024,
            'private_key_type' => OPENSSL_KEYTYPE_RSA,
        ));
        $privKey = openssl_pkey_get_private($rsaKey); 
        openssl_pkey_export($privKey, $details);
        $pubKey = openssl_pkey_get_details($rsaKey);
        $pubKey = $pubKey["key"];

        openssl_pkey_export_to_file($privKey,"{$medico->nombre}-key");
        file_put_contents("{$medico->id}.pem", $pubKey);
        return $details;
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
