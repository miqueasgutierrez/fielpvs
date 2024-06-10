<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Zona;

use App\Models\Circuito;

use App\Models\Iglesia;


class IglesiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $iglesias = Iglesia::with(['zona','circuito'])->get();

    return view('iglesias.index', compact('iglesias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $circuitos = Circuito::all();
        return view('iglesias.crear', compact('circuitos'));
    }


    public function storeMultiple(Request $request)
   

    {
  
  try {
            $request->validate([
                'iglesias.*.nombre' => 'required|string|max:255',
                // No se necesita validación para zona_id si solo hay una zona
            ]);

            $zona_id = $request->input('zona_id');

            $iglesiasData = $request->input('iglesias');

            foreach ($iglesiasData as $iglesiaData) {
                Iglesia::create([
                    'nombre' => $iglesiaData['nombre'],
                    'zona_id' => $zona_id,
                ]);
            }

            return redirect()->back()->with('success', 'Iglesias creadas exitosamente.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al crear las iglesias: ' . $e->getMessage());
        }
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


     public function getZonas($circuitoId)    
    {

        $zonas = Zona::where('circuito_id', $circuitoId)->pluck('nombre', 'id');
        return response()->json($zonas);

    }

}
