@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content')

<style>
  .hidden {
    display: none;
  }
</style>


  <style>
        .hidden {
            display: none;
        }
        fieldset {
            margin-bottom: 15px;
        }
        legend {
            font-weight: bold;
        }
     

    </style>

 
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
							<input type="number"   class="form-control   @error('cedula') is-invalid @enderror"  id="cedula" name="cedula" placeholder="Ingrese su Cedula"  value="{{ old('cedula') }}" required>

								@error('cedula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de Cedula No puede estar vacio ni duplicado</strong>
                                </span>
                                 @enderror

						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Nombres:</label>
							<input type="text"  class="form-control   @error('nombres') is-invalid @enderror" id="nombres" name="nombres" minlength="5" placeholder="ej. Pedro, Juan"   min="5" max="20" value="{{ old('nombres') }}" required>

							@error('nombres')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de nombres No puede estar vacio</strong>
                                </span>
                            @enderror

						</div>
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Apellidos:</label>
							<input type="text"  class="form-control   @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" placeholder="ej. Armada"  value="{{ old('apellidos') }}" required>

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
							<input type="date"  class="form-control   @error('fecha_nacimiento') is-invalid @enderror" value="{{ old('fecha_nacimiento') }}" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="ej. 20/10/1980" required>

							@error('fecha_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de Fecha de Nacimiento no puede estar vacio</strong>
                                </span>
                            @enderror

						</div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Telefono:</label>
							<input type="number"  class="form-control   @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}"  id="telefono" name="telefono" placeholder="Numero Celular"  required>

							@error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de Fecha no puede estar vacio</strong>
                                </span>
                            @enderror

						</div>
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Edad:</label>
							<input type="number" class="form-control   @error('edad') is-invalid @enderror" value="{{ old('edad') }}" name="edad" id="edad" placeholder="Indique su Edad" required>


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
								
								<input type="radio" id="genero_masculino" name="genero" value="masculino" class="@error('genero') is-invalid @enderror" {{ old('genero') == 'masculino' ? 'checked' : '' }} required>
            <label for="genero_masculino">Masculino</label>

            <input type="radio" id="genero_femenino" name="genero" value="femenino" class="form-radio" {{ old('genero') == 'femenino' ? 'checked' : '' }} required>
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
							<input type="profesion" class="form-control   @error('profesion') is-invalid @enderror" value="{{ old('profesion') }}"  id="profesion" name="profesion" placeholder="ej. Ingeniero, Trabajador de hogar"   required>

							@error('profesion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de profesion no puede estar vacio</strong>
                                </span>
                            @enderror
						</div>


<div class="grid grid-cols-1">
    <label for="dependencia">Cargo Actual o Miembro de Alguna Dependencia:</label>
    <select id="dependencia" name="dependencia">
        <option value="" disabled selected>Seleccione</option>
        @foreach($dependencias as $dependencia)
            <option value="{{ $dependencia->id }}">{{ $dependencia->nombre }}</option>
        @endforeach
    </select>
</div>

<!-- Modal -->
<div id="myModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
        <div class="grid grid-cols-1 max-h-96 overflow-y-auto p-4">
    
            <div id="cargos-dependencias-lista">
                @foreach($cargosDependencias as $cargoDependencia)
                    <div class="dependencia-item" data-dependencia-id="{{ $cargoDependencia->dependencia->id }}">
                        <input type="checkbox" id="cargo_dependencia{{ $cargoDependencia->id }}" name="cargo_dependencia[]" value="{{ $cargoDependencia->id }}">
                        <label for="dependencia_cargo{{ $cargoDependencia->id }}">{{ $cargoDependencia->cargo->nombre }}</label>
                    </div>
                @endforeach
            </div>
     </div>

        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button id="closeModalBtn" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                Aceptar
            </button>
            </div>
    </div>
</div>

<div id="modal2" class="hidden fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
  <div class="bg-white p-8 rounded">
    <label for=""> SELECCIONE SU MINISTERIO:</label>

   

                <div class="flex">

<div class="mr-4">
                    <input type="checkbox" id="" name="ministerio[]" value="PASTOR">
                <label for=""> PASTOR</label>
</div>
  <div class="mr-4">
    <input type="checkbox" id="ministerio1" name="ministerio[]" value="PASTOR MISIONERO">
    <label for="ministerio1">PASTOR MISIONERO</label>
  </div>
  <div class="mr-4">
    <input type="checkbox" id="ministerio2" name="ministerio[]" value="EVANGELISTA">
    <label for="ministerio2">EVANGELISTA</label>
  </div>
  <div>
    <input type="checkbox" id="ministerio3" name="ministerio[]" value="MAESTRO">
    <label for="ministerio3">MAESTRO</label>
  </div>
</div>


<label for=""> SELECCIONE SU CATEGORIA:</label>

<select id="categorias" name="categoria_ungidos" class="p-2 border rounded">
  <option value="">Selecciona una categoría</option>
  <option value="ANCIANO NACIONAL">ANCIANO NACIONAL</option>
  <option value="ANCIANO REGIONAL">ANCIANO REGIONAL</option>
  <option value="DIRECTIVO NACIONAL">DIRECTIVO NACIONAL</option>
  <option value="DIRECTIVO PRESBITERIO REGIONAL">DIRECTIVO PRESBITERIO REGIONAL</option>
  <option value="EVANGELISTA NACIONAL O REGIONAL">EVANGELISTA NACIONAL O REGIONAL</option>
  <option value="INTERCESION NACIONAL">INTERCESION NACIONAL</option>
</select>

                <br>

    <button id="closeModal2" type="button"  class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Aceptar</button>
  </div>
</div>

<div id="modal3" class="hidden fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
  <div class="bg-white p-8 rounded">
   <label for=""> SELECCIONE SU CATEGORIA:</label><br>

    <label>
    <input type="checkbox" id="obrero_pastor" name="ministerio[]" value="Obrero Pastor">
    Obrero Pastor (el que está encargado de un campo Blanco)
</label><br>
<label>
    <input type="checkbox" id="predicador_circuito" name="ministerio[]" value="Predicador de circuito">
    Predicador (a) de circuito
</label><br>
<label>
    <input type="checkbox" id="predicador_nacional" name="ministerio[]" value="Predicador nacional">
    Predicador (a) nacional
</label><br>
<label>
    <input type="checkbox" id="misionera_reconocida" name="ministerio[]" value="Misionera Reconocida">
    Misionera Reconocida
</label><br>
<label>
    <input type="checkbox" id="docente_titular" name="ministerio[]" value="Docente Titular">
    Docente Titular
</label><br>
<label>
    <input type="checkbox" id="docente_prueba" name="ministerio[]" value="Docente a Prueba">
    Docente a Prueba
</label><br>
<label>
    <input type="checkbox" id="directivo_jovenes" name="ministerio[]" value="Directivo de Jóvenes">
    Directivo de Jóvenes
</label><br>
<label>
    <input type="checkbox" id="directivo_damas" name="ministerio[]" value="Directivo de Damas">
    Directivo de Damas
</label><br>
<label>
    <input type="checkbox" id="directivo_evangelismo" name="ministerio[]" value="Directivo de Evangelismo">
    Directivo de Evangelismo
</label><br>
<label>
    <input type="checkbox" id="directivo_intercesion" name="ministerio[]" value="Directivo de Intercesión">
    Directivo de Intercesión
</label><br>
<label>
    <input type="checkbox" id="directivo_escuela_dominical" name="ministerio[]" value="Directivo de Escuela Dominical">
    Directivo de Escuela Dominical
</label><br>
<label>
    <input type="checkbox" id="besf" name="ministerio[]" value="BESF">
    BESF (Jerarquía correspondiente)
</label><br>
<label>
    <input type="checkbox" id="coordinador_zona" name="ministerio[]" value="Coordinador de Zona">
    Coordinador de Zona
</label><br>


    <button id="closeModal3" type="button" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Aceptar</button>
  </div>
</div>

</div>

					

 <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                    
                        <div class="grid grid-cols-1">

                            
                           <div class="grid grid-cols-1">
    <label for="modalSelector">¿Es usted un ministro ungido?</label>
    <select id="modalSelector" name="ministro_ungido" class="p-2 border rounded" required>
      <option value="">Seleccione</option>
      <option value="modal2">Sí</option>
      <option value="modal3">No</option>
    </select>
  </div>

                        </div>

                        <div class="grid grid-cols-1">
                           

                            <label for="anio_uncion">Año de unción:</label>
    <div class="flex items-center space-x-4">
      <input type="number" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="fecha_uncion" id="anio_uncion" placeholder="ej. 1990" min="1900" max="2034" value="{{ old('fecha_uncion') }}">
    </div>

                        </div>

  </div>

                      

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
						

                        
                        
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">CIRCUITO:</label>
							  <select name="circuito" id="circuito" class="form-control" required>
                            <option value="">Seleccione un circuito</option>
                            @foreach($circuitos as $circuito)
                                <option value="{{ $circuito->id }}">{{ $circuito->nombre }}</option>
                            @endforeach
                        </select>

							 @error('circuito')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de circuito no puede estar vacio</strong>
                                </span>
                            @enderror
						</div>
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">ZONA:</label>
							
                         <select name="zona" id="zona" class="form-control" required>
                            <option value="">Seleccione una zona</option>
                            <!-- Las opciones de zona se llenarán dinámicamente -->
                        </select>


							 @error('circuito')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de zona no puede estar vacio</strong>
                                </span>
                            @enderror

						</div>


                          <div class="grid grid-cols-1">
                            <label for="iglesia">Iglesia:</label>


                            <select id="iglesia" name="iglesia" >
    <!-- Options for churches -->
</select>

    @error('iglesia')
      <span class="invalid-feedback" role="alert">
        <strong>El campo de iglesia no puede estar vacío</strong>
      </span>
    @enderror         

                    </div>

					</div>

					<div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">



                        <div class="grid grid-cols-1">
                            
                            <label for="exampleInputEmail1">PASTOR:</label>
                            <input type="text" class="form-control   @error('pastor') is-invalid @enderror" value="{{ old('pastor') }}" id="pastor" name="pastor" placeholder="ej. Pedro,Jose,Elias"   required>

                             @error('pastor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de pastor no puede estar vacio</strong>
                                </span>
                            @enderror
                        </div>

						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">direccion:</label>
							<input type="text" class="form-control   @error('direccion') is-invalid @enderror" value="{{ old('direccion') }}"  id="direccion" name="direccion" placeholder="" required >

							 @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de direccion  no puede estar vacio</strong>
                                </span>
                            @enderror

						</div>


						<div class="grid grid-cols-1">


							<label for="exampleInputEmail1">Estado Civil:</label>
							<div class="flex items-center space-x-4">
								   <input type="radio" id="estado_soltero" name="estado_civil" value="soltero" class="form-control @error('estado_civil') is-invalid @enderror" {{ old('estado_civil') == 'soltero' ? 'checked' : '' }} required>
        <label for="estado_soltero">Soltero</label>

        <input type="radio" id="estado_casado" name="estado_civil" value="casado" class="form-control @error('estado_civil') is-invalid @enderror" {{ old('estado_civil') == 'casado' ? 'checked' : '' }} required>
        <label for="estado_casado">Casado</label>



							 @error('estado_civil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo de estado civil no puede estar vacio</strong>
                                </span>
                            @enderror

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


  function toggleSelect() {
  var ministro = document.getElementById("ministro").value;
  var selectContainer = document.getElementById("select-container");
  var otroSelect = document.getElementById("otro-select");

  if (ministro === "si") {
    selectContainer.classList.remove("hidden");
    otroSelect.classList.add("hidden");
  } else {
    selectContainer.classList.add("hidden");
    otroSelect.classList.remove("hidden");
  }
}


 document.getElementById('select-1').addEventListener('change', function() {
        document.getElementById('select-2').disabled = this.value !== '';
    });

    document.getElementById('select-2').addEventListener('change', function() {
        document.getElementById('select-1').disabled = this.value !== '';
    });

	
</script>





   <script>
        document.getElementById('anio_uncion').addEventListener('input', function() {
            const anio = this.value;
            if (anio.length > 4) {
                this.value = anio.slice(0, 4);
            }
        });
    </script>




    <script>
    // Función para mostrar los cargos en el modal según la dependencia seleccionada
    function mostrarCargos() {
        var dependenciaSeleccionada = document.getElementById('dependencia').value;
        var dependenciaItems = document.getElementsByClassName('dependencia-item');

        for (var i = 0; i < dependenciaItems.length; i++) {
            var item = dependenciaItems[i];
            if (item.getAttribute('data-dependencia-id') === dependenciaSeleccionada) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        }

        // Mostrar el modal
        document.getElementById('myModal').classList.remove('hidden');
    }

    // Evento change para el select de dependencia
    document.getElementById('dependencia').addEventListener('change', mostrarCargos);
</script>



<script>
    // JavaScript to handle modal open and close
    const dependenciaSelect = document.getElementById('dependencia');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const myModal = document.getElementById('myModal');

    // Function to open the modal and filter the cargos based on the selected dependencia
    function mostrarCargos() {
        const dependenciaSeleccionada = dependenciaSelect.value;
        const dependenciaItems = document.getElementsByClassName('dependencia-item');

        for (let item of dependenciaItems) {
            if (item.getAttribute('data-dependencia-id') === dependenciaSeleccionada) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        }

        myModal.classList.remove('hidden');
    }

    // Event listener for the dependencia dropdown
    dependenciaSelect.addEventListener('change', mostrarCargos);

    // Event listener for the close button
    closeModalBtn.addEventListener('click', (e) => {
        e.preventDefault();
        myModal.classList.add('hidden');
    });

    // Event listener to close the modal when clicking outside of it
    window.addEventListener('click', (e) => {
        if (e.target == myModal) {
            myModal.classList.add('hidden');
        }
    });


    $(document).ready(function(){
  // Función para mostrar el modal seleccionado
  $('#modalSelector').change(function(){
    var selectedModal = $(this).val();
    $('#' + selectedModal).removeClass('hidden');
  });

  // Función para cerrar el modal 2
  $('#closeModal2').click(function(){
    $('#modal2').addClass('hidden');
  });

  // Función para cerrar el modal 3
  $('#closeModal3').click(function(){
    $('#modal3').addClass('hidden');
  });
});


 $('#circuito').change(function() {
            var circuitoId = $(this).val();
            if (circuitoId) {
                $.ajax({
                    url: '/fielpvs/public/apizonas/' + circuitoId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#zona').empty();
                        $('#zona').append('<option value="">Seleccione una zona</option>');
                        $.each(data, function(key, value) {
                            $('#zona').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al obtener zonas:', error);
                    }
                });
            } else {
                $('#zona').empty();
                $('#zona').append('<option value="">Seleccione una zona</option>');
            }
        });

$('#zona').change(function() {
    var zonaId = $(this).val();
    // Realizar una solicitud AJAX para obtener las iglesias de la zona seleccionada
    $.get('/fielpvs/public/api-iglesias/' + zonaId, function(iglesias) {
        $('#iglesia').empty();
        $('#iglesia').append('<option value="">Seleccione una iglesia</option>');
        $.each(iglesias, function(id, nombre) {
            $('#iglesia').append('<option value="' + id + '">' + nombre + '</option>');
        });
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

<script>

</script>