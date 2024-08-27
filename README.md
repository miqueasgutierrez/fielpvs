




# fielpvs
 Sistema de Elecciones
codigo para convertit registros en usuarios 

php artisan db:seed --class=ConvertirRegistrosEnUsuariosSeeder


codigo para dar permisoa a vista votantes


php artisan db:seed --class=AssignPermissionToVotanteSeeder




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




