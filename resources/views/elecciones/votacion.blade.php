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

<meta name="csrf-token" content="{{ csrf_token() }}">
</style>

    <x-app-layout>

    <div class="container text-center">
  <div class="row">
    <div class="col">
     
    </div>
    <div class="col">
     
    </div>
    <div class="col">
    <button onclick="window.location.href='{{ route('elecciones.vista1') }}'" class="btn btn-primary">
        <i class="fa fa-reply"></i> Volver
    </button>
    </div>
  </div>
</div>
<form id="myForm" action="{{ route('elecciones.votacionfinal') }}" method="POST" enctype="multipart/form-data">
    @csrf
 <input type="hidden" name="iddependencia" value="{{ $dependencia->id }}">
 <input type="hidden" name="idvotante" value="{{ $idvotante }}">
 <input type="hidden" name="cedula" value="{{ $cedula }}">
<table class="table table-bordered table-striped dataTable dtr-inline" style="">
  <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
          {{ __('Opciones a Votar') }}
       </h5>
<tr>

</form>


@php
    $numerocargo = 0;
@endphp
    
   @foreach($dependencia->cargos as $cargo)


   @php
        $numerocargo++;
    @endphp

    @if($cargo->nombre !== 'Vocales')

  <td class="px-4 py-2 text-center ">
 <a href="#{{ $cargo->nombre }}" class="">

<div   id="cargo{{$numerocargo}}"  class="inner small-box bg-info fixed-width centrar-imagen">



<br>
<p> {{ $cargo->nombre }}   </p>

          <img  id="imagen{{$numerocargo}}" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">
       

<p></p>
<br>


</div>
</a>

           </td>

           @else
@for ($i = 0; $i < $cantidadvocales; $i++)
    <td class="px-4 py-2 text-center">
        <a href="#{{ $cargo->nombre }}" class="">
            <div id="cargovocal{{ $i + 1 }}" class="inner small-box bg-info fixed-width centrar-imagen">
                <br>
                <p>Vocal {{ $i + 1 }}</p>
                <img id="imagenvocal{{ $i + 1 }}" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full" alt="Imagen">
                <p></p>
                <br>
            </div>
        </a>
    </td>
@endfor
    
@endif

        @endforeach

        <td class="px-4 py-2 text-center ">
 <a type="submit" id="submitButton" class="">

<div class="inner small-box bg-success fixed-width">

    <i  class="fa fa-thumbs-up fa-5x" aria-hidden="true"></i> 


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

@php
    $contador = 0;
@endphp

 @foreach($dependencia->cargos as $cargo)

   @php


        $contador++;
    @endphp


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
         
       <tbody>
      
   <form>

@foreach($cargo->candidatos as $candidato)



@if($cargo->nombre !== 'Vocales')

    <!-- Código HTML o Blade a mostrar si $cargo->nombre no es igual a "vocales" -->

<td scope="col" class="centrar-imagen">
   

 <img src="../../../../imagen/{{$candidato->registro->imagen}}" class="w-16 h-16 rounded-full" alt="Imagen">

      <p scope="col" class="centrar-texto" >{{ $candidato->registro->nombres }} {{ $candidato->registro->apellidos }}</p>

       <div class="form-check form-check-inline">

            <input  onclick="agregarcargo{{$contador}}('{{ $candidato->id }}','{{ $candidato->registro->nombres }}',
                    '{{ $candidato->registro->apellidos }}',
            '{{ $candidato->registro->imagen }}',
            '{{ $cargo->nombre }}')" class="form-check-input" type="radio" name="voteOption" id="option1" value="option1">

            </div>
    </td>

@else

<form>
<td scope="col" class="centrar-imagen">
   

 <img src="../../../../imagen/{{$candidato->registro->imagen}}" class="w-16 h-16 rounded-full" alt="Imagen">

      <p scope="col" class="centrar-texto" >{{ $candidato->registro->nombres }} {{ $candidato->registro->apellidos }}</p>

       <div class="form-check form-check-inline">

            <input  onclick="agregarvocal('{{ $candidato->id }}','{{ $candidato->registro->nombres }}',
                    '{{ $candidato->registro->apellidos }}',
            '{{ $candidato->registro->imagen }}',
            '{{ $cargo->nombre }}')" class="form-check-input" type="radio" name="voteOption" id="option1" value="option1">

            </div>
    </td>

  </form>
    @endif





 @endforeach

  </form>

  @endif

    @endforeach



</tbody>
  </table>
</div>


</x-app-layout>

<script>


