<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
           $elecciones = DB::select('
            SELECT d.id as iddependencia , d.nombre as dependencia , ad.id as idambito, ad.nombre as ambito , ed.estado as estado FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN dependencia_cargos dc ON d.id =dc.id_dependencia INNER JOIN ambitos_dependencias ad ON dc.id_ambito= ad.id WHERE YEAR(ed.created_at)= YEAR(CURDATE())  ORDER BY d.orden ASC
        ');

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


 public function vista1()
    {
        $user = Auth::user();
        $idcedula = $user->name;
        $elector = Registro::where('cedula', $idcedula)->first();

        $idambito1 = 1; // Ejemplo, puedes ajustar según tus necesidades
        $idambito2 = 2; // Definidos pero no utilizados
        $idambito3 = 3;
        $idambito4 = 4;

           $this->eleccionesnacionales=null;
           $this->eleccionesregionales=null;

        // Llamar a restriccionesnacionales para establecer la variable global
        $this->restriccionesnacionales($idcedula);

         $this->restriccionesregionales($idcedula);

        // Retorna la vista con las variables necesarias
         return view('elecciones.vista1', [
            'elector' => $elector,
            'eleccionesnacionales' => $this->eleccionesnacionales,
            'eleccionesregionales' => $this->eleccionesregionales // Acceder a la propiedad de clase
        ]);
    }

    protected function restriccionesnacionales($idcedula)
    {
        // RESTRICCION AMBITO NACIONAL 1 PRESBITEROS VICEPRESBITEROS ANCIANOS NACIONALES
        

        $restriccionnacional1 = 'SELECT * FROM registros r INNER JOIN registro_dependencia_cargo rdc ON r.id = rdc.registro_id INNER JOIN dependencia_cargos dc ON dc.id = rdc.dependencia_cargos_id INNER JOIN dependencias d ON dc.id_dependencia=d.id INNER JOIN cargos c ON dc.id_cargo = c.id INNER JOIN categoria_ungidos cu ON cu.id_registro = r.id WHERE r.cedula = ? AND (c.nombre = "Presbítero" OR c.nombre = "Vice-presbítero" OR cu.nombre = "ANCIANO NACIONAL" OR cu.nombre = "ANCIANO REGIONAL" OR d.nombre="DIRECTIVA NACIONAL DE LA FIELPVS" )';

        $resultadorestriccionnacional1 = DB::select($restriccionnacional1, [$idcedula]);
 

        if ($resultadorestriccionnacional1) {
            $this->mostrartodaslasdependenciasambitonacional();
        }
    }


    //////////////AMBITO NACIONAL///////////////////////////////////////////////////////////////

    protected function mostrartodaslasdependenciasambitonacional()
    {
        $consulta1 = 'SELECT d.id, d.nombre 
            FROM dependencias d 
            INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia 
            INNER JOIN dependencia_cargos dc ON d.id = dc.id_dependencia 
            INNER JOIN ambitos_dependencias ad ON dc.id_ambito = ad.id 
            WHERE ed.estado = 1 
            AND YEAR(ed.created_at) = YEAR(CURDATE()) 
            AND ad.id = ? 
            ORDER BY d.orden ASC';

        $idambito1 = 1; // Reemplaza con el valor adecuado

        $resultconsulta1 = DB::select($consulta1, [$idambito1]);

        // Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
        $dependencias1 = collect($resultconsulta1)->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->nombre,
            ];
        })->all();

        if ($dependencias1) {
            $this->verificarvotacionesnacionales($dependencias1);
        }
    }

    protected function verificarvotacionesnacionales($dependencias1)
    {
        $user = Auth::user();
        $idcedula = $user->name;
        $elector = Registro::where('cedula', $idcedula)->first();

        $idambito1 = 1; // Reemplaza con el valor adecuado
        $electorId = $elector->id; // ID del elector
        $currentYear = date('Y'); // Año actual



        $consulta2 = 'SELECT d.nombre 
            FROM ambitos_dependencias ad 
            INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
            INNER JOIN dependencias d ON dc.id_dependencia = d.id 
            INNER JOIN candidatos c ON c.id_dependencia_cargos = dc.id 
            INNER JOIN elecciones e ON e.id_candidato = c.id 
            WHERE ad.id = ? 
            AND e.id_votante = ? 
            AND YEAR(e.created_at) = ?';

        $resultconsulta2 = DB::select($consulta2, [$idambito1, $electorId, $currentYear]);

        // Extraer los valores 'nombre' del resultado de la segunda consulta
        $dependencias2 = array_map(function ($item) {
            return $item->nombre;
        }, $resultconsulta2);

        // Encontrar la diferencia entre los nombres de dependencias
        $dependencias1Nombres = array_column($dependencias1, 'nombre', 'id');
        $elecciones1 = array_diff($dependencias1Nombres, $dependencias2);

        $dependenciasConIdNombre = [];
        foreach ($elecciones1 as $id => $nombre) {
            $dependenciasConIdNombre[] = [
                'id' => $id,
                'nombre' => $nombre,
            ];
        }

        // Asignar el resultado a la variable global (si es necesario)
        $this->eleccionesnacionales = $dependenciasConIdNombre;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////AMBITO REGIONAL///////////////////////////////////////////////////////////////

    protected function restriccionesregionales($idcedula)
    {
        // RESTRICCION AMBITO NACIONAL 1 PRESBITEROS VICEPRESBITEROS ANCIANOS NACIONALES
        $restriccionregional1 = 'SELECT * FROM registros r INNER JOIN registro_dependencia_cargo rdc ON r.id = rdc.registro_id INNER JOIN dependencia_cargos dc ON dc.id = rdc.dependencia_cargos_id INNER JOIN dependencias d ON dc.id_dependencia=d.id INNER JOIN cargos c ON dc.id_cargo = c.id INNER JOIN categoria_ungidos cu ON cu.id_registro = r.id WHERE r.cedula = ? AND (c.nombre = "Presbítero" OR c.nombre = "Vice-presbítero" OR cu.nombre = "ANCIANO NACIONAL" OR cu.nombre = "ANCIANO REGIONAL" OR d.nombre="DIRECTIVA NACIONAL DE LA FIELPVS" )';

        $resultadorestriccionregional1 = DB::select($restriccionregional1, [$idcedula]);
 

        if ($resultadorestriccionregional1) {
            $this->mostrartodaslasdependenciasambitoregional();
        }
    }


    protected function mostrartodaslasdependenciasambitoregional()
    {
        $consulta1 = 'SELECT d.id, d.nombre 
            FROM dependencias d 
            INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia 
            INNER JOIN dependencia_cargos dc ON d.id = dc.id_dependencia 
            INNER JOIN ambitos_dependencias ad ON dc.id_ambito = ad.id 
            WHERE ed.estado = 1 
            AND YEAR(ed.created_at) = YEAR(CURDATE()) 
            AND ad.id = ? 
            ORDER BY d.orden ASC';

        $idambito2 = 2; // Reemplaza con el valor adecuado

        $resultconsulta1 = DB::select($consulta1, [$idambito2]);

        // Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
        $dependencias1 = collect($resultconsulta1)->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->nombre,
            ];
        })->all();

        if ($dependencias1) {
            $this->verificarvotacionesregionales($dependencias1);
        }
    }

    protected function verificarvotacionesregionales($dependencias1)
    {
        $user = Auth::user();
        $idcedula = $user->name;
        $elector = Registro::where('cedula', $idcedula)->first();

        $idambito2 =2 ; // Reemplaza con el valor adecuado-
        $electorId = $elector->id; // ID del elector
        $currentYear = date('Y'); // Año actual

        $consulta2 = 'SELECT d.nombre 
            FROM ambitos_dependencias ad 
            INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
            INNER JOIN dependencias d ON dc.id_dependencia = d.id 
            INNER JOIN candidatos c ON c.id_dependencia_cargos = dc.id 
            INNER JOIN elecciones e ON e.id_candidato = c.id 
            WHERE ad.id = ? 
            AND e.id_votante = ? 
            AND YEAR(e.created_at) = ?';

        $resultconsulta2 = DB::select($consulta2, [$idambito2, $electorId, $currentYear]);

        // Extraer los valores 'nombre' del resultado de la segunda consulta
        $dependencias2 = array_map(function ($item) {
            return $item->nombre;
        }, $resultconsulta2);

        // Encontrar la diferencia entre los nombres de dependencias
        $dependencias1Nombres = array_column($dependencias1, 'nombre', 'id');
        $elecciones1 = array_diff($dependencias1Nombres, $dependencias2);

        $dependenciasConIdNombre = [];
        foreach ($elecciones1 as $id => $nombre) {
            $dependenciasConIdNombre[] = [
                'id' => $id,
                'nombre' => $nombre,
            ];
        }

        // Asignar el resultado a la variable global (si es necesario)
        $this->eleccionesregionales = $dependenciasConIdNombre;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////


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
