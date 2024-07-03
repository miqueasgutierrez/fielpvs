<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;

use App\Models\Registro;

use App\Models\dependencia_cargo;
use App\Models\Ambitodependencias;
use App\Models\Elecciones;
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

      $ambito = Ambitodependencias::with(['dependencias'])->findOrFail($idambito);

    return view('elecciones.candidatos', compact('dependencia','ambito'));

    }


     public function electiva($iddependencia, $idambito)
    {

 $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito) {
        $query->where('id_ambito', $idambito);
    }])
    ->findOrFail($iddependencia);


     $ambito = Ambitodependencias::with(['dependencias'])->findOrFail($idambito);

    return view('elecciones.electiva', compact('dependencia','ambito'));

    }

     public function cargos($iddependencia, $idambito)
    
    {

    $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito) {
        $query->where('id_ambito', $idambito);
    }])
    ->findOrFail($iddependencia);


     $ambito = Ambitodependencias::with(['dependencias'])->findOrFail($idambito);

    return view('elecciones.cargos', compact('dependencia','ambito'));

    }


    public function elector($iddependencia, $idambito)
    
    {

    $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito) {
        $query->where('id_ambito', $idambito);
    }])
    ->findOrFail($iddependencia);


     $ambito = Ambitodependencias::with(['dependencias'])->findOrFail($idambito);

    return view('elecciones.elector', compact('dependencia','ambito'));

    }


    public function datos(Request $request)
    
    {

// Asegúrate de que el campo 'cedula' está presente en la solicitud
    $idcedula = $request->input('cedula');
 
  $elector = Registro::where('cedula', $idcedula)->first();

$idambito1='1';
$idambito2='2';
$idambito3='3';
$idambito4='4';

if (!$elector) {

     return back()->with('success', 'La cédula no existe en los registros.')->with('success', 'La cédula no existe en los registros.');

    }

 $elecciones1 = Ambitodependencias::where('id', $idambito1)
            ->with(['dependencias.dependencia.cargos' => function($query) {
                $query->orderBy('nombre', 'asc');
            }])->get();

$elecciones2 = Ambitodependencias::where('id', $idambito2)
            ->with(['dependencias.dependencia.cargos' => function($query) {
                $query->orderBy('nombre', 'asc');
            }])->get();

$elecciones3 = Ambitodependencias::where('id', $idambito3)
            ->with(['dependencias.dependencia.cargos' => function($query) {
                $query->orderBy('nombre', 'asc');
            }])->get();

$elecciones4 = Ambitodependencias::where('id', $idambito4)
            ->with(['dependencias.dependencia.cargos' => function($query) {
                $query->orderBy('nombre', 'asc');
            }])->get();

   return view('elecciones.datos', compact('elector','elecciones1','elecciones2','elecciones3','elecciones4'));

    }

    public function votacion($idvotante,$iddependencia, $idambito)
    
    {

     $cedula = Registro::where('id', $idvotante)->value('cedula');

   $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito) {
        $query->where('id_ambito', $idambito);
    }])
    ->findOrFail($iddependencia);

      $ambito = Ambitodependencias::with(['dependencias'])->findOrFail($idambito);

    return view('elecciones.votacion', compact('dependencia','ambito','idvotante','cedula'));

    }


     public function votacionfinal(Request $request)
    {


    // Asignación de variables
    $idVotante = $request->idvotante;
    $idCandidatos = $request->idcandidato;

    // Iteración sobre los candidatos
    foreach ($idCandidatos as $idCandidato) {
        Elecciones::create([
            'id_votante' => $idVotante,
            'id_candidato' => $idCandidato
        ]);
    }

    // Redireccionamiento con mensaje de éxito


$idcedula = $request->input('cedula');
 
  $elector = Registro::where('cedula', $idcedula)->first();

$idambito1='1';
$idambito2='2';
$idambito3='3';
$idambito4='4';

if (!$elector) {

     return back()->with('success', 'La cédula no existe en los registros.')->with('success', 'La cédula no existe en los registros.');

    }

 $elecciones1 = Ambitodependencias::where('id', $idambito1)
            ->with(['dependencias.dependencia.cargos' => function($query) {
                $query->orderBy('nombre', 'asc');
            }])->get();

$elecciones2 = Ambitodependencias::where('id', $idambito2)
            ->with(['dependencias.dependencia.cargos' => function($query) {
                $query->orderBy('nombre', 'asc');
            }])->get();

$elecciones3 = Ambitodependencias::where('id', $idambito3)
            ->with(['dependencias.dependencia.cargos' => function($query) {
                $query->orderBy('nombre', 'asc');
            }])->get();

$elecciones4 = Ambitodependencias::where('id', $idambito4)
            ->with(['dependencias.dependencia.cargos' => function($query) {
                $query->orderBy('nombre', 'asc');
            }])->get();

return view('elecciones.datos', compact('elector', 'elecciones1', 'elecciones2', 'elecciones3', 'elecciones4'))
    ->with('success', 'Votacion Exitosa.');

  
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
