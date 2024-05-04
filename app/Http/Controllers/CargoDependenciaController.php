<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\dependencia_cargo;

use App\Models\Dependencia;

use App\Models\Cargo;

class CargoDependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
          
           $cargosdependencias = dependencia_cargo::with('dependencia', 'cargo')->paginate(1000);
         return view('cargosdependencias.index', compact('cargosdependencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $dependencias = Dependencia::paginate(1000);
           $cargos = Cargo::paginate(1000);
        return view('cargosdependencias.crear', compact('dependencias'),compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $request->validate([
            'id_dependencia' => 'required','id_cargo' => 'required' 
        ]);

         $dependenciacargo = $request->all();
         
         dependencia_cargo::create($dependenciacargo);
          
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
    public function edit(dependencia_cargo $cargodependencia)
    {
     return view('cargosdependencias.editar', compact('cargodependencia'));
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
 public function destroy($idDependencia,$idCargo )
    {
        // Buscar y eliminar la relación
       dependencia_cargo::where('id_dependencia', $idDependencia)
                     ->where('id_cargo', $idCargo)
                     ->delete();

        // Opcional: agregar lógica adicional después de eliminar la relación

        // Retornar una respuesta
         return redirect()->route('cargosdependencias.index')->with('success', 'Registro Eliminado.');
    }



}
