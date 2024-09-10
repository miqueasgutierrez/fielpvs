<?php

namespace App\Http\Controllers;


use App\Models\dependencia_cargo;
use App\Models\Dependencia;
use App\Models\Registro;
use App\Models\Candidatos;
use App\Models\EstadoDependencia;
use Illuminate\Support\Facades\DB;
use App\Models\Ambitodependencias;

use Illuminate\Http\Request;

use Carbon\Carbon;

class CandidatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $currentYear = Carbon::now()->year;

          $candidatos = Candidatos::with(['registro', 'dependenciaCargo'])
                            ->whereYear('created_at', $currentYear)
                            ->get();

                        

    return view('candidatos.index', compact('candidatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $dependencias = Dependencia::orderBy('orden', 'asc')->get();

                 $ambitosdependencias =Ambitodependencias::paginate(1000);

         $registros = Registro::paginate(1000);

        return view('candidatos.crear', compact('dependencias','registros','ambitosdependencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        
        $validatedData = $request->validate([
            'idcandidato' => 'required',
            'id_cargo' => 'required'
        ]);

        

        $idcargo = $request->id_cargo;
        $idambito= dependencia_cargo::where('id', $idcargo)->first();


$idDependenciaCargos = $request->id_cargo;


        foreach ($request->idcandidato as $index => $idcandidato) {
    Candidatos::create([
        'id_candidato' => $idcandidato,
        'id_dependencia_cargos' => $idDependenciaCargos[$index] ?? null // Asigna el valor del array de cargos
    ]);
}


$id_dependencia=$request->input('iddependencia');
   $currentYear = date('Y');

    $existingRecord = EstadoDependencia::where('id_dependencia', $id_dependencia)
    ->whereYear('created_at', $currentYear)
    ->where('id_ambito', $idambito->id_ambito)
    ->first();


if ($existingRecord) {


      $currentYear = Carbon::now()->year;

          $candidatos = Candidatos::with(['registro', 'dependenciaCargo'])
                            ->whereYear('created_at', $currentYear)
                            ->get();

                        

    return view('candidatos.index', compact('candidatos'));
          
        }
        


           $estadoDependencia = new EstadoDependencia([
            'id_dependencia' => $request->input('id_dependencia'),
           'estado' => 1, 
           'id_ambito' => $idambito->id_ambito  
        ]);

        // Guardar la instancia en la base de datos
        $estadoDependencia->save();
 
 $currentYear = Carbon::now()->year;

          $candidatos = Candidatos::with(['registro', 'dependenciaCargo'])
                            ->whereYear('created_at', $currentYear)
                            ->get();

                        

    return view('candidatos.index', compact('candidatos'));



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
    public function destroy(Candidatos $candidato)
    {
         $candidato->delete();
        return redirect()->route('candidatos.index');
    }


    public function getCargos($dependeciaId)    
    {

$cargos = dependencia_cargo::where('id_dependencia', $dependeciaId)
            ->with(['cargo', 'ambito'])
        ->get()
        ->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre_completo' => $item->cargo->nombre . '-' . $item->ambito->nombre ,
            ];
        })
        ->pluck('nombre_completo', 'id');
        
        return response()->json($cargos);

    }


     public function agregarcandidatos(Request $request)    
    {
 
  $registros = Registro::paginate(5000);

  $iddependencia = $request->input('id_dependencia');
  $idambito = $request->input('idambito');

  $sqldependencia = "
    SELECT id, nombre, descripcion_local, descripcion_regional FROM dependencias WHERE id=? 
";

  $nombredependencia = DB::selectOne($sqldependencia, [$iddependencia]);




   $consulta1 = 'SELECT dc.id as iddependenciacargo,dc.id, c.nombre FROM ambitos_dependencias ad INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito INNER JOIN dependencias d ON dc.id_dependencia = d.id INNER JOIN cargos c ON c.id = dc.id_cargo WHERE d.id=? AND ad.id=? ORDER BY c.orden ASC ';

    $cargos= DB::select($consulta1, [$iddependencia, $idambito]);



    switch ($idambito) {
        case 1:
            $nombredepartamento = $nombredependencia->nombre;
            break;

        case 2:
            $nombredepartamento = $nombredependencia->descripcion_regional;
            break;

        case 3:
            $nombredepartamento = $nombredependencia->nombre;
            break;

        case 4:
            $nombredepartamento = $nombredependencia->descripcion_local;
            break;

        default:
            $nombredepartamento = 'No applicable ámbito';
            break;
    }

    return view('candidatos.cargarcandidatos', compact('nombredependencia','nombredepartamento', 'cargos','registros','idambito'));

    }

}
