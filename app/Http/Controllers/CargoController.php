<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cargo;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cargos = Cargo::paginate(1000);
         return view('cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('cargos.crear');
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
            'nombre' => 'required|unique:cargos' 
        ]);

         $cargos = $request->all();
         
         Cargo::create($cargos);
          
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
    public function edit(Cargo $cargo)
    {
      
       return view('cargos.editar', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo)
    {
        $request->validate([
            'nombre' => 'required' 
        ]);

         $carg = $request->all();
       

         $cargo->update($carg);


        return redirect()->route('cargos.index')->with('success', 'Registro Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
       $cargo->delete();
        return redirect()->route('cargos.index');

    }
}
