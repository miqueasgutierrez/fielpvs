
@extends('adminlte::page')
@section('content')



<style>

 .fixed-width {
        width: 150px; /* Ajusta este valor según tus necesidades */
    }


</style>

    <x-app-layout>


<div class="col-sm-12">

  <h3 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
          {{ __('DATOS DEL ELECTOR') }}
       </h3>

      <div class="card-body table-responsive p-0" style="height: 600px;">  
 <table id="" class="table table-bordered table-striped dataTable dtr-inline">
    <thead>
        <tr class="bg-gray-800 text-white">
            <th class="sorting sorting_asc text-center fixed-width">CEDULA</th>
            <th class="sorting sorting_asc text-center fixed-width">NOMBRES</th>
            <th class="sorting sorting_asc text-center fixed-width">APELLIDOS</th>
            <th class="sorting sorting_asc text-center fixed-width">PERFIL</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="sorting sorting_asc text-center fixed-width">{{ $elector->cedula }}</td>
            <td class="sorting sorting_asc text-center fixed-width">{{ $elector->nombres }}</td>
            <td class="sorting sorting_asc text-center fixed-width">{{ $elector->apellidos }}</td>
            <td class="text-center">
                <img src="{{ asset('imagen/' . $elector->imagen) }}" class="w-16 h-16 rounded-full mx-auto" alt="Imagen">
            </td>
        </tr>
    </tbody>
</table>

<h3 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
          {{ __('Opciones a Votar') }}
       </h3>

   


<table class="table table-bordered table-striped dataTable dtr-inline" style="">
  <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
          {{ __('Ambito Nacional') }}
       </h5>
<tr>
     @php   
        $ultimadependencia = "";

    @endphp
 @foreach ($elecciones1 as $eleccion)

 @php
         $idambito = $eleccion->id;
 @endphp

    @foreach ($eleccion->dependencias as $dependencia)

     @php
            $idDependencia = $dependencia->dependencia->id;
            $nombreDependencia = $dependencia->dependencia->nombre;
        @endphp


  @if ($nombreDependencia != $ultimadependencia)
   

  <td class="px-4 py-2 text-center ">
 <a href="{{ route('elecciones.votacion', ['iddependencia' => $idDependencia, 'idambito' => $idambito]) }}" class="">

<div class="inner small-box bg-info fixed-width">

   

<br>
<br>
<br>
<br>
<br>
<p> {{ $nombreDependencia }}   </p>
<p></p>
<br>
<br>
<br>
<br>
<br>

</div>
</a>

           </td>
 @php
                $ultimadependencia = $nombreDependencia;
            @endphp
        @endif
    @endforeach

        @endforeach
</tr>
</table>



<table class="table table-bordered table-striped dataTable dtr-inline" style="">
  <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
          {{ __('Ambito Regional') }}
       </h5>

<tr>

     @php   
        $ultimadependencia = "";
    @endphp
 @foreach ($elecciones2 as $eleccion)
    @foreach ($eleccion->dependencias as $dependencia)

     @php
            $idDependencia = $dependencia->dependencia->id;
            $nombreDependencia = $dependencia->dependencia->nombre;
        @endphp


  @if ($nombreDependencia != $ultimadependencia)
   

  <td class="px-4 py-2 text-center ">

<div class="inner small-box bg-info fixed-width">

<br>
<br>
<br>
<br>
<br>
<p> {{ $nombreDependencia }}   </p>
<p></p>
<br>
<br>
<br>
<br>
<br>

</div>

           </td>
 @php
                $ultimadependencia = $nombreDependencia;
            @endphp
        @endif
    @endforeach

        @endforeach
</tr>
</table>


<table class="table table-bordered table-striped dataTable dtr-inline" style="">
  <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
          {{ __('Ambito Zonal') }}
       </h5>

<tr>

     @php   
        $ultimadependencia = "";
    @endphp
 @foreach ($elecciones3 as $eleccion)
    @foreach ($eleccion->dependencias as $dependencia)

     @php
            $idDependencia = $dependencia->dependencia->id;
            $nombreDependencia = $dependencia->dependencia->nombre;
        @endphp


  @if ($nombreDependencia != $ultimadependencia)
   

  <td class="px-4 py-2 text-center ">

<div class="inner small-box bg-info fixed-width">

<br>
<br>
<br>
<br>
<br>
<p> {{ $nombreDependencia }}   </p>
<p></p>
<br>
<br>
<br>
<br>
<br>

</div>

           </td>
 @php
                $ultimadependencia = $nombreDependencia;
            @endphp
        @endif
    @endforeach

        @endforeach
</tr>
</table>


<table class="table table-bordered table-striped dataTable dtr-inline" style="">
  <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
          {{ __('Ambito Local') }}
       </h5>
<tr>

     @php   
        $ultimadependencia = "";
    @endphp
 @foreach ($elecciones4 as $eleccion)
    @foreach ($eleccion->dependencias as $dependencia)

     @php
            $idDependencia = $dependencia->dependencia->id;
            $nombreDependencia = $dependencia->dependencia->nombre;
        @endphp


  @if ($nombreDependencia != $ultimadependencia)
   

  <td class="px-4 py-2 text-center ">

<div class="inner small-box bg-info fixed-width">

<br>
<br>
<br>
<br>
<br>
<p> {{ $nombreDependencia }}   </p>
<p></p>
<br>
<br>
<br>
<br>
<br>

</div>

           </td>
 @php
                $ultimadependencia = $nombreDependencia;
            @endphp
        @endif
    @endforeach

        @endforeach
</tr>
</table>


</div>
</div>
</x-app-layout>

<script>
    (function () {
  'use strict'
  //debemos crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form  
  var forms = document.querySelectorAll('.formEliminar')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {        
          event.preventDefault()
          event.stopPropagation()        
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
                    Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                }
            })                      
      }, false)
    })
})()
</script>

<script >
    
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




