
@extends('adminlte::page')
@section('content')
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


                        <div class="grid grid-cols-1">
      <br>
       <br>
            <a type="button"href="{{ route('dependencias.create') }}"class="bg-indigo-500 px-12 py-2 rounded text-gray-200 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out text-center ">Agregar</a>
        </div>

      </div>
      
</form>

   <br>

<div class="col-sm-12">
  <table id="Registros" class="table table-bordered table-striped dataTable dtr-inline">
    <thead>
      <tr class="bg-gray-800 text-white">
        <th class="sorting sorting_asc text-center">NOMBRE</th>
        <th class="sorting sorting_asc text-center ">ACCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($dependencias as $dependencia)
      <tr>
        <td class="px-4 py-2 text-center">{{$dependencia->nombre}}</td>
        <td class="px-4 py-2">
          <div class="flex justify-center space-x-2">
            <!-- botón editar -->
        
            <a href="{{ route('dependencias.edit', $dependencia->id) }}" class="rounded bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4">Editar</a>
            <!-- botón borrar -->
            <form action="{{ route('dependencias.destroy', $dependencia->id) }}" method="POST" class="formEliminar">
              @csrf
              @method('DELETE')
              <button type="submit" class="rounded bg-pink-400 hover:bg-pink-500 text-white font-bold py-2 px-4">Borrar</button>
            </form>
      
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

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
                title: '¿Confirma la eliminación de la dependencia?',        
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




