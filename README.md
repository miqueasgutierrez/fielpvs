




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





SELECT 
            d.id,
            ci.nombre as circuito 
            c.id AS idcargo, 
            r.nombres, 
            r.apellidos, 
            r.cedula AS cedula, 
            r.imagen AS imagen,
            c.nombre AS nombrecargo, 
            COUNT(e.id) AS candidatos_count,
            CASE 
                WHEN COUNT(e.id) > 0 THEN 'Con Votos' 
                ELSE 'Sin Votos' 
            END AS estado_votos
        FROM 
            dependencias d
        INNER JOIN 
            dependencia_cargos dc ON d.id = dc.id_dependencia
        INNER JOIN 
            cargos c ON c.id = dc.id_cargo
        INNER JOIN 
            candidatos ca ON dc.id = ca.id_dependencia_cargos
        INNER JOIN 
            ambitos_dependencias ad ON ad.id = dc.id_ambito
        INNER JOIN 
            registros r ON r.id = ca.id_candidato 
        INNER JOIN registro_iglesias ri ON ri.id_registro=r.id
        
        INNER JOIN iglesias i ON ri.id=i.id_iglesia
        INNER JOIN zonas z ON z.id= i.zona_id 
        INNER JOIN circuitos ci ON ci.id=z.circuito_id 
        LEFT JOIN 
            elecciones e ON e.id_candidato = ca.id AND YEAR(e.created_at) = ?
        WHERE 
            d.id = ?
            AND ad.id = ?  
        GROUP BY 
            d.id, 
            c.id, 
            r.nombres, 
            r.apellidos, 
            r.cedula,
            r.imagen,
            c.nombre
        LIMIT 0, 25




  <p>{{ $message }}</p>

