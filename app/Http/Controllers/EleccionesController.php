<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Dependencia;

use App\Models\Registro;

use App\Models\dependencia_cargo;
use App\Models\Ambitodependencias;
use App\Models\Elecciones;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class EleccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $elecciones = DB::select('
            SELECT  ed.id as idestadodependencia, d.id as iddependencia , d.nombre as dependencia , ad.id as idambito, ad.nombre as ambito , ed.estado as estado FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ad.id=ed.id_ambito WHERE YEAR(ed.created_at)= YEAR(CURDATE()) ORDER BY d.orden ASC;
        ');

        return view('elecciones.index',compact('elecciones'));
    }
        
    public function candidatos($iddependencia, $idambito)
    {

    $currentYear = date('Y');

    $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito, $iddependencia, $currentYear) {
        $query->where('id_ambito', $idambito)->with(['candidatos' => function ($query) use ($iddependencia, $idambito, $currentYear) {
            $query->whereHas('cargo', function ($query) use ($iddependencia) {
                $query->where('id_dependencia', $iddependencia);
            })
            ->whereYear('candidatos.created_at', $currentYear)
            ->withCount(['elecciones' => function ($query) use ($idambito) {
                $query->where('id_ambito', $idambito);
            }]);
        }]);
    }])->findOrFail($iddependencia);

    $ambito = Ambitodependencias::with(['dependencias'])->findOrFail($idambito);

    return view('elecciones.candidatos', compact('dependencia', 'ambito'));

    }
     public function electiva($iddependencia, $idambito)
    {

  $currentYear = date('Y');

    $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito, $iddependencia, $currentYear) {
        $query->where('id_ambito', $idambito)->with(['candidatos' => function ($query) use ($iddependencia, $idambito, $currentYear) {
            $query->whereHas('cargo', function ($query) use ($iddependencia) {
                $query->where('id_dependencia', $iddependencia);
            })
            ->whereYear('candidatos.created_at', $currentYear)
            ->withCount(['elecciones' => function ($query) use ($idambito) {
                $query->where('id_ambito', $idambito);
            }]);
        }]);
    }])->findOrFail($iddependencia);

    $ambito = Ambitodependencias::with(['dependencias'])->findOrFail($idambito);

   
    return view('elecciones.electiva', compact('dependencia','ambito'));

    }

     public function cargos($iddependencia, $idambito)
    
    {

    $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito) {
        $query->where('id_ambito', $idambito);
    }])
    ->findOrFail($iddependencia);


     $ambito = Ambitodependencias::with(['dependencias'])->findOrFail($idambito);

    return view('elecciones.cargos', compact('dependencia','ambito'));

    }


    public function elector($iddependencia, $idambito)
    
    {

    $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito) {
        $query->where('id_ambito', $idambito);
    }])
    ->findOrFail($iddependencia);


     $ambito = Ambitodependencias::with(['dependencias'])->findOrFail($idambito);

    return view('elecciones.elector', compact('dependencia','ambito'));

    }


 public function vista1()
    {
        $user = Auth::user();
        $idcedula = $user->name;
        $elector = Registro::where('cedula', $idcedula)->first();

// Buscar iglesia zona y region del votante

         $consultarvotante = 'SELECT c.nombre as circuito , z.nombre as zona , i.nombre as iglesia FROM registros r INNER JOIN registro_iglesias ri ON r.id=ri.id_registro INNER JOIN iglesias i ON i.id=ri.id_iglesia INNER JOIN zonas z ON z.id=i.zona_id INNER JOIN circuitos c ON z.circuito_id=c.id WHERE r.cedula= ?  ';

        $infovotante = DB::select($consultarvotante, [$idcedula]);

        $infovotante = $infovotante[0];

        $idambito1 = 1; // Ejemplo, puedes ajustar según tus necesidades
        $idambito2 = 2; // Definidos pero no utilizados
        $idambito3 = 3;
        $idambito4 = 4;

           $this->eleccionesnacionales=null;
           $this->eleccionesregionales=null;
           $this->eleccioneszonales=null;
           $this->eleccioneslocales=null;

        // Llamar a restriccionesnacionales para establecer la variable global
        $this->restriccionesnacionales($idcedula);
         $this->restriccionesregionales($idcedula);
          $this->restriccioneszonales($idcedula);
          $this->restriccioneslocales($idcedula);
   

        // Retorna la vista con las variables necesarias
         return view('elecciones.vista1', [
            'elector' => $elector,
            'infovotante' => $infovotante,
            'eleccionesnacionales' => $this->eleccionesnacionales,
            'eleccionesregionales' => $this->eleccionesregionales,
             'eleccioneszonales' => $this->eleccioneszonales,
             'eleccioneslocales' => $this->eleccioneslocales, // Acceder a la propiedad de clase
        ]);
    }

    protected function restriccionesnacionales($idcedula)
    {





    // RESTRICCION AMBITO NACIONAL
        

 ////////// RESTRICCION 1 //////////


        $restriccionnacional1 = 'SELECT * FROM registros r INNER JOIN registro_dependencia_cargo rdc ON r.id = rdc.registro_id INNER JOIN dependencia_cargos dc ON dc.id = rdc.dependencia_cargos_id INNER JOIN dependencias d ON dc.id_dependencia=d.id INNER JOIN cargos c ON dc.id_cargo = c.id INNER JOIN categoria_ungidos cu ON cu.id_registro = r.id WHERE r.cedula = ? AND (c.nombre = "Presbítero" OR c.nombre = "Vice-presbítero" OR cu.nombre = "ANCIANO NACIONAL" OR cu.nombre = "ANCIANO REGIONAL" OR d.nombre="DIRECTIVA NACIONAL DE LA FIELPVS" )';

        $resultadorestriccionnacional1 = DB::select($restriccionnacional1, [$idcedula]);


 ////////// RESTRICCION 2 //////////

$restriccionnacional2 = 'SELECT * FROM registros r INNER JOIN ministerio m ON m.id_registro = r.id WHERE r.cedula = ? AND (m.nombre = "PASTOR" OR m.nombre = "EVANGELISTA" OR m.nombre = "PASTOR MISIONERO" OR m.nombre = "MAESTROS" OR m.nombre="Misionera Reconocida" )';

$resultadorestriccionnacional2 = DB::select($restriccionnacional2, [$idcedula]);


 ////////// RESTRICCION 3  //////////

$restriccionnacional3 = 'SELECT * FROM registros r INNER JOIN ministerio m ON m.id_registro = r.id WHERE r.cedula = ? AND (m.nombre="Predicador (a) nacional" )';

$resultadorestriccionnacional3 = DB::select($restriccionnacional3, [$idcedula]);


////////// RESTRICCION 4  //////////

$restriccionnacional4 = 'SELECT * FROM registros r INNER JOIN ministerio m ON m.id_registro = r.id WHERE r.cedula = ? AND (m.nombre="Docente Titular" )';

$resultadorestriccionnacional4 = DB::select($restriccionnacional4, [$idcedula]);




 ////////// RESTRICCION 1 //////////
        if ($resultadorestriccionnacional1) {
            $this->dependenciasrestriccion1nacional();
        }

        else { 

            ////////// RESTRICCION 2 //////////

        if($resultadorestriccionnacional2) {

            $this->dependenciasrestriccion2nacional();

             }

             else {

                if($resultadorestriccionnacional3) {

                $this->dependenciasrestriccion3nacional();

             }  

             else {


                if($resultadorestriccionnacional4) {

                $this->dependenciasrestriccion4nacional();

             }  


             }

             }
         }
         
    }


    //////////////AMBITO NACIONAL///////////////////////////////////////////////////////////////
 ////////// RESTRICCION 1 //////////

    protected function dependenciasrestriccion1nacional()
    {
        $consulta1 = 'SELECT d.id, d.nombre,d.descripcion_local FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ed.id_ambito = ad.id WHERE ed.estado = 1 AND YEAR(ed.created_at) = YEAR(CURDATE()) AND ad.id = ? AND ed.id_ambito= ? 
            ORDER BY d.orden ASC';

        $idambito = 1; // Reemplaza con el valor adecuado

       $resultconsulta1 = DB::select($consulta1, [$idambito, $idambito]);




        // Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
        $dependencias1 = collect($resultconsulta1)->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->nombre,
            ];
        })->all();

        if ($dependencias1) {
            $this->verificarvotacionesnacionales($dependencias1);
        }


    }

     ////////// RESTRICCION 2 //////////

