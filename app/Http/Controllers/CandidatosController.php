<?php

namespace App\Http\Controllers;


use App\Models\dependencia_cargo;
use App\Models\Dependencia;
use App\Models\Registro;
use App\Models\Candidatos;
use App\Models\EstadoDependencia;

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
        

        $validatedData = $request->validate([
            'idcandidato' => 'required',
            'id_cargo' => 'required'
        ]);

        $idcargo = $request->id_cargo;

        $idambito= dependencia_cargo::where('id', $idcargo)->first();



        foreach ($request->idcandidato as $idcandidato) {
            Candidatos::create([
                'id_candidato' => $idcandidato,
                'id_dependencia_cargos' => $idcargo
            ]);
        }


$id_dependencia=$request->input('id_dependencia');
   $currentYear = date('Y');

    $existingRecord = EstadoDependencia::where('id_dependencia', $id_dependencia)
    ->whereYear('created_at', $currentYear)
    ->where('id_ambito', $idambito->id_ambito)
    ->first();


if ($existingRecord) {


     return back()->with('success', 'Registro Realizado Exitosamente.')->with('success', 'Registro Realizado Exitosamente.');

          
        }
        


           $estadoDependencia = new EstadoDependencia([
            'id_dependencia' => $request->input('id_dependencia'),
           'estado' => 1, 
           'id_ambito' => $idambito->id_ambito  
        ]);

        // Guardar la instancia en la base de datos
        $estadoDependencia->save();




         return back()->with('success', 'Registro Realizado Exitosamente.')->with('success', 'Registro Realizado Exitosamente.');
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


}
