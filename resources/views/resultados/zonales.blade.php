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
        <h2 class="font-bold text-2xl text-gray-900 leading-tight text-center">
            {{ __('Crear Registros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Mensaje de éxito -->
            @if(Session::has('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center" role="alert">
                    <span class="block sm:inline">{{ Session::get('success') }}</span>
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg p-8">
                <!-- Título del formulario -->
                <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">
                    {{ __('Resultados Zonales') }}
                </h3>

                <!-- Formulario -->
                <form action="{{ route('resultadozonal') }}" method="POST" id="hidden-fields-form"  target="_blank">
                    @csrf


                      <input type="hidden" name="idambito" id="hiddenField2" value="3">

                     <div class="mb-4">
                        <label for="dependencia" class="block text-gray-700 font-medium mb-2">Dependencia:</label>
                        <select name="iddependencia" id="dependencia" class="form-control">
             <option value="">Seleccione una Dependencia</option>
            @foreach($dependencias as $dependencias)
                <option value="{{ $dependencias->id }}">{{ $dependencias->nombre }}</option>
            @endforeach
        </select>

    </div>


                    <div class="form-group">
                        <label for="circuito">Circuito</label>
                        <select name="circuito" id="circuito" class="form-control" required>
                            <option value="">Seleccione un circuito</option>
                            @foreach($circuitos as $circuito)
                                <option value="{{ $circuito->id }}">{{ $circuito->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="zona">Zona</label>
                        <select name="zona_id" id="zona" class="form-control" required>
                            <option value="">Seleccione una zona</option>
                            <!-- Las opciones de zona se llenarán dinámicamente -->
                        </select>
                    </div>

                     <div class="mb-4">
        <label for="anio" class="block text-gray-700 font-medium mb-2">Año:</label>
        <select name="anio" id="anio" class="form-control">
            <option value="">Seleccione un Año</option>
            @for ($year = 2024; $year <= 2050; $year++)
                <option value="{{ $year }}">{{ $year }}</option>
            @endfor
        </select>
    </div>


                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            Ver resultados
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>





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






    $(document).ready(function() {
        var iglesiaIndex = 1;

        $('#add-iglesia').click(function() {
            var newIglesiaForm = $('.iglesia-form').first().clone();
            newIglesiaForm.find('input').val('');
            newIglesiaForm.find('input').attr('name', 'iglesias[' + iglesiaIndex + '][nombre]');
            $('#iglesias-container').append(newIglesiaForm);
            iglesiaIndex++;
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







