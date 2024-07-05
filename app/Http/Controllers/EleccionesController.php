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

   
    $currentYear = date('Y');

    $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito, $iddependencia, $currentYear) {
        $query->where('id_ambito', $idambito)->with(['candidatos' => function ($query) use ($iddependencia, $idambito, $currentYear) {
            $query->whereHas('cargo', function ($query) use ($iddependencia) {
                $query->where('id_dependencia', $iddependencia);
            })
            ->whereYear('candidatos.created_at', $currentYear)
            ->withCount(['elecciones' => function ($query) use ($idambito) {
                $query->where('id_ambito', $idambito);
            }]);
        }]);
    }])->findOrFail($iddependencia);

    $ambito = Ambitodependencias::with(['dependencias'])->findOrFail($idambito);

    return view('elecciones.candidatos', compact('dependencia', 'ambito'));

    }


     public function electiva($iddependencia, $idambito)
    {

  $currentYear = date('Y');

    $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito, $iddependencia, $currentYear) {
        $query->where('id_ambito', $idambito)->with(['candidatos' => function ($query) use ($iddependencia, $idambito, $currentYear) {
            $query->whereHas('cargo', function ($query) use ($iddependencia) {
                $query->where('id_dependencia', $iddependencia);
            })
            ->whereYear('candidatos.created_at', $currentYear)
            ->withCount(['elecciones' => function ($query) use ($idambito) {
                $query->where('id_ambito', $idambito);
            }]);
        }]);
    }])->findOrFail($iddependencia);

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

    $iddependencia = $request->input('iddependencia');
 
 

 $elector = Registro::where('cedula', $idcedula)->first();

$idambito1='1';
$idambito2='2';
$idambito3='3';
$idambito4='4';

 
        if (!$elector) {
            return redirect()->back()->with('error', 'La cédula no existe en los registros.Verifique o registre sus datos.');
        }




$currentYear = date('Y');

    // Verificar si la cédula ya ha votado en el año actual en la tabla elecciones
    $hasVotedInDependencia = Elecciones::whereHas('candidato.cargo.dependencias', function ($query) use ($iddependencia) {
                                            $query->where('id_dependencia', $iddependencia);
                                        })
                                      ->where('id_votante', $elector->id)
                                      ->whereYear('created_at', $currentYear)
                                      ->exists();

    if ($hasVotedInDependencia) {
        return redirect()->back()->with('error', 'La cédula ya ha votado en esta dependencia en el año actual.');
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

   return view('elecciones.datos', compact('elector','elecciones1','elecciones2','elecciones3','elecciones4','iddependencia'));

    }

    public function votacion($idvotante,$iddependencia, $idambito)
    
    {

     $cedula = Registro::where('id', $idvotante)->value('cedula');

  $currentYear = date('Y');

    $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito, $iddependencia, $currentYear) {
        $query->where('id_ambito', $idambito)->with(['candidatos' => function ($query) use ($iddependencia, $idambito, $currentYear) {
            $query->whereHas('cargo', function ($query) use ($iddependencia) {
                $query->where('id_dependencia', $iddependencia);
            })
            ->whereYear('candidatos.created_at', $currentYear)
            ->withCount(['elecciones' => function ($query) use ($idambito) {
                $query->where('id_ambito', $idambito);
            }]);
        }]);
    }])->findOrFail($iddependencia);

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
