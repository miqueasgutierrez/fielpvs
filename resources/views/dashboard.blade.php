@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  
@stop

@section('content')
     <div class="container">
<marquee><h2>BIENVENIDOS AL SISTEMA DE REGISTRO MIEMBROS | CONEF 2024</h2></marquee>
<hr height="2" color="beige" />
  <div class="row">
    <div class="col-md-4">
      <div class="card">
       <center> <img class="card-img-top" src="imagen/fielpvs.png" alt="Votación CONEF 2024" object-fit="cover"></center>
        <div class="card-body">
        <center>  <h5 class="card-title"><b>MANTENIENDO LA SANA DOCTRINA</b></h5></center>
          <p class="card-text"><i><b><center>La Federación FIELPVS</i></b> | Es una organización cristiana evangélica que busca mantener la fe y la sana doctrina en Venezuela y en el Mundo. </center> </p>
     
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
             <center>   <img class="card-img-top1" src="imagen/conef1.png" alt="Proceso de votación CONEF 2024" object-fit="cover"></center>
        <div class="card-body">
        <CENTER>  <h5 class="card-title"><B>COMISIÓN NACIONAL ELECTORAL FIELPVS </B><h5>
          <p class="card-text"> Abre el proceso de <I><B>INSCRIPCIÓN DE VOTANTES</I></B>, para las elecciones 2024.<BR>Del<B> 15 de ENERO AL 17 DE MARZO </B>
</p></CENTER>
  
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <center><img class="card-img-top2" src="imagen/sefiel.png" alt="Preguntas frecuentes sobre el sistema de votación CONEF 2024" object-fit="cover"></center>
        <div class="card-body">
          <h5 class="card-title"><center><b>MISIÓN</b></center></h5>
          <p class="card-text"><center>Garantizar la <b>Transparencia</b>, <b>Confiabilidad</b> y <b>Seguridad</b> de los procesos electorales de la Federación FIELPVS, desde la inscripcion de los Votantes hasta el escrutinio de los votos.</center>

     
          </p>

        </div>
      </div>
    </div>
  </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop