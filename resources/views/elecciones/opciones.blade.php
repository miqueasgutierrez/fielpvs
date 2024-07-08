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


 <div class="container text-center">
  <div class="row">
    <div class="col">
     
    </div>
    <div class="col">

          <i class="fa fa-chart-bar fa-5x" aria-hidden="true"></i>
         
          <form action="{{ route('elecciones.vistaresultados') }}" method="POST" id="hidden-fields-form">
            @csrf
    
            <input type="hidden" name="iddependencia" id="hiddenField1" value="{{ $iddependencia }}">
            <input type="hidden" name="idambito" id="hiddenField2" value="{{ $idambito }}">

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ver resultados</button>
        </form>
 
     
    </div>

    <div class="col">
          <i class="fa fa-download fa-5x" aria-hidden="true"></i>
          <p class="centrar-texto">Descargar resultados</p>
    </div>
    <div class="col">
   
    </div>
  </div>
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




