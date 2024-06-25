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



 .centrar-imagen {
        text-align: center;
        vertical-align: middle;
    }

    .centrar-imagen img {
        display: inline-block;
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


     <thead class="thead-dark ">
    <tr>
      <td  colspan="5" scope="col">Lista de postulados para las elecciones </td>
     
    </tr>
  </thead>
      <thead class="thead-morado">
        <tr>
      <td colspan="5"><h5>Elecciones: Dependencia {{ $dependencia->nombre }}</h5></td>
      
    </tr>
  @foreach($dependencia->cargos as $cargo)
    </thead >
      <tr>
      <td class="bg-info text-white centrar-texto"  colspan="4"><h5>Cargo: {{ $cargo->nombre }}</h5></td>
      
    </tr>

    <thead class="thead-dark ">
    <tr>
      <td  colspan="5" scope="col">Candidatos</td>
     
    </tr>
  </thead>


    @if($cargo->candidatos->isEmpty())
         <tr>
      <td colspan="4"><p>No hay candidatos para este cargo.</p></td>
      
    </tr>  
        @else
         <tr>
      <th scope="col" class="centrar-texto"><p>Cedula</p></th>
      <th scope="col" class="centrar-texto"><p>Nombres </p></th>
      <th scope="col" class="centrar-texto" ><p>Apellidos</p></th>
      <th scope="col" class="centrar-texto"><p>Perfil</p></th>
    </tr>

     

       <tbody>

@foreach($cargo->candidatos as $candidato)
   
<tr>
      <th scope="col" class="centrar-texto" >{{ $candidato->registro->cedula }}</th>
      <th scope="col" class="centrar-texto" >{{ $candidato->registro->nombres }}</th>
        <th scope="col" class="centrar-texto">{{ $candidato->registro->apellidos }}</th>
      <th scope="col" class="centrar-imagen">  

 <img src="../../imagen/{{$candidato->registro->imagen}}" class="w-16 h-16 rounded-full" alt="Imagen">

       </th>
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




