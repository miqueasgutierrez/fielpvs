<?php

namespace App\Http\Controllers;

use App\Models\Registro;

use Illuminate\Http\Request;

use App\Models\dependencia_cargo;

use App\Models\Dependencia;

use App\Models\Cargo;

use App\Models\CargoActual;

use App\Models\RegistroDependenciaCargo;

use App\Models\ministerio;

use App\Models\Categoria_ungidos;

use App\Models\Circuito;

use App\Models\Iglesia;

use App\Models\RegistroIglesia;

use App\Models\Ambitodependencias;



class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
         


        $registros = Registro::paginate(1000);
         return view('registros.index', compact('registros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {


 $circuitos = Circuito::all();

 $dependencias = Dependencia::orderBy('orden', 'asc')->get();

       $cargosDependencias = dependencia_cargo::with(['cargo', 'dependencia','ambito'])

        ->join('dependencias', 'dependencia_cargos.id_dependencia', '=', 'dependencias.id')
            ->orderBy('dependencias.nombre')
            ->select('dependencia_cargos.*') 
            ->get();
           
        return view('registros.crear', compact('cargosDependencias','dependencias','circuitos'));
       
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
            'cedula' => 'required|unique:registros' ,'nombres' => 'required', 'apellidos' => 'required', 'imagen' => 'image|mimes:jpeg,png,svg|max:1024','fecha_nacimiento' => 'required','telefono' => 'required','edad' => 'required','genero' => 'required','profesion' => 'required','pastor' => 'required','direccion' => 'required','estado_civil' => 'required','fecha_uncion' => 'nullable','ministro_ungido' => 'required'
        ]);



         $registro = $request->all();

         if($imagen = $request->file('imagen')) {
             $rutaGuardarImg = 'imagen/';
             $imagenRegistro = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
             $imagen->move($rutaGuardarImg, $imagenRegistro);
             $registro['imagen'] = "$imagenRegistro";             
         }
        
         $nuevoRegistro = Registro::create($registro);
         

         if ($request->has('cargo_dependencia')) {
        foreach ($request->cargo_dependencia as $cargoDependenciaId) {

            RegistroDependenciaCargo::create([
                'registro_id' => $nuevoRegistro->id,
                'dependencia_cargos_id' => $cargoDependenciaId,
            ]);
        }
    }



     if ($request->has('ministerio')) {
        foreach ($request->ministerio as $ministerionombre) {

            ministerio::create([
                'id_registro' => $nuevoRegistro->id,
                'nombre' => $ministerionombre,
            ]);
        }
    }


     if ($request->has('iglesia')) {

             RegistroIglesia ::create([
                'id_registro' => $nuevoRegistro->id,
                 'id_iglesia' => $request->input('iglesia'),
            ]);
      
    }



     if ($request->has('categoria_ungidos') && $request->input('categoria_ungidos') !== null) {
    Categoria_ungidos::create([
        'id_registro' => $nuevoRegistro->id,
        'nombre' => $request->input('categoria_ungidos'),
    ]);
}


    
           return back()->with('success', 'Registro Realizado Exitosamente.')->with('success', 'Registro Realizado Exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)

    {



       $ministerios = $registro->ministerios;

       
          $registroDependenciaCargos = $registro->registroDependenciaCargos()->with(['dependenciaCargo.cargo', 'dependenciaCargo.dependencia'])->get();


           $categoriaungido = $registro->categoriaungido->first() ?? null;

  $registroIglesia = $registro->registroIglesias->first();

if ($registroIglesia) {

   $iglesia= $registro->registroIglesias->first()->iglesia ?? null;

    if ($iglesia) {
         $zona= $registro->registroIglesias->first()->iglesia->first()->zona ?? null;
        if ($zona) {
           $circuito= $registro->registroIglesias->first()->iglesia->first()->zona->first()->circuito ?? null;
        } else {
            $circuito = null;
        }
    } else {
        $zona = null;
        $circuito = null;
    }
} else {
    $iglesia = null;
    $zona = null;
    $circuito = null;
}

   

      return view('registros.show', compact('registro','ministerios','registroDependenciaCargos','iglesia','zona','circuito','categoriaungido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {


      $circuitos = Circuito::all();

      $ministerios = $registro->ministerios; // Asumiendo que tienes una relación 

  $categoriaungido = $registro->categoriaungido->first() ?? null;

  $registroIglesia = $registro->registroIglesias->first();

if ($registroIglesia) {

   $iglesia= $registro->registroIglesias->first()->iglesia ?? null;

    if ($iglesia) {
         $zona= $registro->registroIglesias->first()->iglesia->first()->zona ?? null;
        if ($zona) {
           $circuito= $registro->registroIglesias->first()->iglesia->first()->zona->first()->circuito ?? null;
        } else {
            $circuito = null;
        }
    } else {
        $zona = null;
        $circuito = null;
    }
} else {
    $iglesia = null;
    $zona = null;
    $circuito = null;
}


      $selectedMinisterios = $ministerios->pluck('nombre')->toArray();

     $registroDependenciaCargos = $registro->registroDependenciaCargos;

    // Cargar las relaciones necesarias
    $registroDependenciaCargos->load('dependenciaCargo.cargo', 'dependenciaCargo.dependencia');

   $cargosDependencias = dependencia_cargo::with(['cargo', 'dependencia'])

        ->join('dependencias', 'dependencia_cargos.id_dependencia', '=', 'dependencias.id')
            ->orderBy('dependencias.nombre')
            ->select('dependencia_cargos.*') 
            ->get();

             $dependencias = Dependencia::paginate(1000);

    return view('registros.editar', compact('registro', 'selectedMinisterios','cargosDependencias','registroDependenciaCargos','dependencias','iglesia','circuitos','zona','circuito','categoriaungido'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Registro $registro)

    {

         $request->validate([
        'cedula' => 'required|unique:registros,cedula,' . $registro->id,
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'imagen' => 'nullable|image|mimes:jpeg,png,svg|max:1024',
        'fecha_nacimiento' => 'required|date',
        'telefono' => 'required|string|max:255',
        'edad' => 'required|integer|min:0',
        'genero' => 'required|string|in:masculino,femenino',
        'profesion' => 'required|string|max:255',
        'pastor' => 'required|string|max:255',
        'direccion' => 'required|string|max:255',
        'estado_civil' => 'required|string|in:soltero,casado',
        'fecha_uncion' => 'nullable',
        'ministro_ungido' => 'required'
    ]);


         $reg = $request->all();
         if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'imagen/';
            $imagenRegistro = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenRegistro);
            $reg['imagen'] = "$imagenRegistro";
         }else{
            unset($reg['imagen']);
         }
         $registro->update($reg);

    RegistroDependenciaCargo::where('registro_id', $registro->id)->delete();
    
    ministerio::where('id_registro', $registro->id)->delete();
     
     RegistroIglesia::where('id_registro', $registro->id)->delete();

      Categoria_ungidos::where('id_registro', $registro->id)->delete();


         if ($request->has('cargo_dependencia')) {
    foreach ($request->cargo_dependencia as $cargoDependenciaId) {
        // Buscar o crear el registro y actualizarlo
        RegistroDependenciaCargo::updateOrCreate(
            [
                'registro_id' => $registro->id,
                'dependencia_cargos_id' => $cargoDependenciaId
            ]
        );
    }
}

if ($request->has('ministerio')) {
    foreach ($request->ministerio as $ministerionombre) {
        // Buscar o crear el registro y actualizarlo
        ministerio::updateOrCreate(
            [
                'id_registro' => $registro->id,
                'nombre' => $ministerionombre
            ]
        );
    }
}



 if ($request->has('iglesia')) {
    RegistroIglesia::updateOrCreate(
        [
            'id_registro' => $registro->id,
            'id_iglesia' => $request->input('iglesia'),
            // Aquí puedes agregar otros campos que deseas actualizar/crear
         ]
    );
}


if ($request->has('categoria_ungidos') && $request->input('categoria_ungidos') !== null) {
    Categoria_ungidos::create([
        'id_registro' => $registro->id,
        'nombre' => $request->input('categoria_ungidos'),
    ]);
}


        return redirect()->route('registros.index')->with('success', 'Registro Actualizado Exitosamente.');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
      $registro->delete();
        return redirect()->route('registros.index');
    }




public function getIglesias($zonaId)
    {
        $iglesias = Iglesia::where('zona_id', $zonaId)->pluck('nombre', 'id');
        return response()->json($iglesias);
    }


    

}
