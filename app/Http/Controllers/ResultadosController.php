<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;


use App\Models\Circuito;


use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ResultadosController extends Controller
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

     public function nacionales()
    {

        $sql = "
    SELECT id, nombre
    FROM dependencias 
    WHERE nombre NOT IN ('DIRECTIVA DE ZONA NACIONAL', 'PRESBÍTERO REGIONAL', 'NINGUNA') 
    ORDER BY orden ASC;
";
      $dependencias = DB::select($sql);


          return view('resultados.nacionales', compact('dependencias'));

       
    }




    public function regionales()
    {

        $sql = "
    SELECT id, nombre , descripcion_regional 
    FROM dependencias 
    WHERE nombre NOT IN ('DIRECTIVA DE ZONA NACIONAL', 'DIRECTIVA NACIONAL DE LA FIELPVS', 'NINGUNA','IBFS') 
    ORDER BY orden ASC;
";
      $dependencias = DB::select($sql);


          $circuitos = Circuito::all();


          return view('resultados.regionales', compact('dependencias','circuitos'));

       
    }



}
