
@extends('adminlte::page')
@section('content')



<style>

 .fixed-width {
        width: 150px; /* Ajusta este valor según tus necesidades */
    }


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

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">


                       

      </div>
      
</form>

   <br>

<div class="col-sm-12">

  <h3 class="font-semibold text-xl text-gray-800 leading-tight text-center ">
          {{ __('Registro de elecciones') }}
       </h3>

      <div class="card-body table-responsive p-0" style="height: 600px;">  
  <table id="" class="table table-bordered table-striped dataTable dtr-inline">
    <thead>
      <tr class="bg-gray-800 text-white">
        <th class="sorting sorting_asc text-center fixed-width">DEPENDENCIA</th>
        <th class="sorting sorting_asc text-center fixed-width">AMBITO</th>
        <th class="sorting sorting_asc text-center fixed-width">TIPO</th>
        <th class="sorting sorting_asc text-center ">CARGOS</th>
        <th class="sorting sorting_asc text-center ">POSTULADOS</th>
         <th class="sorting sorting_asc text-center ">VOTAR</th>
         <th class="sorting sorting_asc text-center ">RESULTADOS</th>
         <th class="sorting sorting_asc text-center ">ACCIONES</th>
      </tr>
    </thead>



    <tbody>

        @php

 
  @endphp

     @foreach ($elecciones as $eleccion)

   
     @php

         $nombreambito = $eleccion->ambito;
         $idambito = $eleccion->idambito;
       
    @endphp

    





           
         
      <tr>





         <td class="px-4 py-2 text-center ">


<div class="inner small-box bg-info fixed-width">

<br>
<br>
<br>
<br>
<br>



<p>{{  $eleccion->dependencia }}</p>
<p></p>
<br>
<br>
<br>
<br>
<br>

</div>
           </td>
           <td class="px-4 py-2 text-center ">


<div class="inner small-box bg-info fixed-width">

<br>
<br>
<br>
<br>
<br>
<p></p>
<p>{{ $nombreambito }}</p>

<br>
<br>
<br>
<br>
<br>

</div>

           </td>
        <td class="px-4 py-2 text-center fixed-width">
  <a href="{{ route('elecciones.electiva', ['iddependencia' => $eleccion->iddependencia, 'idambito' => $idambito]) }}" class="list-group-item">
    <!-- Your link text here -->

        <div  class="inner small-box bg-success">
<br>
<br>
<br>
<br>
<br>


<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ELECTIVAS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
 <br>       
        <br>
<br>
<br>
<br>

    </div>
    <a/>
</td>
          <td class="px-4 py-2 text-center ">

              <a href="{{ route('elecciones.cargos', ['iddependencia' => $eleccion->iddependencia, 'idambito' => $idambito]) }}" class="list-group-item">
        <div  class="inner small-box  ">
        <br>
<br>
<br>

        
     
        <i class="fa fa-address-card fa-5x" aria-hidden="true"></i>
    </a>

    <br>
<br>
<br>


       </div>
        </td>
          </div>
        <td class="px-4 py-2 text-center ">

              <a href="{{ route('elecciones.candidatos', ['iddependencia' => $eleccion->iddependencia , 'idambito' => $idambito]) }}" class="list-group-item">
        <div  class="inner small-box bg-warning ">
        <br>
<br>
<br>

        
     
        <i class="fa fa-users fa-5x" aria-hidden="true"></i>
    </a>

    <br>
<br>
<br>


       </div>
        </td>

        <td class="px-4 py-2 text-center ">

              <a href="{{ route('elecciones.elector', ['iddependencia' => $eleccion->iddependencia, 'idambito' => $idambito]) }}" class="list-group-item">
        <div  class="inner small-box  ">
        <br>
<br>
<br>

        
     
        <i class="fa fa-hands-helping fa-5x" aria-hidden="true"></i>
    

    <br>
<br>
<br>


       </div>

       </a>
        </td>

        <td class="px-4 py-2 text-center ">

              <a href="{{ route('elecciones.opciones', ['iddependencia' => $eleccion->iddependencia, 'idambito' => $idambito]) }}" class="list-group-item">
        <div  class="inner small-box bg-warning ">
        <br>
<br>

<br>
        <i class="fas fa-chart-bar fa-5x" aria-hidden="true"></i>
    </a>

    <br>
<br>
<br>
 </div>
        </td>






           <td class="px-4 py-2 text-center ">

                            <br>
<br>
<br>

            @if ($eleccion->estado == 1)
<button id="lock-toggle-button" data-id="{{ $eleccion->idestadodependencia }}" data-status="{{ $eleccion->estado }}" class="lock-toggle-button bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
    <i class="fas fa-lock-open fa-5x"></i> Activo
</button>


@else

<button id="lock-toggle-button" data-id="{{ $eleccion->idestadodependencia }}" data-status="{{ $eleccion->estado }}" class="lock-toggle-button bg-red-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
    <i class="fas fa-lock fa-5x"></i> Cerrado
</button>





       </div>
        </td>

          @endif
    
     

            @php
                $ultimadependencia = $eleccion->dependencia;
            @endphp
      
@endforeach
    </tbody>
  </table>


</div>
</div>
</x-app-layout>

<script>


function updateButtonContent(button) {
    var status = button.data('status');

    if (status === 1) {

         button.html('<i class="fas fa-lock"></i> Cerrado');
        button.removeClass('bg-green-500').addClass('bg-red-500');

       
    } else if (status === 0) {
         button.html('<i class="fas fa-lock-open"></i> Activo');
        button.removeClass('bg-red-500').addClass('bg-green-500');
       
    }
}


$(document).ready(function() {
    $('.lock-toggle-button').click(function() {
        var button = $(this);
        var id = button.data('id');
        var currentStatus = button.data('status');
        var newStatus = currentStatus === 1 ? 0 : 1;

        console.log(id,newStatus);

        $.ajax({
            url: '/fielpvs/public/estado_dependencias/' + id + '/' + newStatus,
            method: 'GET',
            success: function(response) {
                button.data('status', newStatus);
                if (newStatus === 1) {
                    button.removeClass('bg-red-500').addClass('bg-green-500');
                    button.html('<i class="fas fa-lock-open fa-5x"></i> Activo');
                } else {
                    button.removeClass('bg-green-500').addClass('bg-red-500');
                    button.html('<i class="fas fa-lock fa-5x"></i> Cerrado');
                }
            }
        });
    });
});



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