protected function dependenciasrestriccion2nacional()
    {
        $consulta1 = 'SELECT d.id, d.nombre,d.descripcion_local FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ed.id_ambito = ad.id WHERE ed.estado = 1 AND YEAR(ed.created_at) = YEAR(CURDATE()) AND ad.id =?  AND ed.id_ambito=? AND (d.nombre="DIRECTIVA NACIONAL DE LA FIELPVS" OR d.nombre="SONADAM" OR d.nombre="SONAJOV" OR d.nombre="EVANGELISMO Y MISIONES" OR d.nombre="ESCUELA DOMINICAL" OR d.nombre="INTERCESIÓN") ORDER BY d.orden ASC';

        $idambito = 1; // Reemplaza con el valor adecuado

       $resultconsulta1 = DB::select($consulta1, [$idambito, $idambito]);




        // Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
        $dependencias1 = collect($resultconsulta1)->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->nombre,
            ];
        })->all();

        if ($dependencias1) {
            $this->verificarvotacionesnacionales($dependencias1);
        }

    }


     ////////// RESTRICCION 3 //////////

protected function dependenciasrestriccion3nacional()
    {
        $consulta1 = 'SELECT d.id, d.nombre,d.descripcion_local FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ed.id_ambito = ad.id WHERE ed.estado = 1 AND YEAR(ed.created_at) = YEAR(CURDATE()) AND ad.id =?  AND ed.id_ambito=? AND (d.nombre="DIRECTIVA NACIONAL DE LA FIELPVS" OR d.nombre="EVANGELISMO Y MISIONES") ORDER BY d.orden ASC';

        $idambito = 1; // Reemplaza con el valor adecuado

       $resultconsulta1 = DB::select($consulta1, [$idambito, $idambito]);




        // Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
        $dependencias1 = collect($resultconsulta1)->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->nombre,
            ];
        })->all();

        if ($dependencias1) {
            $this->verificarvotacionesnacionales($dependencias1);
        }

    }



    ////////// RESTRICCION 4 //////////

