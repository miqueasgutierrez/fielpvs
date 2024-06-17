<?php

namespace App\Http\Controllers;


use App\Models\dependencia_cargo;
use App\Models\Dependencia;
use App\Models\Registro;


use Illuminate\Http\Request;

class CandidatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $dependenciasCargos = dependencia_cargo::with(['dependencia', 'cargo'])->get();
        return view('candidatos.crear', compact('dependenciasCargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dependencias = Dependencia::all();

         $registros = Registro::paginate(1000);

        return view('candidatos.crear', compact('dependencias','registros'));
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


    public function getCargos($dependeciaId)    
    {

$cargos = dependencia_cargo::where('id_dependencia', $dependeciaId)
            ->with('cargo')
            ->get()
            ->pluck('cargo.nombre', 'id');
        
        return response()->json($cargos);

    }


}
