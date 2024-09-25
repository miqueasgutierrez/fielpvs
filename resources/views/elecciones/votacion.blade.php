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
 <input type="hidden" name="iddependencia" value="{{ $nombredependencia->id }}">

 <input type="hidden" name="idambito" value="{{ $ambito->id }}">

 <input type="hidden" name="idvotante" value="{{ $idvotante }}">
 <input type="hidden" name="cedula" value="{{ $cedula }}">
<table class="table table-bordered table-striped dataTable dtr-inline" style="">



    <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
         @switch($ambito->id)


    @case(1)
        {{$nombredependencia->nombre}}
        @break

    @case(2)
        {{$nombredependencia->descripcion_regional}}
        @break

    @case(3)
        {{$nombredependencia->nombre}}
        @break

    @case(4)
        {{$nombredependencia->descripcion_local}}
        @break

    @default
        <!-- Optionally handle other cases or display nothing -->
        {{ 'No applicable ámbito' }}
@endswitch 
       </h5>

       <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
          
       </h5>

  <h5 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
          {{ __('Opciones a Votar') }}
       </h5>
<tr>

</form>

@php
    $numerocargo = 0;
    $ultimocargo = '';
@endphp
    
   @foreach($dependencia as $cargo)

            @if($cargo->nombrecargo != $ultimocargo) 

            @php
             $numerocargo++;
            @endphp
    
    @if($cargo->nombrecargo !== 'Vocales')

  <td class="px-4 py-2 text-center ">
 <a href="#{{ $cargo->nombrecargo }}" class="">

<div   id="cargo{{$numerocargo}}"  class="inner small-box bg-info fixed-width centrar-imagen">

<br>
<p> {{ $cargo->nombrecargo }}   </p>

          <img  id="imagen{{$numerocargo}}" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">   

<p></p>
<br>

</div>
</a>
</td>

           @else
@for ($i = 0; $i < $cantidadvocales; $i++)
    <td class="px-4 py-2 text-center">
        <a href="#{{ $cargo->nombrecargo }}" class="">
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

 @else

@endif

@php
  $ultimocargo =$cargo->nombrecargo;
 @endphp

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
    $ultimocargo2 = '';
@endphp
    
   @foreach($dependencia as $cargo)

            @if($cargo->nombrecargo != $ultimocargo2) 



            @php
             $contador++;
            @endphp


 <thead class="">
    <tr>
        <thead id="{{ $cargo->nombrecargo }}"  class="bg-secondary text-white">
      <td  class="centrar-texto" colspan="1" scope="col">Candidatos a:</td>
     
      <td class="centrar-texto  " colspan="2" scope="col">

         <h7 class="font-semibold text-xl text-gray-800 leading-tight text-center text-white ">
           {{ $cargo->nombrecargo  }}
       </h7>

    </td>
     <td  class="centrar-texto" colspan="1" scope="col">(marque una opcion)</td>
     
    </tr>
  </thead>

@endif

    
    @if($cargo->nombrecargo !== 'Vocales')


   
      
   <form>


    <!-- Código HTML o Blade a mostrar si $cargo->nombre no es igual a "vocales" -->

<td scope="col" class="centrar-imagen">
   

 <img src="../../../../imagen/{{$cargo->imagen}}" class="w-16 h-16 rounded-full" alt="Imagen">

      <p scope="col" class="centrar-texto" >{{ $cargo->nombres }} {{ $cargo->apellidos }}</p>

       <div class="form-check form-check-inline">

            <input  onclick="agregarcargo{{$contador}}('{{ $cargo->idcandidato }}','{{ $cargo->nombres }}',
                    '{{ $cargo->apellidos }}',
            '{{ $cargo->imagen }}',
            '{{ $cargo->nombrecargo }}')" class="form-check-input" type="radio" name="voteOption" id="option1" value="option1">

            </div>
    </td>

@else

<form>
<td scope="col" class="centrar-imagen">
   

 <img src="../../../../imagen/{{$cargo->imagen}}" class="w-16 h-16 rounded-full" alt="Imagen">

      <p scope="col" class="centrar-texto" >{{ $cargo->nombres }} {{ $cargo->apellidos }}</p>

       <div class="form-check form-check-inline">

            <input  onclick="agregarvocal('{{ $cargo->idcandidato }}','{{ $cargo->nombres }}',
                    '{{ $cargo->apellidos }}',
            '{{ $cargo->imagen }}',
            '{{ $cargo->nombrecargo }}')" class="form-check-input" type="radio" name="voteOption" id="option1" value="option1">

            </div>
    </td>

  </form>
   

  </form>

  @endif


@php
  $ultimocargo2 =$cargo->nombrecargo;
 @endphp


    @endforeach



</tbody>
  </table>
</div>





   

</x-app-layout>

<script>


////////////////////////////cargo1 ////////////////////////////////////////////////////////

var cont = 0; //  

    function agregarcargo1(idcandidato,nombres,apellidos,imagen,cargo){
   

    $("#imagen1").remove();
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
    '<img  id="imagen1" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
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
    '<img  id="imagen2" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargo2').append(fila);

}







////////////////////////////cargo3 ////////////////////////////////////////////////////////

var cont = 0; //  

    function agregarcargo3(idcandidato,nombres,apellidos,imagen,cargo){
   

    $("#imagen3").remove();
     $("#candidatocargo3").remove();

 console.log(idcandidato,nombres,apellidos,imagen,cargo);


    if (idcandidato!="") {
        var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo3">'+
    '<img onclick="" src="../../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'"><input type="hidden" name="nombres[]" value="'+nombres+'"><input type="hidden" name="apellidos[]" value="'+apellidos+'"><input type="hidden" name="cargo[]" value="'+cargo+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarcargo3()">X</button>';
       
        $('#cargo3').append(fila);


        $("#imagen3").remove();


    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}


function eliminarcargo3(){

  $("#candidatocargo3").remove();


  var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo3">'+
    '<img  id="imagen3" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargo3').append(fila);

}




////////////////////////////cargo4 ////////////////////////////////////////////////////////

var cont = 0; //  

    function agregarcargo4(idcandidato,nombres,apellidos,imagen,cargo){
   

    $("#imagen4").remove();
     $("#candidatocargo4").remove();

 console.log(idcandidato,nombres,apellidos,imagen,cargo);


    if (idcandidato!="") {
        var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo4">'+
    '<img onclick="" src="../../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'"><input type="hidden" name="nombres[]" value="'+nombres+'"><input type="hidden" name="apellidos[]" value="'+apellidos+'"><input type="hidden" name="cargo[]" value="'+cargo+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarcargo4()">X</button>';
       
        $('#cargo4').append(fila);


        $("#imagen4").remove();


    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}


function eliminarcargo4(){

  $("#candidatocargo4").remove();


  var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo4">'+
    '<img  id="imagen4" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargo4').append(fila);

}


////////////////////////////cargo5 ////////////////////////////////////////////////////////

var cont = 0; //  

    function agregarcargo5(idcandidato,nombres,apellidos,imagen,cargo){
   

    $("#imagen4").remove();
     $("#candidatocargo5").remove();

 console.log(idcandidato,nombres,apellidos,imagen,cargo);


    if (idcandidato!="") {
        var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo5">'+
    '<img onclick="" src="../../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'"><input type="hidden" name="nombres[]" value="'+nombres+'"><input type="hidden" name="apellidos[]" value="'+apellidos+'"><input type="hidden" name="cargo[]" value="'+cargo+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarcargo5()">X</button>';
       
        $('#cargo5').append(fila);


        $("#imagen5").remove();


    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}


function eliminarcargo5(){

  $("#candidatocargo5").remove();


  var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo5">'+
    '<img  id="imagen5" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargo5').append(fila);

}




////////////////////////////cargo6 ////////////////////////////////////////////////////////

var cont = 0; //  

    function agregarcargo6(idcandidato,nombres,apellidos,imagen,cargo){
   

    $("#imagen6").remove();
     $("#candidatocargo6").remove();

 console.log(idcandidato,nombres,apellidos,imagen,cargo);


    if (idcandidato!="") {
        var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo6">'+
    '<img onclick="" src="../../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'"><input type="hidden" name="nombres[]" value="'+nombres+'"><input type="hidden" name="apellidos[]" value="'+apellidos+'"><input type="hidden" name="cargo[]" value="'+cargo+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarcargo6()">X</button>';
       
        $('#cargo6').append(fila);


        $("#imagen6").remove();


    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}


function eliminarcargo6(){

  $("#candidatocargo6").remove();


  var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo6">'+
    '<img  id="imagen6" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargo6').append(fila);

}





////////////////////////////cargo7 ////////////////////////////////////////////////////////

var cont = 0; //  

    function agregarcargo7(idcandidato,nombres,apellidos,imagen,cargo){
   

    $("#imagen7").remove();
     $("#candidatocargo7").remove();

 console.log(idcandidato,nombres,apellidos,imagen,cargo);


    if (idcandidato!="") {
        var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo7">'+
    '<img onclick="" src="../../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'"><input type="hidden" name="nombres[]" value="'+nombres+'"><input type="hidden" name="apellidos[]" value="'+apellidos+'"><input type="hidden" name="cargo[]" value="'+cargo+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarcargo7()">X</button>';
       
        $('#cargo7').append(fila);


        $("#imagen7").remove();


    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}


function eliminarcargo7(){

  $("#candidatocargo7").remove();


  var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo7">'+
    '<img  id="imagen7" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargo7').append(fila);

}


////////////////////////////cargo8 ////////////////////////////////////////////////////////

var cont = 0; //  

    function agregarcargo8(idcandidato,nombres,apellidos,imagen,cargo){
   

    $("#imagen8").remove();
     $("#candidatocargo8").remove();

 console.log(idcandidato,nombres,apellidos,imagen,cargo);


    if (idcandidato!="") {
        var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo8">'+
    '<img onclick="" src="../../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'"><input type="hidden" name="nombres[]" value="'+nombres+'"><input type="hidden" name="apellidos[]" value="'+apellidos+'"><input type="hidden" name="cargo[]" value="'+cargo+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarcargo8()">X</button>';
       
        $('#cargo8').append(fila);


        $("#imagen8").remove();


    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}


function eliminarcargo8(){

  $("#candidatocargo8").remove();


  var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo8">'+
    '<img  id="imagen8" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargo8').append(fila);

}






////////////////////////////cargo9 ////////////////////////////////////////////////////////

var cont = 0; //  

    function agregarcargo9(idcandidato,nombres,apellidos,imagen,cargo){
   

    $("#imagen9").remove();
     $("#candidatocargo9").remove();

 console.log(idcandidato,nombres,apellidos,imagen,cargo);


    if (idcandidato!="") {
        var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo9">'+
    '<img onclick="" src="../../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'"><input type="hidden" name="nombres[]" value="'+nombres+'"><input type="hidden" name="apellidos[]" value="'+apellidos+'"><input type="hidden" name="cargo[]" value="'+cargo+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarcargo9()">X</button>';
       
        $('#cargo9').append(fila);


        $("#imagen9").remove();


    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}


function eliminarcargo9(){

  $("#candidatocargo9").remove();


  var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo9">'+
    '<img  id="imagen9" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargo9').append(fila);

}




////////////////////////////cargo10 ////////////////////////////////////////////////////////

var cont = 0; //  

    function agregarcargo10(idcandidato,nombres,apellidos,imagen,cargo){
   

    $("#imagen11").remove();
     $("#candidatocargo10").remove();

 console.log(idcandidato,nombres,apellidos,imagen,cargo);


    if (idcandidato!="") {
        var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo10">'+
    '<img onclick="" src="../../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'"><input type="hidden" name="nombres[]" value="'+nombres+'"><input type="hidden" name="apellidos[]" value="'+apellidos+'"><input type="hidden" name="cargo[]" value="'+cargo+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarcargo10()">X</button>';
       
        $('#cargo10').append(fila);


        $("#imagen10").remove();


    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}


function eliminarcargo10(){

  $("#candidatocargo10").remove();


  var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo10">'+
    '<img  id="imagen6" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargo10').append(fila);

}






////////////////////////////cargo11 ////////////////////////////////////////////////////////

var cont = 0; //  

    function agregarcargo11(idcandidato,nombres,apellidos,imagen,cargo){
   

    $("#imagen11").remove();
     $("#candidatocargo11").remove();

 console.log(idcandidato,nombres,apellidos,imagen,cargo);


    if (idcandidato!="") {
        var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo11">'+
    '<img onclick="" src="../../../../imagen/' + imagen + '" class="w-16 h-16 rounded-full" alt="Imagen">' +
    '<p>'+nombres+'</p></td><input type="hidden" name="idcandidato[]" value="'+idcandidato+'"><input type="hidden" name="nombres[]" value="'+nombres+'"><input type="hidden" name="apellidos[]" value="'+apellidos+'"><input type="hidden" name="cargo[]" value="'+cargo+'">'+'<button type="button" class="btn btn-danger" onclick="eliminarcargo11()">X</button>';
       
        $('#cargo11').append(fila);


        $("#imagen11").remove();


    }else{
        alert("error al ingresar el detalle, revisar las datos del articulo ");
    }
}


function eliminarcargo11(){

  $("#candidatocargo11").remove();


  var fila='<div class="filas centrar-imagen centrar-texto" id="candidatocargo11">'+
    '<img  id="imagen6" src="/fielpvs/public/imagen/perfil.svg" class="w-16 h-16 rounded-full  " alt="Imagen">';
       
        $('#cargo11').append(fila);

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


                       $('#myForm').attr('action', "{{ route('comprobante') }}").attr('target', '_blank').submit();

            
                        
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




