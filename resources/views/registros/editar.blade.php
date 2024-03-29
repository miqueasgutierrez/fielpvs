@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
   <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Registros') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
           
            <form action="{{ route('registros.update',$registro->id) }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
               <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Cedula:</label>
                            <input type="number" required class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="cedula" name="cedula" placeholder="Ingrese su Cedula" value="{{ $registro->cedula }}" required>
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Nombres:</label>
                            <input type="text" required class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="nombres" name="nombres" minlength="5" placeholder="ej. Pedro, Juan" value="{{ $registro->nombres }}">
                        </div>
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Apellidos:</label>
                            <input type="text" required class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="apellidos" name="apellidos" placeholder="ej. Armada" value="{{ $registro->apellidos }}"   required>
                        </div>
                    </div>

                    <!-- Para ver la imagen seleccionada, de lo contrario no se -->
                    <div class="flex justify-center">
                        <img id="imagenSeleccionada" class="w-32 h-32 rounded-full mx-auto" src="/fielpvs/public/imagen/{{$registro->imagen}}" alt="Imagen de perfil">
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen de Perfil</label>
                        <div class='flex items-center justify-center w-full'>
                            <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                       <div class='flex flex-col items-center justify-center pt-7'>
                       <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                       <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
                       </div>
                    <input name="imagen" id="imagen" type='file' class="hidden" />
                    </label>
                        </div>
                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Fecha de Nacimiento:</label>
                              <input type="date" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $registro->fecha_nacimiento}}">
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Telefono:</label>
                            <input type="number" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="telefono" name="telefono" placeholder="Numero Celular" value="{{ $registro->telefono}}" required >

                        </div>
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Edad:</label>
                            <input type="number" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="edad" id="edad" placeholder="Indique su Edad"  value="{{ $registro->edad}}" required>
                        </div>
                    </div>




                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Genero:</label>
                            <div class="flex items-center space-x-4">
                                <input type="radio" id="genero_masculino" name="genero" value="masculino" class="form-radio" {{ $registro->genero === 'masculino' ? 'checked' : '' }} >
                                <label for="genero_masculino">Masculino</label>

                                <input type="radio" id="genero_femenino" name="genero" value="femenino" class="form-radio" {{ $registro->genero === 'femenino' ? 'checked' : '' }}>
                                <label for="genero_femenino">Femenino</label>

                            </div>
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">PROFESION U OFICIO:</label>
                            <input type="profesion" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="profesion" name="profesion" placeholder="ej. Ingeniero, Trabajador de hogas" value="{{ $registro->profesion}}" required>
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">CARGO ACTUAL:</label>
                            <input type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="cargo" placeholder="ej. Presidente, Vocal, Pastor" value="{{ $registro->cargo}}" required>
                        </div>
                    </div>



                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">MINISTERIO:</label>
                            <select type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="ministerio">
            <option value="">SELECCIONA UNA OPCIÓN</option>
            <option value="PASTOR" {{ $registro->ministerio === 'PASTOR' ? 'selected' : '' }}>PASTOR</option>
            <option value="EVANGELISTA" {{ $registro->ministerio === 'EVANGELISTA' ? 'selected' : '' }}>EVANGELISTA</option>
            <option value="PROFETA" {{ $registro->ministerio === 'PROFETA' ? 'selected' : '' }}>PROFETA</option>
            <option value="MAESTRO" {{ $registro->ministerio === 'MAESTRO' ? 'selected' : '' }}>MAESTRO</option>
            <option value="N/A" {{ $registro->ministerio === 'NINGUNO' ? 'selected' : '' }}>NINGUNO</option>
        </select>
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">DEPENDENCIA:</label>
                            <select type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="dependencia">
       <option value="">SELECCIONES UNA OPCION</option>
         <option value="ANCIANO NACIONAL" {{ $registro->dependencia === 'ANCIANO NACIONAL' ? 'selected' : '' }} >ANCIANO NACIONAL</option>
       <option value="ANCIANO REGIONAL" {{ $registro->dependencia === 'ANCIANO REGIONAL' ? 'selected' : '' }} >ANCIANO NACIONAL</option>
       <option value="PRESBITERIO NACIONAL"{{ $registro->dependencia === 'PRESBITERIO NACIONAL' ? 'selected' : '' }}>PRESBITERIO NACIONAL</option>
       <option value="PRESBITERIO REGIONAL"{{ $registro->dependencia === ' PRESBITERIO REGIONAL ' ? 'selected' : '' }}>PRESBITERIO REGIONAL</option>
       <option value="DAMAS NACIONAL"{{ $registro->dependencia === 'DAMAS NACIONAL' ? 'selected' : '' }}>DAMAS NACIONAL</option>
       <option value="DAMAS REGIONAL"{{ $registro->dependencia === 'DAMAS REGIONAL' ? 'selected' : '' }}>DAMAS REGIONAL</option>
       <option value="DAMAS ZONAL"{{ $registro->dependencia === 'DAMAS ZONAL' ? 'selected' : '' }}>DAMAS ZONAL</option>
       <option value="DAMAS LOCAL"{{ $registro->dependencia === 'DAMAS LOCAL' ? 'selected' : '' }}>DAMAS LOCAL</option>
       <option value="JÓVENES NACIONAL"{{ $registro->dependencia === 'JÓVENES NACIONAL' ? 'selected' : '' }}>JÓVENES NACIONAL</option>
       <option value="JÓVENES REGIONAL"{{ $registro->dependencia === 'JÓVENES REGIONAL' ? 'selected' : '' }}>JÓVENES REGIONAL</option>
       <option value="JOVENES ZONAL"{{ $registro->dependencia === 'JOVENES ZONAL' ? 'selected' : '' }}>JOVENES ZONAL</option>
       <option value="JOVENES LOCAL"{{ $registro->dependencia === ' -- ' ? 'selected' : '' }}>JOVENES LOCAL</option>
       <option value="EVANGELISMO NACIONAL"{{ $registro->dependencia === 'EVANGELISMO NACIONAL' ? 'selected' : '' }}>EVANGELISMO NACIONAL</option>
       <option value="EVANGELISMO REGIONAL"{{ $registro->dependencia === 'EVANGELISMO REGIONAL' ? 'selected' : '' }}>EVANGELISMO REGIONAL</option>
       <option value="EVANGELISMO ZONAL"{{ $registro->dependencia === 'EVANGELISMO ZONAL' ? 'selected' : '' }}>EVANGELISMO ZONAL</option>
       <option value="EVANGELISMO LOCAL"{{ $registro->dependencia === 'EVANGELISMO LOCAL' ? 'selected' : '' }}>EVANGELISMO LOCAL</option>
       <option value="INTERCESION NACIONAL"{{ $registro->dependencia === 'INTERCESION NACIONAL' ? 'selected' : '' }}>INTERCESION NACIONAL</option>
       <option value="INTERCESION REGIONAL"{{ $registro->dependencia === 'INTERCESION REGIONAL' ? 'selected' : '' }}>INTERCESION REGIONAL</option>
       <option value="INTERCESION ZONAL"{{ $registro->dependencia === 'INTERCESION ZONAL' ? 'selected' : '' }}>INTERCESION ZONAL</option>
       <option value="INTERCESION LOCAL"{{ $registro->dependencia === 'INTERCESION LOCAL' ? 'selected' : '' }}>INTERCESION LOCAL</option>
       <option value="IBF NACIONAL"{{ $registro->dependencia === 'IBF NACIONAL' ? 'selected' : '' }}>IBF NACIONAL</option>
       <option value="IBF REGIONAL"{{ $registro->dependencia === 'IBF REGIONAL' ? 'selected' : '' }}>IBF REGIONAL</option>
       <option value="IBF ZONAL"{{ $registro->dependencia === 'IBF ZONAL ' ? 'selected' : '' }}>IBF ZONAL</option>
       <option value="IBF LOCAL"{{ $registro->dependencia === 'IBF LOCAL' ? 'selected' : '' }}>IBF LOCAL</option>
       <option value="ESCUELA DOMINICAL NACIONAL"{{ $registro->dependencia === 'ESCUELA DOMINICAL NACIONAL' ? 'selected' : '' }}>ESCUELA DOMINICAL NACIONAL</option>
       <option value="ESCUELA DOMINICAL REGIONAL"{{ $registro->dependencia === 'ESCUELA DOMINICAL REGIONAL' ? 'selected' : '' }}>ESCUELA DOMINICAL REGIONAL</option>
       <option value="ESCUELA DOMINICAL ZONAL"{{ $registro->dependencia === 'ESCUELA DOMINICAL ZONAL' ? 'selected' : '' }}>ESCUELA DOMINICAL ZONAL</option>
       <option value="ESCUELA DOMINICAL LOCAL"{{ $registro->dependencia === 'ESCUELA DOMINICAL LOCAL' ? 'selected' : '' }}>ESCUELA DOMINICAL LOCAL</option>
       <option value="BRIGADA NACIONAL"{{ $registro->dependencia === 'BRIGADA NACIONAL' ? 'selected' : '' }}>BRIGADA NACIONAL</option>
       <option value="BRIGADA REGIONAL"{{ $registro->dependencia === 'BRIGADA REGIONAL' ? 'selected' : '' }}>BRIGADA REGIONAL</option>
       <option value="BRIGADA ZONAL"{{ $registro->dependencia === 'BRIGADA ZONAL' ? 'selected' : '' }}>BRIGADA ZONAL</option>
       <option value="BRIGADA LOCAL"{{ $registro->dependencia === 'BRIGADA LOCAL' ? 'selected' : '' }}>BRIGADA LOCAL</option>
       <option value="CONEF NACIONAL"{{ $registro->dependencia === 'CONEF NACIONAL' ? 'selected' : '' }}>CONEF NACIONAL</option>
       <option value="CONEF REGIONAL"{{ $registro->dependencia === 'CONEF REGIONAL' ? 'selected' : '' }}>CONEF REGIONAL</option>
       <option value="CONEF ZONAL"{{ $registro->dependencia === 'CONEF ZONAL' ? 'selected' : '' }}>CONEF ZONAL</option>
    </select>
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">IGLESIA:</label>
                            <input type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="iglesia" name="iglesia" placeholder="ej. Lirio,Sendero,Cristo" value="{{ $registro->iglesia}}" required>
                        </div>
                    </div>



                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">PASTOR:</label>
                            <input type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="pastor" name="pastor" placeholder="ej. Pedro,Jose,Elias" value="{{ $registro->pastor}}" required>
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">CIRCUITO:</label>
                            <input type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="circuito" name="circuito" placeholder="ej. Barinas, Guarico sur" value="{{ $registro->circuito}}" autocomplete="off" required>
                        </div>
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">ZONA:</label>
                            <input type="number" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="zona" name="zona" placeholder="ej. 1, 2,3" value="{{ $registro->zona}}" >
                        </div>

                    </div>




                    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">direccion:</label>
                            <input type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"  name="direccion" placeholder="" value="{{ $registro->direccion}}" required>
                        </div>


                        <div class="grid grid-cols-1">


                            <label for="exampleInputEmail1">Estado Civil:</label>
                            <div class="flex items-center space-x-4">
                                <input type="radio" id="estado_soltero" name="estado_civil" value="soltero" class="form-radio" {{ $registro->estado_civil === 'soltero' ? 'checked' : '' }}>
                                <label for="estado_soltero">Soltero</label>

                                <input type="radio" id="estado_casado" name="estado_civil" value="casado" class="form-radio" {{ $registro->estado_civil === 'casado' ? 'checked' : '' }}>
                                <label for="estado_casado">Casado</label>

                            </div>


                        </div>


                        <div class="grid grid-cols-1">


                            <label for="exampleInputEmail1">¿Es un Ministro Ordenado?:</label>
                            <div class="flex items-center space-x-4">
                                <input type="radio" id="ministro_odenado" name="ministro_ordenado" value="si" class="form-radio" {{ $registro->ministro_ordenado === 'si' ? 'checked' : '' }}>
                                <label for="ministro_odenado">Si</label>

                                <input type="radio" id="ministro_odenado" name="ministro_ordenado" value="no" class="form-radio" {{ $registro->ministro_ordenado === 'no' ? 'checked' : '' }}>
                                <label for="ministro_odenado">No</label>

                            </div>

                        </div>


                        <div class="grid grid-cols-1">


                            <label for="exampleInputEmail1">Fecha de Uncion:</label>
                            <div class="flex items-center space-x-4">
                                <input type="date" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="fecha_uncion" id="fecha_nacimiento" placeholder="ej. 20/10/1980" value="{{ $registro->fecha_uncion}}" required>

                            </div>

                        </div>

                    </div>

                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <a href="{{ route('registros.index') }}" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>

                 <form action="{{ route('registros.update',$registro->id) }}"  method="POST" class="formEditar"> 

                <button  type="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>

            
                </div>
            </form>
                
            </div>
        </div>
    </div>
</x-app-layout>


<!-- Script para ver la imagen antes de CREAR UN NUEVO registro -->








<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop


