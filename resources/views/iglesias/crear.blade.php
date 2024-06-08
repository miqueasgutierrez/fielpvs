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


   

				<form action="{{ route('zonas.storeMultiple') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-1 gap-5 md:gap-8 mt-5 mx-7">
        <div class="grid grid-cols-1">
            <label for="circuito_id">Circuito</label>
            <select class="form-control" id="circuito_id" name="circuito_id" required>
                @foreach($circuitos as $circuito)
                    <option value="{{ $circuito->id }}">{{ $circuito->nombre }}</option>
                @endforeach
            </select>
        </div>
        
        <div id="zonas-container">
            <div class="zona-form">
                <div class="form-group">
                    <label for="nombre">Nombre de la Zona</label>
                    <input type="text" class="form-control" name="nombre[]" required>
                </div>
            </div>
        </div>
        
        <button type="button" class="btn btn-secondary" id="add-zona">Agregar Más Zonas</button>
        <button type="submit" class="btn btn-primary">Crear Zonas</button>
    </form>
</div>
        </div>
			</div>
		</div>
	</div>
</x-app-layout>

<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	


$(document).ready(function(){
            $('#add-zona').click(function() {
                var zonaForm = $('.zona-form').first().clone();
                zonaForm.find('input').val('');
                $('#zonas-container').append(zonaForm);
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