protected function dependenciasrestriccion4nacional()
    {
        $consulta1 = 'SELECT d.id, d.nombre,d.descripcion_local FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ed.id_ambito = ad.id WHERE ed.estado = 1 AND YEAR(ed.created_at) = YEAR(CURDATE()) AND ad.id =?  AND ed.id_ambito=? AND (d.nombre="DIRECTIVA NACIONAL DE LA FIELPVS"  OR d.nombre="IBFS") ORDER BY d.orden ASC';

        $idambito = 1; // Reemplaza con el valor adecuado

       $resultconsulta1 = DB::select($consulta1, [$idambito, $idambito]);


        // Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
        $dependencias1 = collect($resultconsulta1)->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->nombre,
            ];
        })->all();

        if ($dependencias1) {
            $this->verificarvotacionesnacionales($dependencias1);
        }

    }


    protected function verificarvotacionesnacionales($dependencias1)
    {
        $user = Auth::user();
        $idcedula = $user->name;
        $elector = Registro::where('cedula', $idcedula)->first();

        $idambito1 = 1; // Reemplaza con el valor adecuado
        $electorId = $elector->id; // ID del elector
        $currentYear = date('Y'); // Año actual


        $consulta2 = 'SELECT d.nombre 
            FROM ambitos_dependencias ad 
            INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
            INNER JOIN dependencias d ON dc.id_dependencia = d.id 
            INNER JOIN candidatos c ON c.id_dependencia_cargos = dc.id 
            INNER JOIN elecciones e ON e.id_candidato = c.id 
            WHERE ad.id = ? 
            AND e.id_votante = ? 
            AND YEAR(e.created_at) = ?';

        $resultconsulta2 = DB::select($consulta2, [$idambito1, $electorId, $currentYear]);




        // Extraer los valores 'nombre' del resultado de la segunda consulta
        $dependencias2 = array_map(function ($item) {
            return $item->nombre;
        }, $resultconsulta2);

        // Encontrar la diferencia entre los nombres de dependencias
        $dependencias1Nombres = array_column($dependencias1, 'nombre', 'id');
        $elecciones1 = array_diff($dependencias1Nombres, $dependencias2);




        $dependenciasConIdNombre = [];
        foreach ($elecciones1 as $id => $nombre) {
            $dependenciasConIdNombre[] = [
                'id' => $id,
                'nombre' => $nombre,
            ];
        }

        // Asignar el resultado a la variable global (si es necesario)



        $this->eleccionesnacionales = $dependenciasConIdNombre;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////AMBITO REGIONAL///////////////////////////////////////////////////////////////

    protected function restriccionesregionales($idcedula)
    {
        
        $restriccionregional1 = 'SELECT * FROM registros r INNER JOIN registro_dependencia_cargo rdc ON r.id = rdc.registro_id INNER JOIN dependencia_cargos dc ON dc.id = rdc.dependencia_cargos_id INNER JOIN dependencias d ON dc.id_dependencia=d.id INNER JOIN cargos c ON dc.id_cargo = c.id INNER JOIN categoria_ungidos cu ON cu.id_registro = r.id WHERE r.cedula = ? AND (c.nombre = "Presbítero" OR c.nombre = "Vice-presbítero" OR cu.nombre = "ANCIANO NACIONAL" OR cu.nombre = "ANCIANO REGIONAL" OR d.nombre="DIRECTIVA NACIONAL DE LA FIELPVS" )';

        $resultadorestriccionregional1 = DB::select($restriccionregional1, [$idcedula]);

        $restriccionregional2 = 'SELECT * FROM registros r INNER JOIN ministerio m ON m.id_registro = r.id WHERE r.cedula = ? AND (m.nombre = "PASTOR" OR m.nombre = "EVANGELISTA" OR m.nombre = "PASTOR MISIONERO" OR m.nombre = "MAESTROS" OR m.nombre="Misionera Reconocida")';

        $resultadorestriccionregional2 = DB::select($restriccionregional2, [$idcedula]);


         ////////// RESTRICCION 3  //////////

$restriccionregional3 = 'SELECT * FROM registros r INNER JOIN ministerio m ON m.id_registro = r.id WHERE r.cedula = ? AND (m.nombre="Predicador (a) de circuito" OR m.nombre="Predicador (a) nacional" )';

$resultadorestriccionregional3 = DB::select($restriccionregional3, [$idcedula]);



////////// RESTRICCION 4  //////////

$restriccionregional4 = 'SELECT * FROM registros r INNER JOIN ministerio m ON m.id_registro = r.id WHERE r.cedula = ? AND (m.nombre="Docente Titular" )';

$resultadorestriccionregional4 = DB::select($restriccionregional4, [$idcedula]);


        if ($resultadorestriccionregional1) {
            $this->mostrartodaslasdependenciasambitoregional();
        }

        else { 

        if($resultadorestriccionregional2) {

            $this->dependenciasrestriccion2regional();


             }

             else
                 {

                    if($resultadorestriccionregional3) {

                $this->dependenciasrestriccion3regional();


                     }

                     else {

                        if($resultadorestriccionregional4) {



                       $this->dependenciasrestriccion4regional();


                     }


                     }


                 }

         }

    }



    ///// Restriccion 1 /////


    protected function mostrartodaslasdependenciasambitoregional()
    {
        $consulta1 = 'SELECT d.id, d.nombre,d.descripcion_local FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ed.id_ambito = ad.id WHERE ed.estado = 1 AND YEAR(ed.created_at) = YEAR(CURDATE()) AND ad.id = ? AND ed.id_ambito= ? 
            ORDER BY d.orden ASC';

        $idambito = 2; // Reemplaza con el valor adecuado

          $resultconsulta1 = DB::select($consulta1, [$idambito, $idambito]);

        // Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
        $dependencias1 = collect($resultconsulta1)->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->nombre,
            ];
        })->all();

        if ($dependencias1) {
            $this->verificarvotacionesregionales($dependencias1);
        }
    }

 ///// Restriccion 2 /////

