
@extends('adminlte::page')
@section('content')


<style>
 .fixed-width {
        width: 150px; /* Ajusta este valor según tus necesidades */
    }
</style>

<x-app-layout>
    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    {{-- Mensaje de votación exitosa --}}
    <div class="alert alert-success">
        Votación realizada exitosamente
    </div>

    {{-- Botones para reimprimir ticket y cerrar ventana --}}
    
</x-app-layout>

<script>
    function imprimirPDF() {
        printJS({
            printable: '/fielpvs/public/comprobante.pdf', // Cambia esto por la ruta del archivo PDF generado
            type: 'pdf',
            showModal: true // Mostrar un modal de carga mientras se imprime
        });
    }

    function cerrarVentana() {
        window.close();
    }

    setTimeout(function() {
        imprimirPDF();
    }, 2000); 


     setTimeout(function() {
        cerrarVentana();
    }, 7000); 


    // Ajusta el tiempo según sea necesario
</script>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
@stop

@section('js')
  
@stop
