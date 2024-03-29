@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content')
  

<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		  {{ __('Crear Registros') }}
	   </h2>
	</x-slot>


	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

				<form action="{{ route('registros.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Cedula:</label>
							<input type="number" required class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="cedula" name="cedula" placeholder="Ingrese su Cedula" required>
						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Nombres:</label>
							<input type="text" required class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="nombres" name="nombres" minlength="5" placeholder="ej. Pedro, Juan"   min="5" max="20">
						</div>
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Apellidos:</label>
							<input type="text" required class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="apellidos" name="apellidos" placeholder="ej. Armada"   required>
						</div>
					</div>

					<!-- Para ver la imagen seleccionada, de lo contrario no se -->
					<div class="flex justify-center">
						<img id="imagenSeleccionada" class="w-32 h-32 rounded-full mx-auto" src="/fielpvs/public/imagen/perfil.svg" alt="Imagen de perfil">
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
							<input type="date" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="ej. 20/10/1980"  required>
						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Telefono:</label>
							<input type="number" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="telefono" name="telefono" placeholder="Numero Celular"   required>

						</div>
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Edad:</label>
							<input type="number" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="edad" id="edad" placeholder="Indique su Edad"   required>
						</div>
					</div>




					<div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Genero:</label>
							<div class="flex items-center space-x-4">
								<input type="radio" id="genero_masculino" name="genero" value="masculino" class="form-radio">
								<label for="genero_masculino">Masculino</label>

								<input type="radio" id="genero_femenino" name="genero" value="femenino" class="form-radio">
								<label for="genero_femenino">Femenino</label>

							</div>
						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">PROFESION U OFICIO:</label>
							<input type="profesion" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="profesion" name="profesion" placeholder="ej. Ingeniero, Trabajador de hogas"   required>
						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">CARGO ACTUAL:</label>
							<input type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="cargo" placeholder="ej. Presidente, Vocal, Pastor"   required>
						</div>
					</div>



					<div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">MINISTERIO:</label>
							<select type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="ministerio">
	   <option value="">SELECCIONES UNA OPCION</option>
	   <option value="PASTOR">PASTOR</option>
	   <option value="EVANGELISTA">EVANGELISTA</option>
	   <option value="PROFETA">PROFETA</option>
	   <option value="MAESTRO">MAESTRO</option>
	   <option value="NINGUNO">NINGUNO</option>
    </select>
						</div>
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">DEPENDENCIA:</label>
							<select type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="dependencia">
	   <option value="">SELECCIONES UNA OPCION</option>
	   <option value="ANCIANO NACIONAL">ANCIANO NACIONAL</option>
	   <option value="ANCIANO REGIONAL">ANCIANO REGIONAL</option>
	   <option value="PRESBITERIO NACIONAL">PRESBITERIO NACIONAL</option>
	   <option value="PRESBITERIO REGIONAL">PRESBITERIO REGIONAL</option>
	   <option value="DAMAS NACIONAL">DAMAS NACIONAL</option>
	   <option value="DAMAS REGIONAL">DAMAS REGIONAL</option>
	   <option value="DAMAS ZONAL">DAMAS ZONAL</option>
	   <option value="DAMAS LOCAL">DAMAS LOCAL</option>
	   <option value="JÓVENES NACIONAL">JÓVENES NACIONAL</option>
	   <option value="JÓVENES REGIONAL">JÓVENES REGIONAL</option>
	   <option value="JOVENES ZONAL">JOVENES ZONAL</option>
	   <option value="JOVENES LOCAL">JOVENES LOCAL</option>
	   <option value="EVANGELISMO NACIONAL">EVANGELISMO NACIONAL</option>
	   <option value="EVANGELISMO REGIONAL">EVANGELISMO REGIONAL</option>
	   <option value="EVANGELISMO ZONAL">EVANGELISMO ZONAL</option>
	   <option value="EVANGELISMO LOCAL">EVANGELISMO LOCAL</option>
	   <option value="INTERCESION NACIONAL">INTERCESION NACIONAL</option>
	   <option value="INTERCESION REGIONAL">INTERCESION REGIONAL</option>
	   <option value="INTERCESION ZONAL">INTERCESION ZONAL</option>
	   <option value="INTERCESION LOCAL">INTERCESION LOCAL</option>
	   <option value="IBF NACIONAL">IBF NACIONAL</option>
	   <option value="IBF REGIONAL">IBF REGIONAL</option>
	   <option value="IBF ZONAL">IBF ZONAL</option>
	   <option value="IBF LOCAL">IBF LOCAL</option>
	   <option value="ESCUELA DOMINICAL NACIONAL">ESCUELA DOMINICAL NACIONAL</option>
	   <option value="ESCUELA DOMINICAL REGIONAL">ESCUELA DOMINICAL REGIONAL</option>
	   <option value="ESCUELA DOMINICAL ZONAL">ESCUELA DOMINICAL ZONAL</option>
	   <option value="ESCUELA DOMINICAL LOCAL">ESCUELA DOMINICAL LOCAL</option>
	   <option value="BRIGADA NACIONAL">BRIGADA NACIONAL</option>
	   <option value="BRIGADA REGIONAL">BRIGADA REGIONAL</option>
	   <option value="BRIGADA ZONA">BRIGADA ZONAL</option>
	   <option value="BRIGADA LOCAL">BRIGADA LOCAL</option>
	   <option value="CONEF NACIONAL">CONEF NACIONAL</option>
	   <option value="CONEF REGIONAL">CONEF REGIONAL</option>
	   <option value="CONEF ZONAL">CONEF ZONAL</option>
    </select>
						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">IGLESIA:</label>
							<input type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="iglesia" name="iglesia" placeholder="ej. Lirio,Sendero,Cristo"   required>
						</div>
					</div>



					<div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">PASTOR:</label>
							<input type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="pastor" name="pastor" placeholder="ej. Pedro,Jose,Elias"   required>
						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">CIRCUITO:</label>
							<input type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="circuito" name="circuito" placeholder="ej. Barinas, Guarico sur"   required>
						</div>
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">ZONA:</label>
							<input type="number" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="zona" name="zona" placeholder="ej. 1, 2,3">
						</div>

					</div>




					<div class="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">direccion:</label>
							<input type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="pastor" name="direccion" placeholder=""   required>
						</div>


						<div class="grid grid-cols-1">


							<label for="exampleInputEmail1">Estado Civil:</label>
							<div class="flex items-center space-x-4">
								<input type="radio" id="estado_soltero" name="estado_civil" value="soltero" class="form-radio">
								<label for="estado_soltero">Soltero</label>

								<input type="radio" id="estado_casado" name="estado_civil" value="casado" class="form-radio">
								<label for="estado_casado">Casado</label>

							</div>


						</div>


						<div class="grid grid-cols-1">


							<label for="exampleInputEmail1">¿Es un Ministro Ordenado?:</label>
							<div class="flex items-center space-x-4">
								<input type="radio" id="ministro_odenado" name="ministro_ordenado" value="si" class="form-radio">
								<label for="ministro_odenado">Si</label>

								<input type="radio" id="ministro_odenado" name="ministro_ordenado" value="no" class="form-radio">
								<label for="ministro_odenado">No</label>

							</div>

						</div>


						<div class="grid grid-cols-1">


							<label for="exampleInputEmail1">Fecha de Uncion:</label>
							<div class="flex items-center space-x-4">
								<input type="date" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="fecha_uncion" id="fecha_nacimiento" placeholder="ej. 20/10/1980"  required>

							</div>

						</div>

					</div>

					<div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
						<a href="{{ route('registros.index') }}" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
						<button type="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</x-app-layout>

<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->














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








