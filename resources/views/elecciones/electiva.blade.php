
@extends('adminlte::page')
@section('content')
    <x-app-layout>
    
<table class="table table-bordered border-primary">
      <thead>
        <tr>
      <td colspan="3"><h1>Dependencia: {{ $dependencia->nombre }}</h1></td>
      
    </tr>


     @foreach($dependencia->cargos as $cargo)
        
      <tr>
      <td colspan="3"><h2>Cargo: {{ $cargo->nombre }}</h2></td>
      
    </tr>


    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
     
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      
    </tr>
  </tbody>

  </table>



    
    @foreach($dependencia->cargos as $cargo)
        <h2>Cargo: {{ $cargo->nombre }}</h2>
        
        @if($cargo->candidatos->isEmpty())
            <p>No hay candidatos para este cargo.</p>
        @else
            <ul>
                @foreach($cargo->candidatos as $candidato)
                    <li>Candidato ID: {{ $candidato->id }}</li>
                @endforeach
            </ul>
        @endif
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




