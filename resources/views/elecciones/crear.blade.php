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
                
                <form action="{{ route('iglesias.storeMultiple') }}" method="POST">
                    @csrf

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

                    <div id="iglesias-container">
                        <div class="iglesia-form">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Iglesia</label>
                                <input type="text" name="iglesias[0][nombre]" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="add-iglesia" class="btn btn-secondary">Agregar Otra Iglesia</button>
                    <button type="submit" class="btn btn-primary">Crear Iglesias</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
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







