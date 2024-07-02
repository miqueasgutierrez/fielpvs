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
.form-check-input {
            width: 1.5em;
            height: 1.5em;
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

<table id="detalles" class="table table-bordered table-striped dataTable dtr-inline" style="">
  <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
          {{ __('Opciones a Votar') }}
       </h5>
<tr>
    
   @foreach($dependencia->cargos as $cargo)

  <td class="px-4 py-2 text-center ">
 <a href="#{{ $cargo->nombre }}" class="">

<div class="inner small-box bg-info fixed-width">

   

<br>
<br>
<br>
<br>
<br>
<p> {{ $cargo->nombre }}   </p>
<p></p>
<br>
<br>
<br>
<br>
<br>

</div>
</a>

           </td>


        @endforeach

        <td class="px-4 py-2 text-center ">
 <a href="" class="">

<div class="inner small-box bg-success fixed-width">

    <i class="fa fa-thumbs-up fa-5x" aria-hidden="true"></i> 


<br>
<br>
<br>
<p> Votar   </p>
<p></p>
<br>
<br>
<br>


</div>
</a>

           </td>
           
</tr>
</table>

<br>
<br>
<br>


    <div class="card-body table-responsive p-0" style="height: 600px;">    
<table class="table table-head-fixed text-nowrap table-bordered table-hover">

 @foreach($dependencia->cargos as $cargo)
    </thead >
      

    <thead class="">
    <tr>
        <thead id="{{ $cargo->nombre }}"  class="bg-secondary text-white">
      <td  class="centrar-texto" colspan="1" scope="col">Candidatos a:</td>
     
      <td class="centrar-texto  " colspan="2" scope="col">{{ $cargo->nombre  }} {{ $ambito->nombre  }} {{ $dependencia->nombre  }}</td>
     <td  class="centrar-texto" colspan="1" scope="col">(marque una opcion)</td>
     
    </tr>
  </thead>

    @if($cargo->candidatos->isEmpty())
         <tr>
      <td colspan="4"><p>No hay candidatos para este cargo.</p></td>
      
    </tr>  
        @else
         <tr>
      <th scope="col" class="centrar-texto"><p>Perfil</p></th>
      <th scope="col" class="centrar-texto"><p>Nombres </p></th>
      <th scope="col" class="centrar-texto" ><p>Apellidos</p></th>
      <th scope="col" class="centrar-texto"><p></p></th>
    </tr>

     

       <tbody>
 <form>
@foreach($cargo->candidatos as $candidato)
   
<tr>
      <th scope="col" class="centrar-imagen">  

 <img src="../../../imagen/{{$candidato->registro->imagen}}" class="w-16 h-16 rounded-full" alt="Imagen">

       </th>
      <th scope="col" class="centrar-texto" >{{ $candidato->registro->nombres }}</th>
        <th scope="col" class="centrar-texto">{{ $candidato->registro->apellidos }}</th>
      <th scope="col" class="text-center">  


            <div class="form-check form-check-inline">
                <input  onclick="agregarDetalle('{{ $candidato->id }}','{{ $candidato->registro->nombres }}',
            '{{ $candidato->registro->imagen }}')" class="form-check-input" type="radio" name="voteOption" id="option1" value="option1">
               
            </div>

       </th>
    </tr>
 @endforeach
</form>

  @endif
    @endforeach

</tbody>
  </table>
</div>


</x-app-layout>

<script>


var cont = 0; // Definir cont fuera de la función para que mantenga el valor entre llamadas a 

    function agregarDetalle(idcandidato,nombres,imagen){
   
 console.log(idcandidato,imagen);


    if (idcandidato!="") {

     
        var fila='<td class="filas centrar-imagen centrar-texto" id="fila'+cont+'">'+
    '<img onclick="eliminarDetalle('+cont+')" src="../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button>';
        cont++;
        detalles++;
        $('#detalles').append(fila);

    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}


function eliminarDetalle(indice){
$("#fila"+indice).remove();


}



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