protected function dependenciasrestriccion2regional()
    {
         $consulta1 = 'SELECT d.id, d.nombre,d.descripcion_local FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ed.id_ambito = ad.id WHERE ed.estado = 1 AND YEAR(ed.created_at) = YEAR(CURDATE()) AND ad.id =?  AND ed.id_ambito=? AND (d.nombre="DIRECTIVA REGIONAL DE LA FIELPVS" OR d.nombre="SONADAM" OR d.nombre="SONAJOV" OR d.nombre="EVANGELISMO Y MISIONES" OR d.nombre="ESCUELA DOMINICAL" OR d.nombre="INTERCESIÓN") ORDER BY d.orden ASC';

        $idambito = 2; // Reemplaza con el valor adecuado

       $resultconsulta1 = DB::select($consulta1, [$idambito, $idambito]);



        // Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
        $dependencias1 = collect($resultconsulta1)->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->nombre,
            ];
        })->all();

        if ($dependencias1) {
            $this->verificarvotacionesregionales($dependencias1);
        }

    }



    protected function dependenciasrestriccion3regional()
    {
        $consulta1 = 'SELECT d.id, d.nombre,d.descripcion_local FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ed.id_ambito = ad.id WHERE ed.estado = 1 AND YEAR(ed.created_at) = YEAR(CURDATE()) AND ad.id =?  AND ed.id_ambito=? AND (d.nombre="DIRECTIVA DE PRESBITERIO"  OR d.nombre="EVANGELISMO Y MISIONES"   OR d.nombre="SONAJOV" ) ORDER BY d.orden ASC';

        $idambito = 2; // Reemplaza con el valor adecuado

       $resultconsulta1 = DB::select($consulta1, [$idambito, $idambito]);




        // Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
        $dependencias1 = collect($resultconsulta1)->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->nombre,
            ];
        })->all();

        if ($dependencias1) {
            $this->verificarvotacionesregionales($dependencias1);
        }

    }




  ////////// RESTRICCION 4 //////////

protected function dependenciasrestriccion4regional()
    {
        $consulta1 = 'SELECT d.id, d.nombre,d.descripcion_local FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ed.id_ambito = ad.id WHERE ed.estado = 1 AND YEAR(ed.created_at) = YEAR(CURDATE()) AND ad.id =?  AND ed.id_ambito=? AND (d.nombre="DIRECTIVA DE PRESBITERIO" ) ORDER BY d.orden ASC';

        $idambito = 2; // Reemplaza con el valor adecuado

       $resultconsulta1 = DB::select($consulta1, [$idambito, $idambito]);




        // Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
        $dependencias1 = collect($resultconsulta1)->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->nombre,
            ];
        })->all();

        if ($dependencias1) {
            $this->verificarvotacionesregionales($dependencias1);
        }

    }


    protected function verificarvotacionesregionales($dependencias1)
    {
        $user = Auth::user();
        $idcedula = $user->name;
        $elector = Registro::where('cedula', $idcedula)->first();

        $idambito2 =2 ; // Reemplaza con el valor adecuado-
        $electorId = $elector->id; // ID del elector
        $currentYear = date('Y'); // Año actual

        $consulta2 = 'SELECT d.nombre 
            FROM ambitos_dependencias ad 
            INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
            INNER JOIN dependencias d ON dc.id_dependencia = d.id 
            INNER JOIN candidatos c ON c.id_dependencia_cargos = dc.id 
            INNER JOIN elecciones e ON e.id_candidato = c.id 
            WHERE ad.id = ? 
            AND e.id_votante = ? 
            AND YEAR(e.created_at) = ?';

        $resultconsulta2 = DB::select($consulta2, [$idambito2, $electorId, $currentYear]);

        // Extraer los valores 'nombre' del resultado de la segunda consulta
        $dependencias2 = array_map(function ($item) {
            return $item->nombre;
        }, $resultconsulta2);

        // Encontrar la diferencia entre los nombres de dependencias
        $dependencias1Nombres = array_column($dependencias1, 'nombre', 'id');
        $elecciones1 = array_diff($dependencias1Nombres, $dependencias2);





        $dependenciasConIdNombre = [];
        foreach ($elecciones1 as $id => $nombre) {
            $dependenciasConIdNombre[] = [
                'id' => $id,
                'nombre' => $nombre,
            ];
        }

        // Asignar el resultado a la variable global (si es necesario)
        $this->eleccionesregionales = $dependenciasConIdNombre;
    }


