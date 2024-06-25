
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

      <div class="card-body table-responsive p-0" style="height: 600px;">  
  <table id="" class="table table-bordered table-striped dataTable dtr-inline">
    <thead>
      <tr class="bg-gray-800 text-white">
        <th class="sorting sorting_asc text-center fixed-width">DEPENDENCIA</th>
        <th class="sorting sorting_asc text-center fixed-width">TIPO</th>
        <th class="sorting sorting_asc text-center ">CARGOS</th>
        <th class="sorting sorting_asc text-center ">POSTULADOS</th>
         <th class="sorting sorting_asc text-center ">FECHAS</th>
         <th class="sorting sorting_asc text-center ">ACCIONES</th>
      </tr>
    </thead>
    <tbody>


      @foreach ($dependencias as $dependencia)
      <tr>




         <td class="px-4 py-2 text-center ">


<div class="inner small-box bg-info fixed-width">

<br>
<br>
<br>
<br>
<br>
<p>{{$dependencia->nombre}}</p>

<p></p>
<br>
<br>
<br>
<br>
<br>

</div>

           </td>
        <td class="px-4 py-2 text-center fixed-width">
<a href="{{ route('elecciones.show', $dependencia->id) }}">
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
          <td class="px-4 py-2 text-center"> 
  <div  class="inner small-box bg-danger">


  @foreach($dependencia->cargos as $cargo)
                                <label>{{ $cargo->nombre }}<label>

                                    
                            @endforeach


          </td>
          </div>
        <td class="px-4 py-2 text-center ">
        <div  class="inner small-box bg-warning ">
        <br>
<br>
<br>

        
      <a href="{{ route('elecciones.candidatos', $dependencia->id) }}" class="list-group-item">
        <i class="fa fa-users fa-5x" aria-hidden="true"></i>
    </a>

    <br>
<br>
<br>


       </div>
        </td>

        <td class="px-4 py-2 text-center ">
        <div  class="inner small-box bg-warning ">
        <br>
<br>
<br>

        
      <a href="{{ route('elecciones.candidatos', $dependencia->id) }}" class="list-group-item">
        <i class="fa fa-vote-yea fa-5x" aria-hidden="true"></i>
    </a>

    <br>
<br>
<br>


       </div>
        </td>

        <td class="px-4 py-2 text-center ">
        <div  class="inner small-box bg-warning ">
        <br>
<br>
<br>

        
      <a href="{{ route('elecciones.candidatos', $dependencia->id) }}" class="list-group-item">
        <i class="fa fa-lock fa-5x" aria-hidden="true"></i>
    </a>

    <br>
<br>
<br>


       </div>
        </td>
    
      @endforeach
    </tbody>
  </table>
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




