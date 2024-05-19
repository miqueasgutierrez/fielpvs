<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dependencia;
use App\Models\dependencia_cargo;

use App\Models\Cargo;

class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependencias = Dependencia::paginate(1000);
         return view('dependencias.index', compact('dependencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('dependencias.crear');
       
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
            'nombre' => 'required|unique:dependencias' 
        ]);

         $dependencia = $request->all();
         
         Dependencia::create($dependencia);
          
           return back()->with('success', 'Registro Realizado Exitosamente.')->with('success', 'Registro Realizado Exitosamente.');
    }


    public function getCargos($dependencia_id)
    {
        // Obtener los cargos asociados a la dependencia
        $cargos = Cargo::whereHas('dependencias', function($query) use ($dependencia_id) {
            $query->where('dependencias.id', $dependencia_id);
        })->get();

        // Retornar los cargos como respuesta JSON
        return response()->json($cargos);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependencia $dependencia)
    {
        return view('dependencias.editar', compact('dependencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependencia $dependencia)
    {
        $request->validate([
            'nombre' => 'required' 
        ]);

         $dep = $request->all();
       

         $dependencia->update($dep);


        return redirect()->route('dependencias.index')->with('success', 'Registro Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependencia $dependencia)
    {
        $dependencia->delete();
        return redirect()->route('dependencias.index');
    }
}
