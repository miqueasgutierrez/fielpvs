@extends('adminlte::page')

@section('content')

<style>
    .centrar-texto {
        text-align: center;
    }
    .centrar-imagen {
        text-align: center;
        vertical-align: middle;
    }
    .centrar-imagen img {
        display: inline-block;
        width: 64px;  /* Cambia según tus necesidades */
        height: 64px; /* Cambia según tus necesidades */
        border-radius: 50%;
    }
</style>

<div class="container">
    <div class="container text-center">
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col">
                <button onclick="window.location.href='{{ route('elecciones.index') }}'" class="btn btn-primary">
                    <i class="fa fa-reply"></i> Volver
                </button>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <h2>Vista de Resultados</h2>
        <h5>Dependencia: {{ $nombredependencia }} | Ámbito: {{ $nombreambito }}</h5>
        
        <table class="table table-bordered table-striped dataTable dtr-inline">
            <thead class="thead-dark">
                <tr>
                    <th>Cédula</th>
                    <th>Nombres y Apellidos</th>
                    <th>Votos recibidos</th>
                    <th>Porcentaje</th>
                    <th>Condición</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $ultimocargo = '';
                @endphp

                @foreach($dependencia as $item)
                    @if($item->nombrecargo != $ultimocargo)
                        @if($ultimocargo != '')
                           
                        @endif
                       
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th colspan="6">Cargo: {{ $item->nombrecargo }}</th>
                                </tr>
                            </thead>
                            <tbody>
                        @php
                            $ultimocargo = $item->nombrecargo;
                        @endphp
                    @endif

                    <tr>
                        <td>{{ $item->cedula }}</td>
                        <td>{{ $item->nombres }}<br>{{ $item->apellidos }}</td>
                        <td>{{ $item->candidatos_count }}</td>
                        <td></td>
                        <td></td>
                        <td class="px-4 py-2 text-center centrar-imagen dt-type-numeric">
                            <img src="{{ asset('imagen/'.$item->imagen) }}" alt="Imagen">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>  
    </div>
</div>

<script>
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.formEliminar');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {        
                event.preventDefault();
                event.stopPropagation();        
                Swal.fire({
                    title: '¿Confirma la eliminación de la zona?',        
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#20c997',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Confirmar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.', 'success');
                    }
                });                      
            }, false);
        });
    })();
</script>

<script>
    new DataTable('#zonas');
</script>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
