<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;

use App\Models\dependencia_cargo;
use App\Models\Ambitodependencias;

use Illuminate\Http\Request;

class EleccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $elecciones = Ambitodependencias::with(['dependencias.dependencia.cargos' => function($query) {
        $query->orderBy('nombre', 'asc');
    }])->get();

        return view('elecciones.index',compact('elecciones'));
    }

        
    public function candidatos($iddependencia, $idambito)
    {

 $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito) {
        $query->where('id_ambito', $idambito);
    }])
    ->findOrFail($iddependencia);

    return view('elecciones.candidatos', compact('dependencia'));

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
       

                           $dependencia = Dependencia::with(['cargos'])->findOrFail($id);
                            

                             

                    /* dd($candidatos); */
        return view('elecciones.electiva', compact('dependencia'));
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
