<?php

namespace App\Http\Controllers;

use App\Models\Registro;

use Illuminate\Http\Request;

use App\Models\dependencia_cargo;

use App\Models\Dependencia;

use App\Models\Cargo;


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

        $dependencias = Dependencia::with('cargos')->get();
   

         /*$dependencias = Dependencia::paginate(1000);
           $cargos = Cargo::paginate(1000); **/
           
        return view('registros.crear', compact('dependencias'));
       
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
            'cedula' => 'required|unique:registros' ,'nombres' => 'required', 'apellidos' => 'required', 'imagen' => 'image|mimes:jpeg,png,svg|max:1024','fecha_nacimiento' => 'required','telefono' => 'required','edad' => 'required','genero' => 'required','profesion' => 'required','cargo' => 'required','ministerio' => 'required','dependencia' => 'required','iglesia' => 'required','pastor' => 'required','circuito' => 'required','zona' => 'required','direccion' => 'required','estado_civil' => 'required','ministro_ordenado' => 'required','fecha_uncion' => 'nullable'
        ]);

         $registro = $request->all();

         if($imagen = $request->file('imagen')) {
             $rutaGuardarImg = 'imagen/';
             $imagenRegistro = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
             $imagen->move($rutaGuardarImg, $imagenRegistro);
             $registro['imagen'] = "$imagenRegistro";             
         }
         
         Registro::create($registro);
          
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
      return view('registros.show', compact('registro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
           return view('registros.editar', compact('registro'));
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
             'cedula' => 'required' ,'nombres' => 'required', 'apellidos' => 'required','fecha_nacimiento' => 'required',  'telefono' => 'required','edad' => 'required','profesion' => 'required','iglesia' => 'required','pastor' => 'required','cargo' => 'required','ministerio' => 'nullable','dependencia' => 'required','circuito' => 'required','zona' => 'required','direccion' => 'required','estado_civil' => 'required','ministro_ordenado' => 'required','fecha_uncion' => 'nullable'
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



    

}
