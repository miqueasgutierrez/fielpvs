@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content')

<style>
  .hidden {
    display: none;
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

				<form action="{{ route('cargos.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="grid grid-cols-1 md:grid-cols-1 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label for="exampleInputEmail1">Nombre de Cargo:</label>
							<input type="text"   class="form-control   @error('nombre') is-invalid @enderror"  id="nombre" name="nombre" placeholder="Ingrese el nombre de Cargo"  value="{{ old('nombre') }}">

								@error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>El campo No puede estar vacio ni duplicado</strong>
                                </span>
                                 @enderror

						</div>

	</div>
					<div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
						<a href="{{ route('cargos.index') }}" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
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


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop








