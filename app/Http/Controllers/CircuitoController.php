<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Circuito;

class CircuitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $circuitos = Circuito::paginate(1000);
         return view('circuitos.index', compact('circuitos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('circuitos.crear');
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
            'nombre' => 'required|unique:circuitos' 
        ]);

         $circuito = $request->all();
         
         Circuito::create($circuito);
          
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
    public function edit(Circuito $circuito)
    {
        
      
       return view('circuitos.editar', compact('circuito'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Circuito $circuito)
    {
          $request->validate([
            'nombre' => 'required' 
        ]);

         $ct = $request->all();
       

         $circuito->update($ct);


        return redirect()->route('circuitos.index')->with('success', 'Registro Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Circuito $circuito)
    {
         $circuito->delete();
        return redirect()->route('circuitos.index');
    }



    
}
