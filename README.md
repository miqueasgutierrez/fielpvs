# fielpvs
 Sistema de Elecciones
codigo para convertit registros en usuarios 

php artisan db:seed --class=ConvertirRegistrosEnUsuariosSeeder


codigo para dar permisoa a vista votantes



php artisan db:seed --class=AssignPermissionToVotanteSeeder


SELECT d.id as iddependencia , d.nombre as dependencia , ad.id as idambito, ad.nombre as ambito FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN dependencia_cargos dc ON d.id =dc.id_dependencia INNER JOIN ambitos_dependencias ad ON dc.id_ambito= ad.id WHERE YEAR(ed.created_at)= YEAR(CURDATE())   ORDER BY d.orden ASC; 
