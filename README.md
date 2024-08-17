




 $pdf->SetLeftMargin(95);




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






@php
        switch ($dependencia['nombre']) {
            case 'SONADAM':
                $message = "DAMAS";
                break;
            case 'EVANGELISMO Y MISIONES':
                $message = "EVANGELISMO";
                break;
            case 'EVANGELISMO Y MISIONES':
                $message = "EVANGELISMO";
                break;
            case 'SONAJOV':
                $message = "JÓVENES REGIONALES ";
                break;
            case 'SONAJOV':
                $message = "JÓVENES REGIONALES ";
                break;
            case 'INTERCESIÓN':
                $message = "INTERCESIÓN";
                break;
            case 'PRESBÍTERO REGIONAL':
                $message = "PRESBÍTERO REGIONAL";
                break;
            case 'ESCUELA DOMINICAL':
                $message = "ESCUELA DOMINICAL";
                break;

            default:
                $message = "";
        }
    @endphp



  <p>{{ $message }}</p>

