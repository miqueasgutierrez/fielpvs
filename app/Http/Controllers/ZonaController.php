<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Zona;

use App\Models\Circuito;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $zonas = Zona::with('circuito')->get();
        return view('zonas.index', compact('zonas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $circuitos = Circuito::all();
          return view('zonas.crear', compact('circuitos'));
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
            'nombre' => 'required|unique:zonas' 
        ]);

         $circuito = $request->all();
         
        Zona::create($zona);
          
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
    public function destroy(Zona $zona)
    {
         $zona->delete();
        return redirect()->route('zonas.index');
    }


     public function storeMultiple(Request $request)
    {
        $validatedData = $request->validate([
            'nombre.*' => 'required|string|max:255',
            'circuito_id' => 'required|exists:circuitos,id'
        ]);

        $circuitoId = $request->circuito_id;

        foreach ($request->nombre as $nombre) {
            Zona::create([
                'nombre' => $nombre,
                'circuito_id' => $circuitoId
            ]);
        }

        return redirect()->route('zonas.index')->with('success', 'Zonas creadas exitosamente');
    }



    public function getZonas($circuitoId)
    {


        $zonas = Zona::where('circuito_id', $circuitoId)->pluck('nombre', 'id');
        return response()->json($zonas);
    }

}