//






//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////AMBITO ZONAL///////////////////////////////////////////////////////////////

    protected function restriccioneszonales($idcedula)
    {
        $restriccionzonal1 = 'SELECT * FROM registros r INNER JOIN registro_dependencia_cargo rdc ON r.id = rdc.registro_id INNER JOIN dependencia_cargos dc ON dc.id = rdc.dependencia_cargos_id INNER JOIN dependencias d ON dc.id_dependencia=d.id INNER JOIN cargos c ON dc.id_cargo = c.id INNER JOIN categoria_ungidos cu ON cu.id_registro = r.id WHERE r.cedula = ? AND (c.nombre = "Presbítero" OR c.nombre = "Vice-presbítero" OR cu.nombre = "ANCIANO NACIONAL" OR cu.nombre = "ANCIANO REGIONAL" OR d.nombre="DIRECTIVA NACIONAL DE LA FIELPVS" )';

        $resultadorestriccionzonal1 = DB::select($restriccionzonal1, [$idcedula]);

        $restriccionzonal2 = 'SELECT * FROM registros r INNER JOIN ministerio m ON m.id_registro = r.id WHERE r.cedula = ? AND (m.nombre = "PASTOR" OR m.nombre = "EVANGELISTA" OR m.nombre = "PASTOR MISIONERO" OR m.nombre = "MAESTROS" OR m.nombre="Misionera Reconocida" )';

        $resultadorestriccionzonal2 = DB::select($restriccionzonal2, [$idcedula]);
 

        if ($resultadorestriccionzonal1) {
            $this->mostrartodaslasdependenciasambitozonal();
        }

        else { 

        if($resultadorestriccionzonal2) {

            $this->dependenciaszonalesrestriccion2();


             }

         }
    }


    protected function mostrartodaslasdependenciasambitozonal()
    {
        $consulta1 = 'SELECT d.id, d.nombre,d.descripcion_local FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ed.id_ambito = ad.id WHERE ed.estado = 1 AND YEAR(ed.created_at) = YEAR(CURDATE()) AND ad.id = ? AND ed.id_ambito= ?
            ORDER BY d.orden ASC';

        $idambito = 3; // Reemplaza con el valor adecuado

            $resultconsulta1 = DB::select($consulta1, [$idambito, $idambito]);

        // Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
        $dependencias1 = collect($resultconsulta1)->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->nombre,
            ];
        })->all();

        if ($dependencias1) {
            $this->verificarvotacioneszonales($dependencias1);
        }
    }



