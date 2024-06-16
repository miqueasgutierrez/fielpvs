@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
   <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de Registro') }}
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
                            <input  required class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="cedula" name="cedula"  value="{{ $registro->cedula }}"  readonly>
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Nombres:</label>
                            <input type="text" required class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="nombres" name="nombres" minlength="5" placeholder="ej. Pedro, Juan" value="{{ $registro->nombres }}"  readonly>
                        </div>
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Apellidos:</label>
                            <input type="text" required class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="apellidos" name="apellidos" placeholder="ej. Armada" value="{{ $registro->apellidos }}"    readonly>
                        </div>
                    </div>

                    <!-- Para ver la imagen seleccionada, de lo contrario no se -->
                    <div class="flex justify-center">
                        <img id="imagenSeleccionada" class="w-32 h-32 rounded-full mx-auto" src="/fielpvs/public/imagen/{{$registro->imagen}}" alt="Imagen de perfil">
                    </div>

        
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Fecha de Nacimiento:</label>
                              <input type="date" class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $registro->fecha_nacimiento}}" readonly>
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Telefono:</label>
                            <input  class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="telefono" name="telefono" placeholder="Numero Celular" value="{{ $registro->telefono}}" readonly >

                        </div>
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Edad:</label>
                            <input  class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="edad" id="edad" placeholder="Indique su Edad"  value="{{ $registro->edad}}" readonly>
                        </div>
                    </div>




                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Genero:</label>
                            <input  required class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="cedula" name="cedula"  value="{{ $registro->genero }}"  readonly>
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">PROFESION U OFICIO:</label>
                            <input type="profesion" class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="profesion" name="profesion" placeholder="ej. Ingeniero, Trabajador de hogas" value="{{ $registro->profesion}}" readonly>
                        </div>

                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">DEPENDENCIAS Y CARGOS:</label>
                           
        @foreach ($registroDependenciaCargos as $registroDependenciaCargo)
            <div>
                <p><strong>Dependencia:</strong> {{ $registroDependenciaCargo->dependenciaCargo->dependencia->nombre }}</p>
                <p><strong>Cargo:</strong> {{ $registroDependenciaCargo->dependenciaCargo->cargo->nombre }}</p>
            </div>
        @endforeach
                        </div>
                    </div>



                    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-8 mt-5 mx-7">
                        

                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">Es un ministro ungido ?:</label>  
                            <select id="modalSelector" name="ministro_ungido" class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
      <option value="">Seleccione</option>
      <option value="modal2" {{ $registro->ministro_ungido === 'modal2' ? 'selected' : '' }}>Sí</option>
        <option value="modal3" {{ $registro->ministro_ungido === 'modal3' ? 'selected' : '' }}>No</option>
    </select>

                        </div>



                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">MINISTERIO:</label>  
                             @foreach($registro->ministerios as $ministerio)
                <li>{{ $ministerio->nombre }}</li>
            @endforeach

            
             @if($categoriaungido)
               <label for="exampleInputEmail1">Categoria:</label>  
        <p>{{ $categoriaungido->nombre }}</p>
    @else
        
    @endif
    

                        </div>



                         <div class="grid grid-cols-1">


                            <label for="exampleInputEmail1">Año de Uncion:</label>
                            <div class="flex items-center space-x-4">
                                <input  class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="fecha_uncion" id="fecha_nacimiento" placeholder="ej. 20/10/1980" value="{{ $registro->fecha_uncion}}" readonly>

                            </div>

                        </div>

                      
              


      </div>


                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
                       
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">CIRCUITO:</label>
                            <input type="text" class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="circuito" name="circuito" placeholder="ej. Barinas, Guarico sur" value="{{ $circuito->nombre ?? '' }}" autocomplete="off" readonly>
                        </div>
                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">ZONA:</label>
                            <input  class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="zona" name="zona" placeholder="ej. 1, 2,3" value=" {{ $zona->nombre ?? '' }}" readonly>
                        </div>


                         <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">IGLESIA:</label>
                            <input type="text" class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="iglesia" name="iglesia" placeholder="ej. Lirio,Sendero,Cristo" value="{{ $iglesia->nombre ?? '' }}" readonly >
                        </div>
                        

                    </div>




                    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-8 mt-5 mx-7">

                       <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">PASTOR:</label>
                            <input type="text" class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="pastor" name="pastor" placeholder="ej. Pedro,Jose,Elias" value="{{ $registro->pastor}}" readonly>
                        </div>



                         


                        <div class="grid grid-cols-1">
                            <label for="exampleInputEmail1">direccion:</label>
                            <input type="text" class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"  name="direccion" placeholder="" value="{{ $registro->direccion}}" readonly>
                        </div>


                        <div class="grid grid-cols-1">


                            <label for="exampleInputEmail1">Estado Civil:</label>
                            <div class="flex items-center space-x-4">
                                  <input  required class="block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="cedula" name="cedula"  value="{{ $registro->estado_civil }}"  readonly>

                            </div>


                        </div>


                   

                    </div>

                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <a href="{{ route('registros.index') }}" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Volver</a>
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




