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


 .brand-image {
            opacity: .8;
            font-size: 100px; /* Ajusta el tamaño según necesites */
        }
        .img-circle {
            border-radius: 50%;
        }
        .elevation-3 {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
<div class="table-responsive">
        <table class="table table-head-fixed text-nowrap table-bordered table-hover shadow-lg rounded-lg">
            <thead>
                <tr>
                    <td colspan="5" scope="col" class="text-center bg-primary text-white">
                        <h5>Proceso Electoral</h5>
                    </td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td colspan="4" class="text-center bg-secondary text-white">
                        <h5>Elecciones: Dependencia {{ $dependencia->nombre }}</h5>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-center bg-secondary text-white">
                        <h5>Ámbito: {{ $ambito->nombre }}</h5>
                    </td>
                </tr>
            </thead>
            <tbody>
             


                <tr>
                    <td class=" text-white text-center" colspan="3">

                    </td>
                </tr>
              
            </tbody>
        </table>

         <form action="{{ route('elecciones.datos') }}" method="POST">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
         <div class="grid grid-cols-1">
           
</div>
        <div class="grid grid-cols-1 text-center">
           <div>
        <!-- Icono de Font Awesome con las clases y estilos especificados -->
        <i class="fas fa-user brand-image img-circle elevation-3"></i>
    </div>
        <h5> Cédula del elector
        </h5>
            
            <input type="number" class="form-control @error('cedula') is-invalid @enderror" id="cedula" name="cedula" minlength="5" placeholder="Cédula" required>

             <button type="submit" class="btn btn-primary mt-6">Buscar</button>
            @error('cedula')
                <span class="invalid-feedback text-red-500 text-sm" role="alert">
                    <strong>El campo de Cédula no puede estar vacío ni duplicado</strong>
                </span>
            @enderror
        </div>
        <div class="grid grid-cols-1">
           
        </div>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-danger text-center mt-5">
            {{ Session::get('success') }}
        </div>
    @endif
</form>
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