protected function dependenciaszonalesrestriccion2()
    {
        $consulta1 = 'SELECT d.id, d.nombre,d.descripcion_local FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ed.id_ambito = ad.id WHERE ed.estado = 1 AND YEAR(ed.created_at) = YEAR(CURDATE()) AND ad.id =?  AND ed.id_ambito=? AND (d.nombre="DIRECTIVA NACIONAL DE LA FIELPVS" OR d.nombre="SONADAM" OR d.nombre="SONAJOV" OR d.nombre="EVANGELISMO Y MISIONES" OR d.nombre="ESCUELA DOMINICAL" OR d.nombre="INTERCESIÓN") ORDER BY d.orden ASC';

        $idambito = 3; // Reemplaza con el valor adecuado

       $resultconsulta1 = DB::select($consulta1, [$idambito, $idambito]);




        // Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
        $dependencias1 = collect($resultconsulta1)->map(function ($item) {
            return [
                'id' => $item->id,
                'nombre' => $item->nombre,
            ];
        })->all();

        if ($dependencias1) {
            $this->verificarvotacionesnacionales($dependencias1);
        }

    }





    protected function verificarvotacioneszonales($dependencias1)
    {
        $user = Auth::user();
        $idcedula = $user->name;
        $elector = Registro::where('cedula', $idcedula)->first();

        $idambito3 =3 ; // Reemplaza con el valor adecuado-
        $electorId = $elector->id; // ID del elector
        $currentYear = date('Y'); // Año actual

        $consulta2 = 'SELECT d.nombre 
            FROM ambitos_dependencias ad 
            INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
            INNER JOIN dependencias d ON dc.id_dependencia = d.id 
            INNER JOIN candidatos c ON c.id_dependencia_cargos = dc.id 
            INNER JOIN elecciones e ON e.id_candidato = c.id 
            WHERE ad.id = ? 
            AND e.id_votante = ? 
            AND YEAR(e.created_at) = ?';

        $resultconsulta2 = DB::select($consulta2, [$idambito3, $electorId, $currentYear]);

        // Extraer los valores 'nombre' del resultado de la segunda consulta
        $dependencias2 = array_map(function ($item) {
            return $item->nombre;
        }, $resultconsulta2);

        // Encontrar la diferencia entre los nombres de dependencias
        $dependencias1Nombres = array_column($dependencias1, 'nombre', 'id');
        $elecciones1 = array_diff($dependencias1Nombres, $dependencias2);

        $dependenciasConIdNombre = [];
        foreach ($elecciones1 as $id => $nombre) {
            $dependenciasConIdNombre[] = [
                'id' => $id,
                'nombre' => $nombre,
            ];
        }

        // Asignar el resultado a la variable global (si es necesario)
        $this->eleccioneszonales = $dependenciasConIdNombre;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////













//////////////AMBITO LOCAL///////////////////////////////////////////////////////////////

  protected function restriccioneslocales($idcedula)
{
    // RESTRICCION AMBITO NACIONAL 1 PRESBITEROS VICEPRESBITEROS ANCIANOS NACIONALES
     $restriccionlocal1 = 'SELECT * FROM registros r INNER JOIN registro_dependencia_cargo rdc ON r.id = rdc.registro_id INNER JOIN dependencia_cargos dc ON dc.id = rdc.dependencia_cargos_id INNER JOIN dependencias d ON dc.id_dependencia=d.id INNER JOIN cargos c ON dc.id_cargo = c.id INNER JOIN categoria_ungidos cu ON cu.id_registro = r.id WHERE r.cedula = ? AND (c.nombre = "Presbítero" OR c.nombre = "Vice-presbítero" OR cu.nombre = "ANCIANO NACIONAL" OR cu.nombre = "ANCIANO REGIONAL" OR d.nombre="DIRECTIVA NACIONAL DE LA FIELPVS" )';

    $resultadorestriccionlocal1 = DB::select($restriccionlocal1, [$idcedula]);


     $restriccionlocal2 = 'SELECT * FROM registros r INNER JOIN ministerio m ON m.id_registro = r.id WHERE r.cedula = ? AND (m.nombre = "PASTOR" OR m.nombre = "EVANGELISTA" OR m.nombre = "PASTOR MISIONERO" OR m.nombre = "MAESTROS" OR m.nombre="Misionera Reconocida")';

        $resultadorestriccionlocal2 = DB::select($restriccionlocal2, [$idcedula]);

 $this->mostrartodaslasdependenciasambitolocal();
 

    if ($resultadorestriccionlocal1) {
        $this->mostrartodaslasdependenciasambitolocal();
    }


        else { 

        if($resultadorestriccionlocal2) {

            $this->dependenciaslocalesesrestriccion2();


             }

         }
}


///Restriccion1 /////


protected function mostrartodaslasdependenciasambitolocal()
{
    $consulta1 = 'SELECT d.id, d.nombre,d.descripcion_local FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ed.id_ambito = ad.id WHERE ed.estado = 1 AND YEAR(ed.created_at) = YEAR(CURDATE()) AND ad.id = ? AND ed.id_ambito= ? ORDER BY d.orden ASC';

    $idambito4 = 4; // Reemplaza con el valor adecuado

    $resultconsulta1 = DB::select($consulta1, [$idambito4, $idambito4]);

    // Extraer los valores 'id', 'nombre' y 'descripcion_local' del resultado de la primera consulta
    $dependencias1 = collect($resultconsulta1)->map(function ($item) {
        return [
            'id' => $item->id,
            'nombre' => $item->nombre,
            'descripcion_local' => $item->descripcion_local ?? ''
        ];
    })->all();

    if ($dependencias1) {
        $this->verificarvotacioneslocales($dependencias1);
    }
}


///Restriccion2 /////


protected function dependenciaslocalesesrestriccion2()
{
    $consulta1 = 'SELECT d.id, d.nombre,d.descripcion_local FROM dependencias d INNER JOIN estado_dependencias ed ON d.id = ed.id_dependencia INNER JOIN ambitos_dependencias ad ON ed.id_ambito = ad.id WHERE ed.estado = 1 AND YEAR(ed.created_at) = YEAR(CURDATE()) AND ad.id =?  AND ed.id_ambito=? AND (d.nombre="DIRECTIVA NACIONAL DE LA FIELPVS" OR d.nombre="SONADAM" OR d.nombre="SONAJOV" OR d.nombre="EVANGELISMO Y MISIONES" OR d.nombre="ESCUELA DOMINICAL" OR d.nombre="INTERCESIÓN") ORDER BY d.orden ASC';

    $idambito4 = 4; // Reemplaza con el valor adecuado

    $resultconsulta1 = DB::select($consulta1, [$idambito4, $idambito4]);

    // Extraer los valores 'id', 'nombre' y 'descripcion_local' del resultado de la primera consulta
    $dependencias1 = collect($resultconsulta1)->map(function ($item) {
        return [
            'id' => $item->id,
            'nombre' => $item->nombre,
            'descripcion_local' => $item->descripcion_local ?? ''
        ];
    })->all();

    if ($dependencias1) {
        $this->verificarvotacioneslocales($dependencias1);
    }
}




protected function verificarvotacioneslocales($dependencias1)
{
    $user = Auth::user();
    $idcedula = $user->name;
    $elector = Registro::where('cedula', $idcedula)->first();

    $idambito4 = 4; // Reemplaza con el valor adecuado
    $electorId = $elector->id; // ID del elector
    $currentYear = date('Y'); // Año actual

    $consulta2 = 'SELECT d.nombre 
            FROM ambitos_dependencias ad 
            INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
            INNER JOIN dependencias d ON dc.id_dependencia = d.id 
            INNER JOIN candidatos c ON c.id_dependencia_cargos = dc.id 
            INNER JOIN elecciones e ON e.id_candidato = c.id 
            WHERE ad.id = ? 
            AND e.id_votante = ? 
            AND YEAR(e.created_at) = ?';

    $resultconsulta2 = DB::select($consulta2, [$idambito4, $electorId, $currentYear]);

    // Extraer los valores 'id', 'nombre' y 'descripcion_local' del resultado de la segunda consulta
    $dependencias2 = array_map(function ($item) {
        return [
            'id' => $item->id,
            'nombre' => $item->nombre,
            'descripcion_local' => $item->descripcion_local ?? ''
        ];
    }, $resultconsulta2);

    // Encontrar la diferencia entre las dependencias
    $dependencias1Ids = array_column($dependencias1, 'id');
    $dependencias2Ids = array_column($dependencias2, 'id');

    $elecciones1Ids = array_diff($dependencias1Ids, $dependencias2Ids);




    $dependenciasConIdNombre = [];
    foreach ($elecciones1Ids as $id) {
        $dependencia1 = collect($dependencias1)->firstWhere('id', $id);

        $dependenciasConIdNombre[] = [
            'id' => $dependencia1['id'],
            'nombre' => $dependencia1['nombre'],
            'descripcion_local' => $dependencia1['descripcion_local']
        ];
    }

    // Asignar el resultado a la variable global (si es necesario)
    $this->eleccioneslocales = $dependenciasConIdNombre;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    public function datos(Request $request)
    
    {


// Asegúrate de que el campo 'cedula' está presente en la solicitud
    $idcedula = $request->input('cedula');

    $iddependencia = $request->input('iddependencia');

 $elector = Registro::where('cedula', $idcedula)->first();

        if (!$elector) {
            return redirect()->back()->with('error', 'La cédula no existe en los registros.Verifique o registre sus datos.');
        }

$idambito1='1';
$idambito2='2';
$idambito3='3';
$idambito4='4';

$currentYear = date('Y');

// Consultar si el votante ya ha realizado el voto en esa dependencia.

$existente = 'SELECT * FROM registros r INNER JOIN elecciones e ON r.id=e.id_votante INNER JOIN candidatos c ON e.id_candidato=c.id INNER JOIN dependencia_cargos dc ON c.id_dependencia_cargos=dc.id INNER JOIN dependencias d ON dc.id_dependencia=d.id WHERE r.id=? AND d.id= ? AND YEAR(e.created_at) = ? ';

$result = DB::select($existente, [$elector->id,$iddependencia,$currentYear]);


    if ($result) {
        return redirect()->back()->with('error', 'La cédula ya ha votado en esta dependencia en el año actual.');
    }

$consulta1 = 'SELECT d.id, d.nombre 
              FROM ambitos_dependencias ad 
              INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
              INNER JOIN dependencias d ON dc.id_dependencia = d.id 
              WHERE ad.id = ?  ';

$idambito1 = 1; // Reemplaza con el valor adecuado para $idambito1

    $resultconsulta1 = DB::select($consulta1, [$idambito1]);

// Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
$dependencias1 = collect($resultconsulta1)->map(function ($item) {
    return [
        'id' => $item->id,
        'nombre' => $item->nombre,
    ];
})->all();

// Segunda consulta
$consulta2 = 'SELECT d.nombre 
              FROM ambitos_dependencias ad 
              INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
              INNER JOIN dependencias d ON dc.id_dependencia = d.id 
              INNER JOIN candidatos c ON c.id_dependencia_cargos = dc.id 
              INNER JOIN elecciones e ON e.id_candidato = c.id 
              WHERE ad.id = ? 
                AND e.id_votante = ? 
                AND YEAR(e.created_at) = ?';

$electorId = $elector->id; // Reemplaza con el id correcto del elector
$currentYear = date('Y'); // Obtener el año actual o asignarlo según sea necesario

$resultconsulta2 = DB::select($consulta2, [$idambito1, $electorId, $currentYear]);

// Extraer los valores 'nombre' del resultado de la segunda consulta
$dependencias2 = array_map(function($item) {
    return $item->nombre;
}, $resultconsulta2);

// Encontrar la diferencia entre los nombres de dependencias
$elecciones1 = array_diff(array_column($dependencias1, 'nombre','id'), $dependencias2);



$dependenciasConIdNombre = [];

foreach ($elecciones1 as $id => $nombre) {
    $dependenciasConIdNombre[] = [
        'id' => $id,
        'nombre' => $nombre,
    ];
}

// Mostrar el resultado


$eleccionesnacionales=$dependenciasConIdNombre;





   return view('elecciones.datos', compact('elector','eleccionesnacionales','iddependencia'));

    }

    public function votacion($idvotante,$iddependencia, $idambito)
    
    {

     $cedula = Registro::where('id', $idvotante)->value('cedula');

  $currentYear = date('Y');

    $dependencia = Dependencia::with(['cargos' => function ($query) use ($idambito, $iddependencia, $currentYear) {
        $query->where('id_ambito', $idambito)->with(['candidatos' => function ($query) use ($iddependencia, $idambito, $currentYear) {
            $query->whereHas('cargo', function ($query) use ($iddependencia) {
                $query->where('id_dependencia', $iddependencia);
            })
            ->whereYear('candidatos.created_at', $currentYear)
            ->withCount(['elecciones' => function ($query) use ($idambito) {
                $query->where('id_ambito', $idambito);
            }]);
        }]);
    }])->findOrFail($iddependencia);

      $ambito = Ambitodependencias::with(['dependencias'])->findOrFail($idambito);

    return view('elecciones.votacion', compact('dependencia','ambito','idvotante','cedula'));

    }

     public function votacionfinal(Request $request)
    {



    // Asignación de variables
    $idVotante = $request->idvotante;
    $idCandidatos = $request->idcandidato;

    // Iteración sobre los candidatos
    foreach ($idCandidatos as $idCandidato) {
        Elecciones::create([
            'id_votante' => $idVotante,
            'id_candidato' => $idCandidato
        ]);
    }

    // Redireccionamiento con mensaje de éxito
$iddependencia = $request->input('iddependencia');

$idcedula = $request->input('cedula');
 
  $elector = Registro::where('cedula', $idcedula)->first();

$idambito1='1';
$idambito2='2';
$idambito3='3';
$idambito4='4';

$currentYear = date('Y');

// Consultar si el votante ya ha realizado el voto en esa dependencia.


$consulta1 = 'SELECT d.id, d.nombre 
              FROM ambitos_dependencias ad 
              INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
              INNER JOIN dependencias d ON dc.id_dependencia = d.id 
              WHERE ad.id = ?';

$idambito1 = 1; // Reemplaza con el valor adecuado para $idambito1

    $resultconsulta1 = DB::select($consulta1, [$idambito1]);

// Extraer los valores 'id' y 'nombre' del resultado de la primera consulta
$dependencias1 = collect($resultconsulta1)->map(function ($item) {
    return [
        'id' => $item->id,
        'nombre' => $item->nombre,
    ];
})->all();

// Segunda consulta
$consulta2 = 'SELECT d.nombre 
              FROM ambitos_dependencias ad 
              INNER JOIN dependencia_cargos dc ON ad.id = dc.id_ambito 
              INNER JOIN dependencias d ON dc.id_dependencia = d.id 
              INNER JOIN candidatos c ON c.id_dependencia_cargos = dc.id 
              INNER JOIN elecciones e ON e.id_candidato = c.id 
              WHERE ad.id = ? 
                AND e.id_votante = ? 
                AND YEAR(e.created_at) = ?';

$electorId = $elector->id; // Reemplaza con el id correcto del elector
$currentYear = date('Y'); // Obtener el año actual o asignarlo según sea necesario

$resultconsulta2 = DB::select($consulta2, [$idambito1, $electorId, $currentYear]);

// Extraer los valores 'nombre' del resultado de la segunda consulta
$dependencias2 = array_map(function($item) {
    return $item->nombre;
}, $resultconsulta2);

// Encontrar la diferencia entre los nombres de dependencias
$elecciones1 = array_diff(array_column($dependencias1, 'nombre','id'), $dependencias2);



$dependenciasConIdNombre = [];

foreach ($elecciones1 as $id => $nombre) {
    $dependenciasConIdNombre[] = [
        'id' => $id,
        'nombre' => $nombre,
    ];
}

// Mostrar el resultado


$eleccionesnacionales=$dependenciasConIdNombre;


return view('elecciones.datos', compact('elector', 'eleccionesnacionales','iddependencia'))
    ->with('success', 'Votacion Exitosa.');

  
    }

     public function opciones($iddependencia, $idambito)
    {



      return view('elecciones.opciones', compact('iddependencia','idambito'));

    }

public function vistaresultados(Request $request)
    {

 $iddependencia = $request->input('iddependencia');
 $idambito = $request->input('idambito');

 $nombredependencia=Dependencia::where('id', $iddependencia)->value('nombre');
 $nombreambito=Ambitodependencias::where('id', $idambito)->value('nombre');


$currentYear = date('Y'); // Año actual

$sql = "
   SELECT 
    d.id, 
    c.id AS idcargo, 
    r.nombres,r.apellidos, r.cedula as cedula, r.imagen as imagen ,
    c.nombre AS nombrecargo, 
    COUNT(e.id) AS candidatos_count,
    CASE WHEN COUNT(e.id) > 0 THEN 'Con Votos' ELSE 'Sin Votos' END AS estado_votos
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
LEFT JOIN 
    elecciones e ON e.id_candidato = ca.id AND YEAR(e.created_at) =?
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
LIMIT 0, 25;
";

$dependencia = DB::select($sql, [$currentYear, $iddependencia, $idambito]);


     return view('elecciones.vistaresultados', compact('dependencia','idambito','nombredependencia','nombreambito'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       

                           $dependencia = Dependencia::with(['cargos'])->findOrFail($id);
                            

                             

                    /* dd($candidatos); */
        return view('elecciones.electiva', compact('dependencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
