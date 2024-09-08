
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
.form-check-input {
            width: 1.5em;
            height: 1.5em;
        }

<meta name="csrf-token" content="{{ csrf_token() }}">
</style>
    <x-app-layout>

      

    
<div class="col-lg-6 col-12 mx-auto">
                <!-- Si todos los campos están validados, mostramos un mensaje de EXITO -->
                @if(Session::has('success'))
                    <div class="alert alert-success text-center">
                        {{Session::get('success')}}
                    </div>
                @endif   

            </div>

            <h3 class="font-semibold text-xl text-gray-1200 leading-tight text-center ">

          {{  $nombredepartamento }}
       </h3>

            

<div class="col-sm-12">
  <table id="candidatos" class="table table-bordered table-striped dataTable dtr-inline">
    <thead>
      <tr class="bg-gray-800 text-white">
              @foreach ($cargos as $cargo)



        <th class="sorting sorting_asc text-center">{{ $cargo->nombre }}</th>

           @endforeach
      </tr>
    </thead>
    <tbody>
      <tr>

        
 @foreach ($cargos as $cargo)


   
            <td class="px-4 py-2 text-center centrar-imagen">
         <a data-toggle="modal" href="#myModal{{ $cargo->iddependenciacargo }}">
       <button id="btnAgregarArt()" type="button" class="btn btn-primary"><span class="fa fa-plus"></span>Agregar Candidatos</button>
     </a>
        
<div   id="cargo{{ $cargo->iddependenciacargo }}"  class="inner small-box bg-info fixed-width centrar-imagen">

          

</div>
        </td>
           @endforeach
        <td class="px-4 py-2">
          <div class="flex justify-center space-x-2">
            <!-- botón editar -->
        
        
            <!-- botón borrar -->
            <form action="" method="POST" class="formEliminar">
              @csrf
              @method('DELETE')
              
            </form>
      
        </td>
      </tr>
    
    </tbody>
  </table>



@foreach ($cargos as $cargo)

    <div class="modal fade " id="myModal{{ $cargo->iddependenciacargo }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione los candidatos</h4>
        </div>
        <div class="modal-body">
            <table id="Registros" class="table table-bordered table-striped dataTable dtr-inline">
    <thead>
      <tr class="bg-gray-800 text-white">
        <th class="sorting sorting_asc text-center">CEDULA</th>
        <th class="sorting sorting_asc text-center">NOMBRES</th>
        <th class="sorting sorting_asc text-center">APELLIDOS</th>
        <th class="sorting sorting_asc text-center">PERFIL</th>
        <th class="sorting sorting_asc text-center ">ACCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($registros as $registro)
      <tr>
        <td class="px-4 py-2 text-center">{{$registro->cedula}}</td>
        <td class="px-4 py-2 text-center">{{$registro->nombres}}</td>
        <td class="px-4 py-2 text-center">{{$registro->apellidos}}</td>
        <td class="px-4 py-2 text-center">
          <img src="../imagen/{{$registro->imagen}}" class="w-16 h-16 rounded-full" alt="Imagen">
        </td>
        <td class="px-4 py-2">
          <div class="flex justify-center space-x-2">
            <!-- botón editar -->
        
         
              @csrf
              @method('DELETE')
          <button type="button" class="btn btn-primary" 
        onclick="agregarCandidato(
          '{{ $cargo->iddependenciacargo }}',
            '{{ $registro->id }}',
            '{{ $registro->nombres }}',
            '{{ $registro->apellidos }}',
            '{{ $registro->imagen }}'
        )">
    <span class="fa fa-plus"></span>
</button>


      
        </td>
      </tr>
      @endforeach

      

    </tbody>
  </table>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

    @endforeach

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
                title: '¿Confirma la eliminación de candidato?',        
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


var cont = 0; // Definir cont fuera de la función para que mantenga el valor entre llamadas a la función
var detalles = 0; //

    function agregarCandidato(iddependenciacargo,id, nombres, apellidos, imagen){
   
console.log(iddependenciacargo,id, nombres, apellidos, imagen);

    if (id!="") {

     
        var fila='<div class="filas centrar-imagen" id="fila'+cont+'">'+

        '<img onclick="" src="../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
       
        '<input type="hidden" name="idcandidato[]" value="'+id+'">'+
        '<p>'+nombres+' '+apellidos+'</p>'+
         '<button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button>'+
        '</div><br>';
        cont++;
        detalles++;
        $('#cargo'+iddependenciacargo+'').append(fila);

    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}



function eliminarDetalle(indice){
$("#fila"+indice).remove();

}




</script>

<script >
    
    new DataTable('#Registros');



</script>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop



