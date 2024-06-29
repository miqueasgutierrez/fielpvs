@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>

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

				<form method="POST" action="{{ route('candidatos.store') }}">
    @csrf

    <div class="form-group">
        <label for="dependencia">Dependencia:</label>
        <select name="id_dependencia" id="dependencia" class="form-control">
             <option value="">Seleccione una Dependencia</option>
            @foreach($dependencias as $dependencias)
                <option value="{{ $dependencias->id }}">{{ $dependencias->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="cargo">Cargo:</label>
        <select name="id_cargo" id="cargo" class="form-control">

             <option value="">Seleccione un cargo</option>
        </select>
    </div>


    <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
     <a data-toggle="modal" href="#myModal">
       <button id="btnAgregarArt" type="button" class="btn btn-primary"><span class="fa fa-plus"></span>Agregar Candidatos</button>
     </a>
    </div>


    <div class="form-group col-lg-12 col-md-12 col-xs-12">
     <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
       <thead style="background-color:#A9D0F5">
        <th>Opciones</th>
        <th>Cedula</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Perfil</th>
    
       </thead>
       <tfoot>
         <th></th>
         <th></th>
          <th></th>
         <th></th>
          <th></th>
       </tfoot>
       <tbody>
         
       </tbody>
     </table>
    </div>


    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

			</div>
		</div>
	</div>


</x-app-layout>


      <!--Modal-->
  <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
        onclick="agregarDetalle(
            '{{ $registro->id }}',
            '{{ $registro->cedula }}',
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


<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

    $('#dependencia').change(function() {
            var dependenciaId = $(this).val();
            if (dependenciaId) {
                $.ajax({
                    url: '/fielpvs/public/api-cargos/' + dependenciaId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#cargo').empty();
                        $('#cargo').append('<option value="">Seleccione un cargo</option>');
                        $.each(data, function(key, value,value2) {
                            $('#cargo').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al obtener cargos:', error);
                    }
                });
            } else {
                $('#cargo').empty();
                $('#cargo').append('<option value="">Seleccione un cargo</option>');
            }
        });


    new DataTable('#Registros'); 


var cont = 0; // Definir cont fuera de la función para que mantenga el valor entre llamadas a la función
var detalles = 0; //

    function agregarDetalle(id, cedula, nombres, apellidos, imagen){
   
    console.log(id, cedula, nombres, apellidos, imagen);


    if (id!="") {

     
        var fila='<tr class="filas" id="fila'+cont+'">'+
        '<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
        '<td><input type="hidden" name="idcandidato[]" value="'+id+'">'+cedula+'</td>'+
        '<td>'+nombres+'</td>">'+
        '<td>'+apellidos+'</td>">'+
        '<td class="px-4 py-2 text-center">' +
    '<img src="../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '</td>'+
        '</tr>';
        cont++;
        detalles++;
        $('#detalles').append(fila);

    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}



function eliminarDetalle(indice){
$("#fila"+indice).remove();
calcularTotales();
detalles=detalles-1;

}
	
</script>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop








