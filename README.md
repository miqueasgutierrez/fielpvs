     Route::get('/', function () {
        return redirect()->route('elecciones.vista1');
    })->name('dashboard');



<script src="{{ asset('js/app.js') }}"></script>

         <script src="{{ asset('js/app2.js') }}"></script>
  
           <script src="{{ asset('js/weetalert.js') }}"></script>


   <script src="{{ asset('js/dataTables.js') }}"></script>







$iddependencia = $request->input('iddependencia');
    $idambito = $request->input('idambito');



$sqldependencia = "
    SELECT id, nombre, descripcion_local, descripcion_regional FROM dependencias WHERE id=? 
";

$nombredependencia = DB::selectOne($sqldependencia, [$iddependencia]);

$nombreambito = Ambitodependencias::where('id', $idambito)->value('nombre');

switch ($idambito) {
    case 1:
        $nombredeeleccion = 'ELECCIONES NACIONALES';
        break;

    case 2:
         $nombredeeleccion = 'ELECCIONES REGIONALES';
        break;

    case 3:
        $nombredeeleccion = 'ELECCIONES DE ZONA';
        break;

    case 4:
        $nombredeeleccion = 'ELECCIONES LOCALES';
        break;

    default:
        // Asignar un valor por defecto si el ámbito no coincide con ninguno de los casos
        $nombredepartamento = 'No applicable ámbito';
        break;
}


switch ($idambito) {
    case 1:
        $nombredepartamento = $nombredependencia->nombre;
        break;

    case 2:
        $nombredepartamento = $nombredependencia->descripcion_regional;
        break;

    case 3:
        $nombredepartamento = $nombredependencia->nombre;
        break;

    case 4:
        $nombredepartamento = $nombredependencia->descripcion_local;
        break;

    default:
        // Asignar un valor por defecto si el ámbito no coincide con ninguno de los casos
        $nombredepartamento = 'No applicable ámbito';
        break;
}
















# fielpvs
 Sistema de Elecciones
codigo para convertit registros en usuarios 

php artisan db:seed --class=ConvertirRegistrosEnUsuariosSeeder


codigo para dar permisoa a vista votantes


php artisan db:seed --class=AssignPermissionToVotanteSeeder




<div class="comprobante">
        <h1>¡Votación Exitosa!</h1>
        <p>Gracias por participar en la votación.</p>
        <p><strong>Comprobante de Votación:</strong></p>
        <p>ID de Votación: <strong>{{ session('ticket') }}</strong></p>
        <p>Nombre del Elector: <strong>{{ session('elector') }}</strong></p>
        <!-- Agrega más detalles si es necesario -->
    </div>

    

Preguntas 


1
cargos de la directiva regional 




OBREROS OFICIALIZADOS es el mismo Obrero PASTOR?

OBRERAS CON MAS DE TRES AÑOS PRESENTADAS AL CIRCUITO? esta deberia ser una opcion?


 Predicador (a) de circuito  es lo mismo que  Predicadores Regionales.

 la  directiva de jovenes es  SONAJOV


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
     
      <td class="centrar-texto  " colspan="2" scope="col">

         <h7 class="font-semibold text-xl text-gray-800 leading-tight text-center text-white ">
           {{ $cargo->nombre  }}
       </h7>

    </td>
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




DELETE FROM registros;

ALTER TABLE registros AUTO_INCREMENT = 1;




