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

				<form method="POST" action="{{ route('cargosdependencias.store') }}">
    @csrf

    <div class="form-group">
        <label for="dependencia">Dependencia:</label>
        <select name="id_dependencia" id="dependencia" class="form-control">
            @foreach($dependencias as $dependencia)
                <option value="{{ $dependencia->id }}">{{ $dependencia->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="dependencia">Ambitos:</label>
        <select name="id_ambito" id="ambito" class="form-control">
            @foreach($ambitosdependencias as $ambitos)
                <option value="{{ $ambitos->id }}">{{ $ambitos->nombre }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="cargo">Cargo:</label>
        <select name="id_cargo" id="cargo" class="form-control">
            @foreach($cargos as $cargo)
                <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Registrar</button>
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








