-
@extends('adminlte::page')
@section('content')


<style>
 .thead-dark {
    background-color: black;
    color: white;
     text-align: center;
}

.thead-morado {
    background-color: #563d7c;
    color: white;
     text-align: center;
}

.centrar-texto {
    
     text-align: center;
}



.thead-dark td {
    color: white; /* Asegura que el texto dentro de los <td> también sea blanco */
}


.red-text {
    color: red;
}


 .center-container {
            
            justify-content: center;
           
}



</style>

    <x-app-layout>
    

    <div class="container text-center">
  <div class="row">
    <div class="col">
     
    </div>
    <div class="col">
     
    </div>
    <div class="col">
    <button onclick="window.location.href='{{ route('elecciones.index') }}'" class="btn btn-primary">
        <i class="fa fa-reply"></i> Volver
    </button>
    </div>
  </div>
</div>


    <div class="card-body table-responsive p-0" style="height: 600px;">    
<table class="table table-head-fixed text-nowrap table-bordered table-hover">


     <thead class=" ">
    <tr>
      <td  class="centrar-texto" colspan="4" scope="col"><h5>Contadores iniciales del proceso electoral</h5></td>
     
    </tr>
  </thead>

  
      <thead class="">
        <tr>
      <td  class="centrar-texto" colspan="3"><h5>Elecciones: Dependencia {{ $dependencia->nombre }}</h5></td>
      
    </tr>
    <tr>


        <tr>
      <td  class="centrar-texto" colspan="3"><h5>Ambito {{ $ambito->nombre }}</h5></td>
      
    </tr>
  


      <td  class="centrar-texto" colspan="3">

@foreach($dependencia->cargos as $cargo)
    </thead >
      <tr>
      <td class="bg-info text-white centrar-texto"  colspan="3"><h5>Cargo: {{ $cargo->nombre }}</h5></td>
      
    </tr>

    <thead class="thead-dark ">
    <tr>
      <td  colspan="4" scope="col">Candidatos</td>
     
    </tr>
  </thead>


    @if($cargo->candidatos->isEmpty())
         <tr>
      <td colspan="3"><p>No hay candidatos para este cargo.</p></td>
      

    </tr>  
        @else
         <tr>
      <th scope="col" class="centrar-texto"  ><p>Cedula</p></th>
      <th scope="col" class="centrar-texto"><p>Nombres y Apellidos</p></th>
      <th scope="col" class="centrar-texto" ><p>Votos recibidos</p></th>
    </tr>

     

       <tbody>

@foreach($cargo->candidatos as $candidato)
   
<tr>
      <th scope="col" class="centrar-texto">{{ $candidato->registro->cedula }}</th>
      <th scope="col" class="centrar-texto" >{{ $candidato->registro->nombres}} {{ $candidato->registro->apellidos }}</th>
      <th scope="col" class="centrar-texto">0</th>
    </tr>
 @endforeach

  @endif
    @endforeach

</tbody>
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




