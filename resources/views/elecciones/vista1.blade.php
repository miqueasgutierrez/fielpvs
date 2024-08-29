
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

    

         <div class="container text-center">
  <div class="row">
    <div class="col">
     
    </div>
    <div class="col">
     
    </div>
   
  </div>
</div>
  

<div class="col-sm-12">

  <h3 class="font-semibold text-xl text-gray-1200 leading-tight text-center ">
          {{ __('DATOS DEL ELECTOR') }}
       </h3>

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
          {{ __('Opciones de Votación:') }}
       </h3>

   @php   
$id_votante = $elector->id;

 $idambito1 = 1;
   @endphp

 <!-- AMBITO NACIONAL-->



    @php
    $eleccionesnacionales = collect($eleccionesnacionales);
@endphp

 <table id="" class="table table-bordered table-striped dataTable dtr-inline">
  <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
          {{ __('1-ÁMBITO NACIONAL:') }}
       </h5>

 
@if($eleccionesnacionales->isEmpty())
        <tr>
            <td colspan="4" class="text-center"><p>No tienes permiso para votar en esta elección.</p></td>
        </tr>
    @else
   
     @foreach ($eleccionesnacionales as $dependencia)
  
@php   
$idDependencia = $dependencia['id'];
   @endphp

  <td id="{{$idDependencia}}" class="px-4 py-2 text-center ">
    <a   href="{{ route('elecciones.votacion', ['idvotante' => $id_votante,'iddependencia' => $idDependencia, 'idambito' => $idambito1]) }}" class="">


<div class="inner small-box bg-info fixed-width">

<br>
<br>
<br>
<br>
<br>
  <p>{{ $dependencia['nombre'] }}</p>
<p></p>
<br>
<br>
<br>
<br>
<br>
</div>

           </td>
 @endforeach

  @endif
</tr>
</table>


<!-- AMBITO REGIONAL-->


<div class="table-responsive">
    @php
    $eleccionesregionales = collect($eleccionesregionales);
@endphp

 <table id="" class="table table-bordered table-striped dataTable dtr-inline">
  <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
        2-ÁMBITO REGIONAL:   {{  $infovotante->circuito }}
       </h5>

 
@if($eleccionesregionales->isEmpty())
        <tr>
            <td colspan="4" class="text-center"><p>No tienes permiso para votar en esta elección.</p></td>
        </tr>
    @else
   
     @foreach ($eleccionesregionales as $dependencia)
  
@php   
$idDependencia = $dependencia['id'];

$idambito2 = 2; 
   @endphp

  <td id="{{$idDependencia}}" class="px-4 py-2 text-center ">
    <a   href="{{ route('elecciones.votacionregional', ['idvotante' => $id_votante,'iddependencia' => $idDependencia, 'idambito' => $idambito2]) }}" class="">


<div class="inner small-box bg-info fixed-width">

<br>
<br>
<br>
<br>
<br>
  @php
        switch ($dependencia['nombre']) {
            case 'SONADAM':
                $message = "DAMAS";
                break;
            case 'EVANGELISMO Y MISIONES':
                $message = "EVANGELISMO";
                break;
            case 'EVANGELISMO Y MISIONES':
                $message = "EVANGELISMO";
                break;
            case 'SONAJOV':
                $message = "JÓVENES REGIONALES ";
                break;
            case 'SONAJOV':
                $message = "JÓVENES REGIONALES ";
                break;
            case 'INTERCESIÓN':
                $message = "INTERCESIÓN";
                break;
            case 'PRESBÍTERO REGIONAL':
                $message = "PRESBÍTERO REGIONAL";
                break;
            case 'ESCUELA DOMINICAL':
                $message = "ESCUELA DOMINICAL";
                break;

             case 'BESF':
                $message = "BESF";
                break;

            default:
                $message = "";
        }
    @endphp



  <p>{{ $message }}</p>
<p></p>
<br>
<br>
<br>
<br>
<br>
</div>

           </td>
 @endforeach

  @endif
</tr>
</table>
</div>








<!-- AMBITO ZONAL-->


<div class="table-responsive">
    @php
    $eleccioneszonales = collect($eleccioneszonales);
@endphp

 <table id="" class="table table-bordered table-striped dataTable dtr-inline">
  <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
        3-ÁMBITO ZONAL:   {{  $infovotante->zona }}
       </h5>

 
@if($eleccioneszonales->isEmpty())
        <tr>
            <td colspan="4" class="text-center"><p>No tienes permiso para votar en esta elección.</p></td>
        </tr>
    @else
   
     @foreach ($eleccioneszonales as $dependencia)
  
@php   


$idambito3= 3; 

$idDependencia = $dependencia['id'];
   @endphp

  <td id="{{$idDependencia}}" class="px-4 py-2 text-center ">
    <a   href="{{ route('elecciones.votacionzonal', ['idvotante' => $id_votante,'iddependencia' => $idDependencia, 'idambito' => $idambito3]) }}" class="">


<div class="inner small-box bg-info fixed-width">

<br>
<br>
<br>
<br>
<br>
  <p>{{ $dependencia['nombre'] }}</p>
<p></p>
<br>
<br>
<br>
<br>
<br>
</div>

           </td>
 @endforeach

  @endif
</tr>
</table>
</div>




<!-- AMBITO LOCAL-->


<div class="table-responsive">
    @php
    $eleccioneslocales = collect($eleccioneslocales);


@endphp

 <table id="" class="table table-bordered table-striped dataTable dtr-inline">
  <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
        4-ÁMBITO LOCAL: IGLESIA {{  $infovotante->iglesia }}
       </h5>

 
@if($eleccioneslocales->isEmpty())
        <tr>
            <td colspan="4" class="text-center"><p>No tienes permiso para votar en esta elección.</p></td>
        </tr>
    @else
   
     @foreach ($eleccioneslocales as $dependencia)


   
  
@php   

$idambito4= 4; 

$idDependencia = $dependencia['id'];
   @endphp

  <td id="{{$idDependencia}}" class="px-4 py-2 text-center ">
    <a   href="{{ route('elecciones.votacionlocal', ['idvotante' => $id_votante,'iddependencia' => $idDependencia, 'idambito' => $idambito4]) }}" class="">


<div class="inner small-box bg-info fixed-width">

<br>
<br>
<br>
<br>
<br>
  <p>{{ $dependencia['descripcion_local'] }}</p>
<p></p>
<br>
<br>
<br>
<br>
<br>
</div>

           </td>
 @endforeach

  @endif
</tr>
</table>







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




