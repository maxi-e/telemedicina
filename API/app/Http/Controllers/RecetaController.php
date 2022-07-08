<?php

namespace App\Http\Controllers;

use App\Models\DetalleReceta;
use App\Models\Medicamento;
use App\Models\Paciente;
use App\Models\Receta;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;

class RecetaController extends Controller
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
        $hash = $request->hash;
        $hashencriptado = $request->hashencriptado;
        
        $receta = new Receta();
        $detallereceta = new Detallereceta();

        //guardado de la receta
        $receta->fecha =  $request->receta['fecha'];
        $receta->diagnostico =  $request->receta['diagnostico']; 
        $receta->id_paciente =  $request->receta['id_paciente'];
        $receta->id_medico =  $request->receta['id_medico'];
        $receta->entregado =  0;
        
        $resul = $this->validarHash($receta, $hashencriptado, $hash);

        if($resul == 1){
            $receta->hash = $hash;
            $receta->hashencriptado = $hashencriptado;
            $receta->save();
            $id = Receta::latest('id')->first()->id;
            
            //guardado del detalle de la receta 
            $detallerecetas = $request->receta['detallereceta'];

            foreach($detallerecetas as $d){
            $detallereceta->indicacion = $d['indicacion'];
            $detallereceta->cantidad = $d['cantidad'];
            $detallereceta->id_receta = $id;
            $detallereceta->id_medicamento = $d['id_medicamento'];
            $detallereceta->save();
            }

        return ['ok', $detallereceta];
        }
        else{
            return 'No se pudo verificar que la firma electronica loe corresponda al medico';
        }

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

    public function getRecetas($id_paciente)
    {
        $recetas = Receta::query()->where('id_paciente','=', $id_paciente)->get();
        $paciente = Paciente::query()->where('id','=', $id_paciente)->first();
        foreach($recetas as $r){
            $r->detallerecetas = DetalleReceta::query()->where('id_receta','=',$r->id)->get();
            foreach($r->detallerecetas as $dr){
                $dr->descripcion =  Medicamento::query()->where('id','=',$dr->id_medicamento)->first()->descripcion;
            }
        }
        return ["nombre"=>$paciente->nombre,"recetas"=>$recetas];
    }

    public function validarHash(Receta $receta, String $hashencriptado, String $hash)  //valida el hash de la firma 
    {
        //cargo la ruta que tiene que tener el archivo con la clave publica del medico
        $pathToPublicKey =  public_path("{$receta['id_medico']}.pem");
        // obtengo el contenido de la clave
        $publicKeyString = file_get_contents($pathToPublicKey);
        if (!$publicKey = openssl_pkey_get_public($publicKeyString)) die('Fallo clave publica');
        //verifico la firma mediante el metodo verify
        $result = openssl_verify($hash, base64_decode($hashencriptado), $publicKey, OPENSSL_ALGO_SHA256);

        return($result);
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