////////////////////////////cargo1 ////////////////////////////////////////////////////////

var cont = 0; //  

    function agregarcargo1(idcandidato,nombres,apellidos,imagen,cargo){
   

    $("#imagen").remove();
     $("#candidatocargo1").remove();

 console.log(idcandidato,nombres,apellidos,imagen,cargo);


    if (idcandidato!="") {
        var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo1">'+
    '<img onclick="" src="../../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'"><input type="hidden" name="nombres[]" value="'+nombres+'"><input type="hidden" name="apellidos[]" value="'+apellidos+'"><input type="hidden" name="cargo[]" value="'+cargo+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarcargo1()">X</button>';
       
        $('#cargo1').append(fila);


        $("#imagen1").remove();


    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}


function eliminarcargo1(){

  $("#candidatocargo1").remove();


  var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo1">'+
    '<img  id="imagen" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargo1').append(fila);

}

///////////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////cargo2 ////////////////////////////////////////////////////////

var cont = 0; //  

    function agregarcargo2(idcandidato,nombres,apellidos,imagen,cargo){
   

    $("#imagen2").remove();
     $("#candidatocargo2").remove();

 console.log(idcandidato,nombres,apellidos,imagen,cargo);


    if (idcandidato!="") {
        var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo2">'+
    '<img onclick="" src="../../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'"><input type="hidden" name="nombres[]" value="'+nombres+'"><input type="hidden" name="apellidos[]" value="'+apellidos+'"><input type="hidden" name="cargo[]" value="'+cargo+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarcargo2()">X</button>';
       
        $('#cargo2').append(fila);


        $("#imagen2").remove();


    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}


function eliminarcargo2(){



  $("#candidatocargo2").remove();


  var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo2">'+
    '<img  id="imagen" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargo2').append(fila);

}

///////////////////////////////////////////////////////////////////////////////////////////////////////


 cont = 0;


function agregarvocal(idcandidato,nombres,apellidos,imagen,cargo){
   

$("#imagen").remove();

 console.log(idcandidato,nombres,apellidos,imagen,cargo);



    if (idcandidato!="") {

             cont++;

        var fila='<div class="filas centrar-imagen centrar-texto" id="candidatovocal'+cont+'">'+
    '<img onclick="" src="../../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'"><input type="hidden" name="nombres[]" value="'+nombres+'"><input type="hidden" name="apellidos[]" value="'+apellidos+'"><input type="hidden" name="cargo[]" value="'+cargo+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarvocal'+cont+'()">X</button>';

    
       
      $('#cargovocal' + cont).append(fila);

        // Remover elemento si es necesario
        $("#imagenvocal" + cont).remove();


    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}



function eliminarvocal1() {
    
    $("#candidatovocal1").remove();

$("#imagen").remove();


     var fila='<div class="filas centrar-imagen centrar-texto" id="candidatovocal1">'+
    '<img  id="imagen" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargovocal1').append(fila);

        cont = 0;



}


function eliminarvocal2() {
    
    $("#candidatovocal2").remove();

$("#imagen").remove();


     var fila='<div class="filas centrar-imagen centrar-texto" id="candidatovocal2">'+
    '<img  id="imagen" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargovocal2').append(fila);

        cont = 1;

  
}



function eliminarvocal3() {
    
    $("#candidatovocal3").remove();

$("#imagen").remove();


     var fila='<div class="filas centrar-imagen centrar-texto" id="candidatovocal3">'+
    '<img  id="imagen" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargovocal3').append(fila);

        cont = 2;

  
}





   $(document).ready(function() {
            $('#submitButton').click(function() {
                // Recoger los valores del formulario
                var cargo = $('input[name="cargo[]"]').map(function() {
                    return $(this).val();
                }).get();
                
                var nombres = $('input[name="nombres[]"]').map(function() {
                    return $(this).val();
                }).get();
                
                var apellidos = $('input[name="apellidos[]"]').map(function() {
                    return $(this).val();
                }).get();

                // Construir el mensaje HTML
                var message = '<ul>';
                for (var i = 0; i < nombres.length; i++) {
                    message += `<li><strong>Cargo:</strong> ${cargo[i]}<br>
                                <strong>Nombres:</strong> ${nombres[i]}<br>
                                <strong>Apellidos:</strong> ${apellidos[i]}</li><br>`;
                }
                message += '</ul>';

                // Mostrar SweetAlert2
                Swal.fire({
                    title: '¿Estás seguro?',
                    html: message,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Aquí puedes realizar la acción de guardar
                        $('#myForm').submit();
                    }
                });
            });
        });


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




