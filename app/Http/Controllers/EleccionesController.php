<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;

use App\Models\Registro;

use App\Models\dependencia_cargo;
use App\Models\Ambitodependencias;
use App\Models\Elecciones;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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



 
        if (!$elector) {
            return redirect()->back()->with('error', 'La cédula no existe en los registros.Verifique o registre sus datos.');
        }



$idambito1='1';
$idambito2='2';
$idambito3='3';
$idambito4='4';

$currentYear = date('Y');

// Consultar si el votante ya ha realizado el voto en esa dependencia.

$existente = 'SELECT * FROM registros r INNER JOIN elecciones e ON r.id=e.id_votante INNER JOIN candidatos c ON e.id_candidato=c.id INNER JOIN dependencia_cargos dc ON c.id_dependencia_cargos=dc.id INNER JOIN dependencias d ON dc.id_dependencia=d.id WHERE r.id=? AND d.id= ? AND YEAR(e.created_at) = ? ';

$result = DB::select($existente, [$elector->id,$iddependencia,$currentYear]);


    if ($result) {
        return redirect()->back()->with('error', 'La cédula ya ha votado en esta dependencia en el año actual.');
    }

$consulta1 = 'SELECT d.id, d.nombre 
              FROM ambitos_dependencias ad 
              INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
              INNER JOIN dependencias d ON dc.id_dependencia = d.id 
              WHERE ad.id = ?';

$idambito1 = 1; // Reemplaza con el valor adecuado para $idambito1

$resultconsulta1 = DB::select($consulta1, [$idambito1]);

// Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
$dependencias1 = collect($resultconsulta1)->map(function ($item) {
    return [
        'id' => $item->id,
        'nombre' => $item->nombre,
    ];
})->all();

// Segunda consulta
$consulta2 = 'SELECT d.nombre 
              FROM ambitos_dependencias ad 
              INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
              INNER JOIN dependencias d ON dc.id_dependencia = d.id 
              INNER JOIN candidatos c ON c.id_dependencia_cargos = dc.id 
              INNER JOIN elecciones e ON e.id_candidato = c.id 
              WHERE ad.id = ? 
                AND e.id_votante = ? 
                AND YEAR(e.created_at) = ?';

$electorId = $elector->id; // Reemplaza con el id correcto del elector
$currentYear = date('Y'); // Obtener el año actual o asignarlo según sea necesario

$resultconsulta2 = DB::select($consulta2, [$idambito1, $electorId, $currentYear]);

// Extraer los valores 'nombre' del resultado de la segunda consulta
$dependencias2 = array_map(function($item) {
    return $item->nombre;
}, $resultconsulta2);

// Encontrar la diferencia entre los nombres de dependencias
$elecciones1 = array_diff(array_column($dependencias1, 'nombre','id'), $dependencias2);



$dependenciasConIdNombre = [];

foreach ($elecciones1 as $id => $nombre) {
    $dependenciasConIdNombre[] = [
        'id' => $id,
        'nombre' => $nombre,
    ];
}

// Mostrar el resultado


$eleccionesnacionales=$dependenciasConIdNombre;





   return view('elecciones.datos', compact('elector','eleccionesnacionales','iddependencia'));

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
$iddependencia = $request->input('iddependencia');

$idcedula = $request->input('cedula');
 
  $elector = Registro::where('cedula', $idcedula)->first();

$idambito1='1';
$idambito2='2';
$idambito3='3';
$idambito4='4';

$currentYear = date('Y');

// Consultar si el votante ya ha realizado el voto en esa dependencia.


$consulta1 = 'SELECT d.id, d.nombre 
              FROM ambitos_dependencias ad 
              INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
              INNER JOIN dependencias d ON dc.id_dependencia = d.id 
              WHERE ad.id = ?';

$idambito1 = 1; // Reemplaza con el valor adecuado para $idambito1

$resultconsulta1 = DB::select($consulta1, [$idambito1]);

// Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
$dependencias1 = collect($resultconsulta1)->map(function ($item) {
    return [
        'id' => $item->id,
        'nombre' => $item->nombre,
    ];
})->all();

// Segunda consulta
$consulta2 = 'SELECT d.nombre 
              FROM ambitos_dependencias ad 
              INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
              INNER JOIN dependencias d ON dc.id_dependencia = d.id 
              INNER JOIN candidatos c ON c.id_dependencia_cargos = dc.id 
              INNER JOIN elecciones e ON e.id_candidato = c.id 
              WHERE ad.id = ? 
                AND e.id_votante = ? 
                AND YEAR(e.created_at) = ?';

$electorId = $elector->id; // Reemplaza con el id correcto del elector
$currentYear = date('Y'); // Obtener el año actual o asignarlo según sea necesario

$resultconsulta2 = DB::select($consulta2, [$idambito1, $electorId, $currentYear]);

// Extraer los valores 'nombre' del resultado de la segunda consulta
$dependencias2 = array_map(function($item) {
    return $item->nombre;
}, $resultconsulta2);

// Encontrar la diferencia entre los nombres de dependencias
$elecciones1 = array_diff(array_column($dependencias1, 'nombre','id'), $dependencias2);



$dependenciasConIdNombre = [];

foreach ($elecciones1 as $id => $nombre) {
    $dependenciasConIdNombre[] = [
        'id' => $id,
        'nombre' => $nombre,
    ];
}

// Mostrar el resultado


$eleccionesnacionales=$dependenciasConIdNombre;


return view('elecciones.datos', compact('elector', 'eleccionesnacionales','iddependencia'))
    ->with('success', 'Votacion Exitosa.');

  
    }

     public function opciones($iddependencia, $idambito)
    {



      return view('elecciones.opciones', compact('iddependencia','idambito'));

    }

public function vistaresultados(Request $request)
    {

 $iddependencia = $request->input('iddependencia');
 $idambito = $request->input('idambito');

 $nombredependencia=Dependencia::where('id', $iddependencia)->value('nombre');
 $nombreambito=Ambitodependencias::where('id', $idambito)->value('nombre');


$currentYear = date('Y'); // Año actual

$sql = "
   SELECT 
    d.id, 
    c.id AS idcargo, 
    r.nombres,r.apellidos, r.cedula as cedula, r.imagen as imagen ,
    c.nombre AS nombrecargo, 
    COUNT(e.id) AS candidatos_count,
    CASE WHEN COUNT(e.id) > 0 THEN 'Con Votos' ELSE 'Sin Votos' END AS estado_votos
FROM 
    dependencias d
INNER JOIN 
    dependencia_cargos dc ON d.id = dc.id_dependencia
INNER JOIN 
    cargos c ON c.id = dc.id_cargo
INNER JOIN 
    candidatos ca ON dc.id = ca.id_dependencia_cargos
INNER JOIN 
    ambitos_dependencias ad ON ad.id = dc.id_ambito
INNER JOIN 
    registros r ON r.id = ca.id_candidato
LEFT JOIN 
    elecciones e ON e.id_candidato = ca.id AND YEAR(e.created_at) =?
WHERE 
    d.id = ?
    AND ad.id = ? 
GROUP BY 
    d.id, 
    c.id, 
    r.nombres, 
     r.apellidos, 
      r.cedula,
      r.imagen,
    c.nombre
LIMIT 0, 25;
";

$dependencia = DB::select($sql, [$currentYear, $iddependencia, $idambito]);


     return view('elecciones.vistaresultados', compact('dependencia','idambito','nombredependencia','nombreambito'));

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
