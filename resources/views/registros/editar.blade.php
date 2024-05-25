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


   <label for="exampleInputEmail1">Probando codigo:</label>

<div class="flex items-center space-x-4">
    <input type="checkbox" id="genero_masculino" name="ministerio[]" value="PASTOR" class="form-checkbox" 
        {{ in_array('PASTOR', $selectedMinisterios) ? 'checked' : '' }}>
    <label for="genero_masculino">Masculino</label>

    <input type="checkbox" id="genero_femenino" name="ministerio[]" value="EVANGELISTA" class="form-checkbox" 
        {{ in_array('EVANGELISTA', $selectedMinisterios) ? 'checked' : '' }}>
    <label for="genero_femenino">Femenino</label>
</div>
                             


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

<label for="ministro" class="block mb-2">Tipo de ministro:</label>

<button id="openModalBtn2" class="px-1 py-1 bg-blue-500 text-white rounded-md">Seleccionar</button> 
</div>

    <div id="myModal2" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="grid grid-cols-1">

           <label for="">MINISTRO ORDENADO :</label>
<div id="">
    <input type="checkbox" id="pastor" name="ministerio[]" value="PASTOR"
        {{ in_array('PASTOR', $selectedMinisterios) ? 'checked' : '' }}>
    <label for="pastor"> PASTOR</label><br>

    <input type="checkbox" id="pastor_misionero" name="ministerio[]" value="PASTOR MISIONERO"
        {{ in_array('PASTOR MISIONERO', $selectedMinisterios) ? 'checked' : '' }}>
    <label for="pastor_misionero">PASTOR MISIONERO</label><br>
    
    <input type="checkbox" id="evangelista" name="ministerio[]" value="EVANGELISTA"
        {{ in_array('EVANGELISTA', $selectedMinisterios) ? 'checked' : '' }}>
    <label for="evangelista">EVANGELISTA</label><br>
    
    <input type="checkbox" id="maestro" name="ministerio[]" value="MAESTRO"
        {{ in_array('MAESTRO', $selectedMinisterios) ? 'checked' : '' }}>
    <label for="maestro">MAESTRO</label><br>
</div>

<label for="">MINISTRO NO ORDENADO :</label>
<div id="">
    <label>
        <input type="checkbox" id="obrero_pastor" name="ministerio[]" value="Obrero Pastor"
            {{ in_array('Obrero Pastor', $selectedMinisterios) ? 'checked' : '' }}>
        Obrero Pastor (el que está encargado de un campo Blanco)
    </label><br>

    <label>
        <input type="checkbox" id="predicador_circuito" name="ministerio[]" value="Predicador de circuito"
            {{ in_array('Predicador de circuito', $selectedMinisterios) ? 'checked' : '' }}>
        Predicador (a) de circuito
    </label><br>

    <label>
        <input type="checkbox" id="predicador_nacional" name="ministerio[]" value="Predicador nacional"
            {{ in_array('Predicador nacional', $selectedMinisterios) ? 'checked' : '' }}>
        Predicador (a) nacional
    </label><br>

    <label>
        <input type="checkbox" id="misionera_reconocida" name="ministerio[]" value="Misionera Reconocida"
            {{ in_array('Misionera Reconocida', $selectedMinisterios) ? 'checked' : '' }}>
        Misionera Reconocida
    </label><br>

    <label>
        <input type="checkbox" id="docente_titular" name="ministerio[]" value="Docente Titular"
            {{ in_array('Docente Titular', $selectedMinisterios) ? 'checked' : '' }}>
        Docente Titular
    </label><br>

    <label>
        <input type="checkbox" id="docente_prueba" name="ministerio[]" value="Docente a Prueba"
            {{ in_array('Docente a Prueba', $selectedMinisterios) ? 'checked' : '' }}>
        Docente a Prueba
    </label><br>

    <label>
        <input type="checkbox" id="directivo_jovenes" name="ministerio[]" value="Directivo de Jóvenes"
            {{ in_array('Directivo de Jóvenes', $selectedMinisterios) ? 'checked' : '' }}>
        Directivo de Jóvenes
    </label><br>

    <label>
        <input type="checkbox" id="directivo_damas" name="ministerio[]" value="Directivo de Damas"
            {{ in_array('Directivo de Damas', $selectedMinisterios) ? 'checked' : '' }}>
        Directivo de Damas
    </label><br>

    <label>
        <input type="checkbox" id="directivo_evangelismo" name="ministerio[]" value="Directivo de Evangelismo"
            {{ in_array('Directivo de Evangelismo', $selectedMinisterios) ? 'checked' : '' }}>
        Directivo de Evangelismo
    </label><br>

    <label>
        <input type="checkbox" id="directivo_intercesion" name="ministerio[]" value="Directivo de Intercesión"
            {{ in_array('Directivo de Intercesión', $selectedMinisterios) ? 'checked' : '' }}>
        Directivo de Intercesión
    </label><br>

    <label>
        <input type="checkbox" id="directivo_escuela_dominical" name="ministerio[]" value="Directivo de Escuela Dominical"
            {{ in_array('Directivo de Escuela Dominical', $selectedMinisterios) ? 'checked' : '' }}>
        Directivo de Escuela Dominical
    </label><br>

    <label>
        <input type="checkbox" id="besf" name="ministerio[]" value="BESF"
            {{ in_array('BESF', $selectedMinisterios) ? 'checked' : '' }}>
        BESF (Jerarquía correspondiente)
    </label><br>

    <label>
        <input type="checkbox" id="coordinador_zona" name="ministerio[]" value="Coordinador de Zona"
            {{ in_array('Coordinador de Zona', $selectedMinisterios) ? 'checked' : '' }}>
        Coordinador de Zona
    </label><br>



    
    
 
    </div>
</div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button id="closeModalBtn2" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Aceptar
                </button>
            </div>
        </div>
                           
                        </div>

                        <div class="grid grid-cols-1">
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



<script>
        // JavaScript to handle modal open and close
        const openModalBtn2 = document.getElementById('openModalBtn2');
        const closeModalBtn2 = document.getElementById('closeModalBtn2');
        const myModal2 = document.getElementById('myModal2');

        openModalBtn2.addEventListener('click', (e) => {
            e.preventDefault();  // Prevent default action if it's a link or button with a form
            myModal2.classList.remove('hidden');
        });

        closeModalBtn2.addEventListener('click', (e) => {
            e.preventDefault();  // Prevent default action if it's a link or button with a form
            myModal2.classList.add('hidden');
        });

        window.addEventListener('click', (e) => {
            if (e.target == myModal2) {
                myModal2.classList.add('hidden');
            }
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


