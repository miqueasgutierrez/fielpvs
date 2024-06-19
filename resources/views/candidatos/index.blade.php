
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
            <a type="button"href="{{ route('candidatos.create') }}"class="btn btn-primary"><span class="fa fa-plus"></span>  Agregar candidatos</a>
        </div>

      </div>
      
</form>

   <br>

<div class="col-sm-12">
  <table id="candidatos" class="table table-bordered table-striped dataTable dtr-inline">
    <thead>
      <tr class="bg-gray-800 text-white">
        <th class="sorting sorting_asc text-center">DEPENDECIA</th>
        <th class="sorting sorting_asc text-center">CARGO</th>
         <th class="sorting sorting_asc text-center">CEDULA</th>
        <th class="sorting sorting_asc text-center ">NOMBRES</th>
        <th class="sorting sorting_asc text-center ">PERFIL</th>
        <th class="sorting sorting_asc text-center ">ACCION</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($candidatos as $candidato)
      <tr>

        

        <td class="px-4 py-2 text-center">{{$candidato->dependenciacargo->dependencia->nombre }}</td>

        <td class="px-4 py-2 text-center">{{$candidato->dependenciacargo->cargo->nombre }}</td>

       <td class="px-4 py-2 text-center">{{$candidato->registro->cedula }}</td>
          <td class="px-4 py-2 text-center">{{$candidato->registro->nombres }}</td>
            <td class="px-4 py-2 text-center">
          <img src="imagen/{{$candidato->registro->imagen}}" class="w-16 h-16 rounded-full" alt="Imagen">
        </td>
        <td class="px-4 py-2">
          <div class="flex justify-center space-x-2">
            <!-- botón editar -->
        
        
            <!-- botón borrar -->
            <form action="{{ route('candidatos.destroy', $candidato->id ) }}" method="POST" class="formEliminar">
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
                title: '¿Confirma la eliminación de candidato?',        
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
    
    new DataTable('#candidatos');



</script>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop




