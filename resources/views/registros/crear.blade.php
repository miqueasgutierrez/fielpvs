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


			    <div class="col-lg-6 col-12 mx-auto">
                <!-- Si todos los campos están validados, mostramos un mensaje de EXITO -->
                @if(Session::has('success'))
                    <div class="alert alert-success text-center">
                        {{Session::get('success')}}
                    </div>
                @endif   

            </div>
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

				<form action="{{ route('registros.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Cedula:</label>
							<input type="number"   class="form-control   @error('cedula') is-invalid @enderror"  id="cedula" name="cedula" placeholder="Ingrese su Cedula"  value="{{ old('cedula') }}">

								@error('cedula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de Cedula No puede estar vacio ni duplicado</strong>
                                </span>
                                 @enderror

						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Nombres:</label>
							<input type="text"  class="form-control   @error('nombres') is-invalid @enderror" id="nombres" name="nombres" minlength="5" placeholder="ej. Pedro, Juan"   min="5" max="20" value="{{ old('nombres') }}" >

							@error('nombres')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de nombres No puede estar vacio</strong>
                                </span>
                            @enderror

						</div>
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Apellidos:</label>
							<input type="text"  class="form-control   @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" placeholder="ej. Armada"  value="{{ old('apellidos') }}" >

							@error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de apellidos No puede estar vacio</strong>
                                </span>
                            @enderror

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
				    <input name="imagen" id="imagen" type='file' class="form-control   @error('imagen') is-invalid @enderror" value="{{ old('imagen') }}">

				    	@error('imagen')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{"@message"}}</strong>
                                </span>
                            @enderror
				    </label>
						</div>
					</div>


					<div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Fecha de Nacimiento:</label>
							<input type="date"  class="form-control   @error('fecha_nacimiento') is-invalid @enderror" value="{{ old('fecha_nacimiento') }}" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="ej. 20/10/1980"  >

							@error('fecha_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de Fecha de Nacimiento no puede estar vacio</strong>
                                </span>
                            @enderror

						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Telefono:</label>
							<input type="number"  class="form-control   @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}"  id="telefono" name="telefono" placeholder="Numero Celular"  >

							@error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de Fecha no puede estar vacio</strong>
                                </span>
                            @enderror

						</div>
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Edad:</label>
							<input type="number" class="form-control   @error('edad') is-invalid @enderror" value="{{ old('edad') }}" name="edad" id="edad" placeholder="Indique su Edad"   >


							@error('edad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de edad no puede estar vacio</strong>
                                </span>
                            @enderror
						</div>
					</div>




					<div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Genero:</label>
							<div class="flex items-center space-x-4">
								
								<input type="radio" id="genero_masculino" name="genero" value="masculino" class="@error('genero') is-invalid @enderror" {{ old('genero') == 'masculino' ? 'checked' : '' }} >
            <label for="genero_masculino">Masculino</label>

            <input type="radio" id="genero_femenino" name="genero" value="femenino" class="form-radio" {{ old('genero') == 'femenino' ? 'checked' : '' }}>
            <label for="genero_femenino">Femenino</label>

								@error('genero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de genero no puede estar vacio</strong>
                                </span>
                            @enderror

							</div>
						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">PROFESION U OFICIO:</label>
							<input type="profesion" class="form-control   @error('profesion') is-invalid @enderror" value="{{ old('profesion') }}"  id="profesion" name="profesion" placeholder="ej. Ingeniero, Trabajador de hogar"   >

							@error('profesion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de profesion no puede estar vacio</strong>
                                </span>
                            @enderror
						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">CARGO ACTUAL:</label>
							<input type="text" class="form-control   @error('cargo') is-invalid @enderror" value="{{ old('cargo') }}"   name="cargo" placeholder="ej. Presidente, Vocal, Pastor"   >

							@error('cargo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de cargo no puede estar vacio</strong>
                                </span>
                            @enderror

						</div>
					</div>



					<div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">MINISTERIO:</label>
							<select type="text" class="form-control   @error('ministerio') is-invalid @enderror" value="{{ old('ministerio') }}"  name="ministerio">
	   <option value="">SELECCIONES UNA OPCION</option>
	   <option value="PASTOR">PASTOR</option>
	   <option value="EVANGELISTA">EVANGELISTA</option>
	   <option value="PROFETA">PROFETA</option>
	   <option value="MAESTRO">MAESTRO</option>
	   <option value="NINGUNO">NINGUNO</option>
    </select>
     @error('ministerio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de ministerio no puede estar vacio</strong>
                                </span>
                            @enderror
						</div>
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">DEPENDENCIA:</label>
							<select type="text" class="form-control   @error('dependencia') is-invalid @enderror" value="{{ old('dependencia') }}"  name="dependencia">
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

     @error('dependencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de dependencia no puede estar vacio</strong>
                                </span>
                            @enderror

   
						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">IGLESIA:</label>
							<input type="text" class="form-control   @error('iglesia') is-invalid @enderror" value="{{ old('iglesia') }}"  id="iglesia" name="iglesia" placeholder="ej. Lirio,Sendero,Cristo"   >

							 @error('iglesia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de iglesia no puede estar vacio</strong>
                                </span>
                            @enderror

						</div>
					</div>



					<div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">PASTOR:</label>
							<input type="text" class="form-control   @error('pastor') is-invalid @enderror" value="{{ old('pastor') }}" id="pastor" name="pastor" placeholder="ej. Pedro,Jose,Elias"   >

							 @error('pastor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de pastor no puede estar vacio</strong>
                                </span>
                            @enderror
						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">CIRCUITO:</label>
							<input type="text" class="form-control   @error('circuito') is-invalid @enderror" value="{{ old('circuito') }}" id="circuito" name="circuito" placeholder="ej. Barinas, Guarico sur"   >

							 @error('circuito')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de circuito no puede estar vacio</strong>
                                </span>
                            @enderror
						</div>
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">ZONA:</label>
							<input type="number" class="form-control   @error('zona') is-invalid @enderror" value="{{ old('zona') }}" id="zona" name="zona" placeholder="ej. 1, 2,3">

							 @error('circuito')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de zona no puede estar vacio</strong>
                                </span>
                            @enderror

						</div>

					</div>

					<div class="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">direccion:</label>
							<input type="text" class="form-control   @error('direccion') is-invalid @enderror" value="{{ old('direccion') }}"  id="direccion" name="direccion" placeholder=""   >

							 @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de direccion  no puede estar vacio</strong>
                                </span>
                            @enderror

						</div>


						<div class="grid grid-cols-1">


							<label for="exampleInputEmail1">Estado Civil:</label>
							<div class="flex items-center space-x-4">
								   <input type="radio" id="estado_soltero" name="estado_civil" value="soltero" class="form-control @error('estado_civil') is-invalid @enderror" {{ old('estado_civil') == 'soltero' ? 'checked' : '' }}>
        <label for="estado_soltero">Soltero</label>

        <input type="radio" id="estado_casado" name="estado_civil" value="casado" class="form-control @error('estado_civil') is-invalid @enderror" {{ old('estado_civil') == 'casado' ? 'checked' : '' }}>
        <label for="estado_casado">Casado</label>



							 @error('estado_civil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de estado civil no puede estar vacio</strong>
                                </span>
                            @enderror

							</div>


						</div>


						<div class="grid grid-cols-1">


							<label for="exampleInputEmail1">¿Es un Ministro Ordenado?:</label>
							<div class="flex items-center space-x-4">
								<input type="radio" id="ministro_odenado" name="ministro_ordenado" value="si"  class="@error('ministro_ordenado') is-invalid @enderror" {{ old('ministro_ordenado') == 'si' ? 'checked' : '' }}>
								<label for="ministro_odenado">Si</label>

								<input type="radio" id="ministro_odenado" name="ministro_ordenado" value="no" class="@error('ministro_ordenado') is-invalid @enderror" {{ old('ministro_ordenado') == 'no' ? 'checked' : '' }}>
								<label for="ministro_odenado">No</label>


								 @error('ministro_ordenado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de Ministro Ordenado  no puede estar vacio</strong>
                                </span>
                            @enderror

							</div>

						</div>


						<div class="grid grid-cols-1">


							<label for="exampleInputEmail1">Fecha de Uncion:</label>
							<div class="flex items-center space-x-4">
								<input type="date" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="fecha_uncion" id="fecha_uncion" placeholder="ej. 20/10/1980"  >

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








