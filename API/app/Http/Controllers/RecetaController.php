<?php

namespace App\Http\Controllers;

use App\Models\DetalleReceta;
use App\Models\Receta;
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
        $receta = new Receta();
        $detallereceta = new Detallereceta();

        //guardado de la receta

        $receta->fecha =  $request->fecha;
        $receta->id_paciente =  $request->id_paciente;
        $receta->id_medico =  $request->id_medico;
        $receta->entregado =  0;
        $receta->save();
        $id = Receta::latest('id')->first()->id;

        //guardado del detalle de la receta 

        $detallerecetas = $request->detallerecetas;

        foreach($detallerecetas as $d){
            $detallereceta->indicacion = $d['indicacion'];
            $detallereceta->cantidad = $d['cantidad'];
            $detallereceta->id_receta = $id;
            $detallereceta->id_medicamento = $d['id_medicamento'];
            $detallereceta->save();
        }

         return 'ok';

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
        foreach($recetas as $r){
            $r->detallerecetas = DetalleReceta::query()->where('id_receta','=',$r->id)->get();
        }
        return $recetas;
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
