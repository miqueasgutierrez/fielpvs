<?php

namespace App\Http\Controllers;

use App\Libraries\FPDF\FPDFWrapper;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Dependencia;

use App\Models\Registro;

use App\Models\Iglesia;

use App\Models\dependencia_cargo;
use App\Models\Ambitodependencias;
use App\Models\Elecciones;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function resultadofinalpdf(Request $request)
{
   $pdf = new FPDFWrapper();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Ln(7);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("FEDERACIÓN DE IGLESIAS EVANGÉLICAS LIBRES ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("PENTECOSTALES DE VENEZUELA SALEM ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("COMISIÓN NACIONAL ELECTORAL FIELPVS ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("CONEF")), 0, 'C', false);
    $pdf->Ln(9);
    $pdf->SetFont('Arial', 'B', 12);

    $iddependencia = $request->input('iddependencia');
    $idambito = $request->input('idambito');

    $anio = $request->input('anio');

    $nombredependencia = Dependencia::where('id', $iddependencia)->value('nombre');
    $nombreambito = Ambitodependencias::where('id', $idambito)->value('nombre');
    $currentYear = date('Y'); // Año actual

    $sql = "
        SELECT 
            d.id, 
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
        LEFT JOIN 
            elecciones e ON e.id_candidato = ca.id AND YEAR(e.created_at) = ?
        WHERE 

         YEAR(ca.created_at) = ? 
            AND d.id = ?
            AND ad.id = ? 
        GROUP BY 
            d.id, 
            c.id, 
            r.nombres, 
            r.apellidos, 
            r.cedula,
            r.imagen,
            c.nombre
             ORDER BY 
            c.orden ASC
        LIMIT 0, 200;
    ";

    $dependencia = DB::select($sql, [$currentYear,$currentYear, $iddependencia, $idambito]);

    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("RESULTADO DE ELECIONES: $anio ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("DEPENDENCIA: $nombredependencia  | ÁMBITO: $nombreambito")), 0, 'C', false);

    $imagelogofielvs = public_path('imagen/logos/60year.png');
    $pdf->Image($imagelogofielvs, 10, 17, 45, 0, 'PNG');
    $imagelogoconef = public_path('imagen/logos/CONEF.png');
    $pdf->Image($imagelogoconef, 155, 17, 45, 0, 'PNG');

    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Ln(3);
    $pdf->SetLeftMargin(16);
    $pdf->Cell(7, 5, utf8_decode("N°"), 1);
    $pdf->Cell(25, 5, utf8_decode("CEDULA"), 1, 0, 'C');
    $pdf->Cell(90, 5, "NOMBRES Y APELLIDOS", 1, 0, 'C');
    $pdf->Cell(18, 5, "VOTOS", 1, 0, 'C');
    $pdf->Cell(18, 5, "%", 1, 0, 'C');
    $pdf->Cell(25, 5, "CONDICION", 1);
    $pdf->Ln(4);

    $ultimocargo = '';
    $sumaResultado = 0;
    $contador = 0;
    $ganadores = []; // Lista para almacenar los IDs de los candidatos ganadores

    // Agrupar candidatos por cargo
    $candidatosPorCargo = [];
    foreach ($dependencia as $item) {
        $candidatosPorCargo[$item->idcargo][] = $item;
    }

    foreach ($candidatosPorCargo as $idcargo => $candidatos) {
        // Ordenar candidatos por la cantidad de votos
        usort($candidatos, function ($a, $b) {
            return $b->candidatos_count - $a->candidatos_count;
        });

        $ganador = null;
        $empate = false;

        // Verificar si hay empate
        if (count($candidatos) > 1 && $candidatos[0]->candidatos_count == $candidatos[1]->candidatos_count) {
            $empate = true;
        } else {
            // Si no hay empate, el primer candidato es el ganador
            $ganador = $candidatos[0];
            $ganadores[] = $candidatos[0]->cedula; // Marcar como ganador
        }

        $totalVotosPorCargo = array_sum(array_map(function ($candidato) {
            return $candidato->candidatos_count;
        }, $candidatos));

        $pdf->SetLeftMargin(95);

        foreach ($candidatos as $item) {
            $cargo = $item->nombrecargo;

            if ($cargo != $ultimocargo) {
                if ($ultimocargo != '') {
                    $pdf->Ln(3);
                    $pdf->SetLeftMargin(95);
                    $pdf->Cell(43, 5, "Total Votos", 1, 0, 'C');
                    $pdf->Cell(18, 5, "$sumaResultado", 1, 1, 'C');
                }
                
                $pdf->SetLeftMargin(16);
                $pdf->SetFont('Arial', 'B', 11);
                $pdf->Cell(30, 10, utf8_decode(strtoupper($cargo)), 0, 1, 'C');
                $pdf->SetFont('Arial', '', 11);
                $ultimocargo = $cargo;
                $sumaResultado = 0;
            }

            $contador++;
            $sumaResultado += $item->candidatos_count;

           if ($totalVotosPorCargo > 0) {
    $porcentaje = ($item->candidatos_count / $totalVotosPorCargo) * 100;
} else {
    $porcentaje = 0;  // Si $totalVotosPorCargo es 0, establece el porcentaje en 0
}

            $pdf->Cell(7, 5, utf8_decode("$contador"), 1, 0, 'C');
            $pdf->Cell(25, 5, utf8_decode("$item->cedula"), 1, 0, 'C');
            $pdf->Cell(90, 5, utf8_decode("$item->nombres $item->apellidos"), 1, 0, 'C');
            $pdf->Cell(18, 5, "$item->candidatos_count", 1, 0, 'C');
            $pdf->Cell(18, 5, intval($porcentaje), 1, 0, 'C');

            if ($cargo == 'Vocales') {
                // Seleccionar los tres candidatos con más votos como ganadores
                $topVocales = array_slice($candidatos, 0, 3);
                if (in_array($item->cedula, array_column($topVocales, 'cedula'))) {
                    $pdf->Cell(25, 5, "Ganador", 1, 0, 'C');
                } else {
                    $pdf->Cell(25, 5, "", 1, 0, 'C');
                }
            } else {
                // Marcar "Ganador" o "Empate" según corresponda
                if ($empate && $item->candidatos_count == $candidatos[0]->candidatos_count) {
                    $pdf->Cell(25, 5, "Empate", 1, 0, 'C');
                } else {
                    $pdf->Cell(25, 5, $item === $ganador ? "Ganador" : "", 1, 0, 'C');
                }
            }

            $pdf->Ln(5);
        }

        // Mostrar el total de votos para el último cargo
        
    }

      $pdf->Ln(5);

     $pdf->SetLeftMargin(95);
                    $pdf->Cell(43, 5, "Total Votos", 1, 0, 'C');
                    $pdf->Cell(18, 5, "$sumaResultado", 1, 1, 'C');



    $nombreArchivo = strtoupper("RESULTADO_{$nombredependencia}_{$currentYear}.pdf");

// Guardar o mostrar el archivo con el nombre dinámico
   $pdf->Output('I', $nombreArchivo);

    $pdf->Output();
    exit;
}


public function resultadonacional(Request $request)
{
    $pdf = new FPDFWrapper();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Ln(7);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("FEDERACIÓN DE IGLESIAS EVANGÉLICAS LIBRES ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("PENTECOSTALES DE VENEZUELA SALEM ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("COMISIÓN NACIONAL ELECTORAL FIELPVS ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("CONEF")), 0, 'C', false);
    $pdf->Ln(9);
    $pdf->SetFont('Arial', 'B', 12);

    $iddependencia = $request->input('iddependencia');
    $idambito = $request->input('idambito');

    $anio = $request->input('anio');

    $nombredependencia = Dependencia::where('id', $iddependencia)->value('nombre');
    $nombreambito = Ambitodependencias::where('id', $idambito)->value('nombre');
    $currentYear = date('Y'); // Año actual

    $sql = "
        SELECT 
            d.id, 
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
        LEFT JOIN 
            elecciones e ON e.id_candidato = ca.id AND YEAR(e.created_at) = ?
        WHERE 
        YEAR(ca.created_at) = ?
           AND d.id = ?
            AND ad.id = ? 
        GROUP BY 
            d.id, 
            c.id, 
            r.nombres, 
            r.apellidos, 
            r.cedula,
            r.imagen,
            c.nombre
             ORDER BY 
            c.orden ASC
        LIMIT 0, 200;
    ";

    $dependencia = DB::select($sql, [$anio,$anio, $iddependencia, $idambito]);

    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("RESULTADO DE ELECIONES: $anio ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("DEPENDENCIA: $nombredependencia  | ÁMBITO: $nombreambito")), 0, 'C', false);

    $imagelogofielvs = public_path('imagen/logos/60year.png');
    $pdf->Image($imagelogofielvs, 10, 17, 45, 0, 'PNG');
    $imagelogoconef = public_path('imagen/logos/CONEF.png');
    $pdf->Image($imagelogoconef, 155, 17, 45, 0, 'PNG');

    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Ln(3);
    $pdf->SetLeftMargin(16);
    $pdf->Cell(7, 5, utf8_decode("N°"), 1);
    $pdf->Cell(25, 5, utf8_decode("CEDULA"), 1, 0, 'C');
    $pdf->Cell(90, 5, "NOMBRES Y APELLIDOS", 1, 0, 'C');
    $pdf->Cell(18, 5, "VOTOS", 1, 0, 'C');
    $pdf->Cell(18, 5, "%", 1, 0, 'C');
    $pdf->Cell(25, 5, "CONDICION", 1);
    $pdf->Ln(4);

    $ultimocargo = '';
    $sumaResultado = 0;
    $contador = 0;
    $ganadores = []; // Lista para almacenar los IDs de los candidatos ganadores

    // Agrupar candidatos por cargo
    $candidatosPorCargo = [];
    foreach ($dependencia as $item) {
        $candidatosPorCargo[$item->idcargo][] = $item;
    }

    foreach ($candidatosPorCargo as $idcargo => $candidatos) {
        // Ordenar candidatos por la cantidad de votos
        usort($candidatos, function ($a, $b) {
            return $b->candidatos_count - $a->candidatos_count;
        });

        $ganador = null;
        $empate = false;

        // Verificar si hay empate
        if (count($candidatos) > 1 && $candidatos[0]->candidatos_count == $candidatos[1]->candidatos_count) {
            $empate = true;
        } else {
            // Si no hay empate, el primer candidato es el ganador
            $ganador = $candidatos[0];
            $ganadores[] = $candidatos[0]->cedula; // Marcar como ganador
        }

        $totalVotosPorCargo = array_sum(array_map(function ($candidato) {
            return $candidato->candidatos_count;
        }, $candidatos));

        $pdf->SetLeftMargin(95);

        foreach ($candidatos as $item) {
            $cargo = $item->nombrecargo;

            if ($cargo != $ultimocargo) {
                if ($ultimocargo != '') {
                    $pdf->Ln(3);
                    $pdf->SetLeftMargin(95);
                    $pdf->Cell(43, 5, "Total Votos", 1, 0, 'C');
                    $pdf->Cell(18, 5, "$sumaResultado", 1, 1, 'C');
                }
                
                $pdf->SetLeftMargin(16);
                $pdf->SetFont('Arial', 'B', 11);
                $pdf->Cell(30, 10, utf8_decode(strtoupper($cargo)), 0, 1, 'C');
                $pdf->SetFont('Arial', '', 11);
                $ultimocargo = $cargo;
                $sumaResultado = 0;
            }

            $contador++;
            $sumaResultado += $item->candidatos_count;
            

               if ($totalVotosPorCargo > 0) {
    $porcentaje = ($item->candidatos_count / $totalVotosPorCargo) * 100;
} else {
    $porcentaje = 0;  // Si $totalVotosPorCargo es 0, establece el porcentaje en 0
}


            $pdf->Cell(7, 5, utf8_decode("$contador"), 1, 0, 'C');
            $pdf->Cell(25, 5, utf8_decode("$item->cedula"), 1, 0, 'C');
            $pdf->Cell(90, 5, utf8_decode("$item->nombres $item->apellidos"), 1, 0, 'C');
            $pdf->Cell(18, 5, "$item->candidatos_count", 1, 0, 'C');
            $pdf->Cell(18, 5, intval($porcentaje), 1, 0, 'C');

            if ($cargo == 'Vocales') {
                // Seleccionar los tres candidatos con más votos como ganadores
                $topVocales = array_slice($candidatos, 0, 3);
                if (in_array($item->cedula, array_column($topVocales, 'cedula'))) {
                    $pdf->Cell(25, 5, "Ganador", 1, 0, 'C');
                } else {
                    $pdf->Cell(25, 5, "", 1, 0, 'C');
                }
            } else {
                // Marcar "Ganador" o "Empate" según corresponda
                if ($empate && $item->candidatos_count == $candidatos[0]->candidatos_count) {
                    $pdf->Cell(25, 5, "Empate", 1, 0, 'C');
                } else {
                    $pdf->Cell(25, 5, $item === $ganador ? "Ganador" : "", 1, 0, 'C');
                }
            }

            $pdf->Ln(5);

  


        }



        // Mostrar el total de votos para el último cargo
        
    }

    $pdf->Ln(5);

     $pdf->SetLeftMargin(95);
                    $pdf->Cell(43, 5, "Total Votos", 1, 0, 'C');
                    $pdf->Cell(18, 5, "$sumaResultado", 1, 1, 'C');
  $ambito='Nacional';

    $nombreArchivo = strtoupper("RESULTADO_{$nombredependencia}__{$ambito}_{$anio}.pdf");

// Guardar o mostrar el archivo con el nombre dinámico
   $pdf->Output('I', $nombreArchivo);

    $pdf->Output();
    exit;
}




public function resultadoregional(Request $request)
{
    $pdf = new FPDFWrapper();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Ln(7);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("FEDERACIÓN DE IGLESIAS EVANGÉLICAS LIBRES ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("PENTECOSTALES DE VENEZUELA SALEM ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("COMISIÓN NACIONAL ELECTORAL FIELPVS ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("CONEF")), 0, 'C', false);
    $pdf->Ln(9);
    $pdf->SetFont('Arial', 'B', 12);

    $iddependencia = $request->input('iddependencia');
    $idambito = $request->input('idambito');

    $idcircuito = $request->input('idcircuito');

  $sqlcircuito = "
    SELECT nombre 
    FROM circuitos 
    WHERE id = ? 
    LIMIT 1
";

$nombrecircuito = DB::select($sqlcircuito, [$idcircuito]);

$nombre = isset($nombrecircuito[0]) ? $nombrecircuito[0]->nombre : null;


    $anio = $request->input('anio');

    $nombredependencia = Dependencia::where('id', $iddependencia)->value('descripcion_regional');
    $nombreambito = Ambitodependencias::where('id', $idambito)->value('nombre');
    $currentYear = date('Y'); // Año actual

    $sql = "
       SELECT 
            d.id,
            ci.nombre as circuito,
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
        
        INNER JOIN iglesias i ON i.id=ri.id_iglesia
        INNER JOIN zonas z ON z.id= i.zona_id 
        INNER JOIN circuitos ci ON ci.id=z.circuito_id 
        LEFT JOIN 
            elecciones e ON e.id_candidato = ca.id AND YEAR(e.created_at) = ?
        WHERE 
            YEAR(ca.created_at) = ?
            AND d.id = ?
            AND ad.id = ?
            AND ci.id=?
        GROUP BY 
            d.id, 
            c.id, 
            r.nombres, 
            r.apellidos, 
            r.cedula,
            r.imagen,
            c.nombre,
            ci.nombre
             ORDER BY 
            c.orden ASC
        LIMIT 0, 200
    ";

    $dependencia = DB::select($sql, [$anio, $anio,$iddependencia, $idambito, $idcircuito]);

    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("RESULTADO DE ELECIONES: $anio ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("DEPENDENCIA: $nombredependencia  | ÁMBITO: $nombreambito | CIRCUITO: $nombre ")), 0, 'C', false);

    $imagelogofielvs = public_path('imagen/logos/60year.png');
    $pdf->Image($imagelogofielvs, 10, 17, 45, 0, 'PNG');
    $imagelogoconef = public_path('imagen/logos/CONEF.png');
    $pdf->Image($imagelogoconef, 155, 17, 45, 0, 'PNG');

    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Ln(3);
    $pdf->SetLeftMargin(16);
    $pdf->Cell(7, 5, utf8_decode("N°"), 1);
    $pdf->Cell(25, 5, utf8_decode("CEDULA"), 1, 0, 'C');
    $pdf->Cell(90, 5, "NOMBRES Y APELLIDOS", 1, 0, 'C');
    $pdf->Cell(18, 5, "VOTOS", 1, 0, 'C');
    $pdf->Cell(18, 5, "%", 1, 0, 'C');
    $pdf->Cell(25, 5, "CONDICION", 1);
    $pdf->Ln(4);

    $ultimocargo = '';
    $sumaResultado = 0;
    $contador = 0;
    $ganadores = []; // Lista para almacenar los IDs de los candidatos ganadores

    // Agrupar candidatos por cargo
    $candidatosPorCargo = [];
    foreach ($dependencia as $item) {
        $candidatosPorCargo[$item->idcargo][] = $item;
    }

    foreach ($candidatosPorCargo as $idcargo => $candidatos) {
        // Ordenar candidatos por la cantidad de votos
        usort($candidatos, function ($a, $b) {
            return $b->candidatos_count - $a->candidatos_count;
        });

        $ganador = null;
        $empate = false;

        // Verificar si hay empate
        if (count($candidatos) > 1 && $candidatos[0]->candidatos_count == $candidatos[1]->candidatos_count) {
            $empate = true;
        } else {
            // Si no hay empate, el primer candidato es el ganador
            $ganador = $candidatos[0];
            $ganadores[] = $candidatos[0]->cedula; // Marcar como ganador
        }

        $totalVotosPorCargo = array_sum(array_map(function ($candidato) {
            return $candidato->candidatos_count;
        }, $candidatos));

        $pdf->SetLeftMargin(95);

        foreach ($candidatos as $item) {
            $cargo = $item->nombrecargo;

            if ($cargo != $ultimocargo) {
                if ($ultimocargo != '') {
                    $pdf->Ln(3);
                    $pdf->SetLeftMargin(95);
                    $pdf->Cell(43, 5, "Total Votos", 1, 0, 'C');
                    $pdf->Cell(18, 5, "$sumaResultado", 1, 1, 'C');
                }
                
                $pdf->SetLeftMargin(16);
                $pdf->SetFont('Arial', 'B', 11);
                $pdf->Cell(30, 10, utf8_decode(strtoupper($cargo)), 0, 1, 'C');
                $pdf->SetFont('Arial', '', 11);
                $ultimocargo = $cargo;
                $sumaResultado = 0;
            }

            $contador++;
            $sumaResultado += $item->candidatos_count;
            if ($totalVotosPorCargo > 0) {
    $porcentaje = ($item->candidatos_count / $totalVotosPorCargo) * 100;
} else {
    $porcentaje = 0;  // Si $totalVotosPorCargo es 0, establece el porcentaje en 0
}

            $pdf->Cell(7, 5, utf8_decode("$contador"), 1, 0, 'C');
            $pdf->Cell(25, 5, utf8_decode("$item->cedula"), 1, 0, 'C');
            $pdf->Cell(90, 5, utf8_decode("$item->nombres $item->apellidos"), 1, 0, 'C');
            $pdf->Cell(18, 5, "$item->candidatos_count", 1, 0, 'C');
            $pdf->Cell(18, 5, intval($porcentaje), 1, 0, 'C');

            if ($cargo == 'Vocales') {
                // Seleccionar los tres candidatos con más votos como ganadores
                $topVocales = array_slice($candidatos, 0, 3);
                if (in_array($item->cedula, array_column($topVocales, 'cedula'))) {
                    $pdf->Cell(25, 5, "Ganador", 1, 0, 'C');
                } else {
                    $pdf->Cell(25, 5, "", 1, 0, 'C');
                }
            } else {
                // Marcar "Ganador" o "Empate" según corresponda
                if ($empate && $item->candidatos_count == $candidatos[0]->candidatos_count) {
                    $pdf->Cell(25, 5, "Empate", 1, 0, 'C');
                } else {
                    $pdf->Cell(25, 5, $item === $ganador ? "Ganador" : "", 1, 0, 'C');
                }
            }

            $pdf->Ln(5);

        }

        
    }

    $pdf->Ln(5);

     $pdf->SetLeftMargin(95);
                    $pdf->Cell(43, 5, "Total Votos", 1, 0, 'C');
                    $pdf->Cell(18, 5, "$sumaResultado", 1, 1, 'C');

 $ambito='Regional';

    $nombreArchivo = strtoupper("RESULTADO_{$nombredependencia}_{$ambito}_{$anio}.pdf");

// Guardar o mostrar el archivo con el nombre dinámico
   $pdf->Output('I', $nombreArchivo);

    $pdf->Output();
    exit;
}



public function resultadozonal(Request $request)
{
    $pdf = new FPDFWrapper();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Ln(7);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("FEDERACIÓN DE IGLESIAS EVANGÉLICAS LIBRES ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("PENTECOSTALES DE VENEZUELA SALEM ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("COMISIÓN NACIONAL ELECTORAL FIELPVS ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("CONEF")), 0, 'C', false);
    $pdf->Ln(9);
    $pdf->SetFont('Arial', 'B', 11);

    $iddependencia = $request->input('iddependencia');
    $idambito = $request->input('idambito');

    $idcircuito = $request->input('circuito');

  $sqlcircuito = "
    SELECT nombre 
    FROM circuitos 
    WHERE id = ? 
    LIMIT 1
";

$nombrecircuito = DB::select($sqlcircuito, [$idcircuito]);



$idzona = $request->input('zona_id');

  $sqlzona = "
    SELECT nombre 
    FROM zonas 
    WHERE id = ? 
    LIMIT 1
";

$zona = DB::select($sqlzona, [$idzona]);

$ambito='Zonal';


$nombre = isset($nombrecircuito[0]) ? $nombrecircuito[0]->nombre : null;

$nombrezona = isset($zona[0]) ? $zona[0]->nombre : null;

    $anio = $request->input('anio');

    $nombredependencia = Dependencia::where('id', $iddependencia)->value('nombre');
    $nombreambito = Ambitodependencias::where('id', $idambito)->value('nombre');
    $currentYear = date('Y'); // Año actual

    $sql = "
       SELECT 
            d.id,
            ci.nombre as circuito,
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
        
        INNER JOIN iglesias i ON i.id=ri.id_iglesia
        INNER JOIN zonas z ON z.id= i.zona_id 
        INNER JOIN circuitos ci ON ci.id=z.circuito_id 
        LEFT JOIN 
            elecciones e ON e.id_candidato = ca.id AND YEAR(e.created_at) = ?
        WHERE 
            d.id = ?
            AND ad.id = ?
            AND ci.id=?
            AND z.id=?
        GROUP BY 
            d.id, 
            c.id, 
            r.nombres, 
            r.apellidos, 
            r.cedula,
            r.imagen,
            c.nombre,
            ci.nombre
            ORDER BY 
            c.orden ASC 
        LIMIT 0, 200
    ";

    $dependencia = DB::select($sql, [$anio, $iddependencia, $idambito, $idcircuito , $idzona]);




    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("RESULTADO DE ELECIONES: $anio ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("DEPENDENCIA: $nombredependencia  | ÁMBITO: $ambito | CIRCUITO: $nombre | ZONA: $nombrezona ")), 0, 'C', false);

    $imagelogofielvs = public_path('imagen/logos/60year.png');
    $pdf->Image($imagelogofielvs, 10, 17, 45, 0, 'PNG');
    $imagelogoconef = public_path('imagen/logos/CONEF.png');
    $pdf->Image($imagelogoconef, 155, 17, 45, 0, 'PNG');

    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Ln(3);
    $pdf->SetLeftMargin(16);
    $pdf->Cell(7, 5, utf8_decode("N°"), 1);
    $pdf->Cell(25, 5, utf8_decode("CEDULA"), 1, 0, 'C');
    $pdf->Cell(90, 5, "NOMBRES Y APELLIDOS", 1, 0, 'C');
    $pdf->Cell(18, 5, "VOTOS", 1, 0, 'C');
    $pdf->Cell(18, 5, "%", 1, 0, 'C');
    $pdf->Cell(25, 5, "CONDICION", 1);
    $pdf->Ln(4);



    $ultimocargo = '';
    $sumaResultado = 0;
    $contador = 0;
    $ganadores = []; // Lista para almacenar los IDs de los candidatos ganadores

    // Agrupar candidatos por cargo
    $candidatosPorCargo = [];
    foreach ($dependencia as $item) {
        $candidatosPorCargo[$item->idcargo][] = $item;
    }

    foreach ($candidatosPorCargo as $idcargo => $candidatos) {
        // Ordenar candidatos por la cantidad de votos
        usort($candidatos, function ($a, $b) {
            return $b->candidatos_count - $a->candidatos_count;
        });

        $ganador = null;
        $empate = false;

        // Verificar si hay empate
        if (count($candidatos) > 1 && $candidatos[0]->candidatos_count == $candidatos[1]->candidatos_count) {
            $empate = true;
        } else {
            // Si no hay empate, el primer candidato es el ganador
            $ganador = $candidatos[0];
            $ganadores[] = $candidatos[0]->cedula; // Marcar como ganador
        }

        $totalVotosPorCargo = array_sum(array_map(function ($candidato) {
            return $candidato->candidatos_count;
        }, $candidatos));

        $pdf->SetLeftMargin(95);

        foreach ($candidatos as $item) {
            $cargo = $item->nombrecargo;

            if ($cargo != $ultimocargo) {
                if ($ultimocargo != '') {
                    $pdf->Ln(3);
                    $pdf->SetLeftMargin(95);
                    $pdf->Cell(43, 5, "Total Votos", 1, 0, 'C');
                    $pdf->Cell(18, 5, "$sumaResultado", 1, 1, 'C');
                }
                
                $pdf->SetLeftMargin(16);
                $pdf->SetFont('Arial', 'B', 11);
                $pdf->Cell(30, 10, utf8_decode(strtoupper($cargo)), 0, 1, 'C');
                $pdf->SetFont('Arial', '', 11);
                $ultimocargo = $cargo;
                $sumaResultado = 0;
            }

            $contador++;
            $sumaResultado += $item->candidatos_count;
            
            if ($totalVotosPorCargo > 0) {
    $porcentaje = ($item->candidatos_count / $totalVotosPorCargo) * 100;
} else {
    $porcentaje = 0;  // Si $totalVotosPorCargo es 0, establece el porcentaje en 0
}

            $pdf->Cell(7, 5, utf8_decode("$contador"), 1, 0, 'C');
            $pdf->Cell(25, 5, utf8_decode("$item->cedula"), 1, 0, 'C');
            $pdf->Cell(90, 5, utf8_decode("$item->nombres $item->apellidos"), 1, 0, 'C');
            $pdf->Cell(18, 5, "$item->candidatos_count", 1, 0, 'C');
            $pdf->Cell(18, 5, intval($porcentaje), 1, 0, 'C');

            if ($cargo == 'Vocales') {
                // Seleccionar los tres candidatos con más votos como ganadores
                $topVocales = array_slice($candidatos, 0, 3);
                if (in_array($item->cedula, array_column($topVocales, 'cedula'))) {
                    $pdf->Cell(25, 5, "Ganador", 1, 0, 'C');
                } else {
                    $pdf->Cell(25, 5, "", 1, 0, 'C');
                }
            } else {
                // Marcar "Ganador" o "Empate" según corresponda
                if ($empate && $item->candidatos_count == $candidatos[0]->candidatos_count) {
                    $pdf->Cell(25, 5, "Empate", 1, 0, 'C');
                } else {
                    $pdf->Cell(25, 5, $item === $ganador ? "Ganador" : "", 1, 0, 'C');
                }
            }

            $pdf->Ln(5);

        }

        // Mostrar el total de votos para el último cargo
        
    }

    $pdf->Ln(5);

     $pdf->SetLeftMargin(95);
                    $pdf->Cell(43, 5, "Total Votos", 1, 0, 'C');
                    $pdf->Cell(18, 5, "$sumaResultado", 1, 1, 'C');

 

    $nombreArchivo = strtoupper("RESULTADO_{$nombredependencia}_{$ambito}_{$anio}.pdf");

// Guardar o mostrar el archivo con el nombre dinámico
   $pdf->Output('I', $nombreArchivo);

    $pdf->Output();
    exit;
}



public function resultadolocal(Request $request)
{
    $pdf = new FPDFWrapper();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Ln(7);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("FEDERACIÓN DE IGLESIAS EVANGÉLICAS LIBRES ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("PENTECOSTALES DE VENEZUELA SALEM ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("COMISIÓN NACIONAL ELECTORAL FIELPVS ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("CONEF")), 0, 'C', false);
    $pdf->Ln(9);
    $pdf->SetFont('Arial', 'B', 11);

    $iddependencia = $request->input('iddependencia');
    $idambito =4;

    $idcircuito = $request->input('circuito');

  $sqlcircuito = "
    SELECT nombre 
    FROM circuitos 
    WHERE id = ? 
    LIMIT 1
";

$nombrecircuito = DB::select($sqlcircuito, [$idcircuito]);

$idzona = $request->input('zona_id');

$idiglesia = $request->input('iglesia');

  $sqlzona = "
    SELECT nombre 
    FROM zonas 
    WHERE id = ? 
    LIMIT 1
";

$zona = DB::select($sqlzona, [$idzona]);

$ambito='Local';


$nombre = isset($nombrecircuito[0]) ? $nombrecircuito[0]->nombre : null;

$nombrezona = isset($zona[0]) ? $zona[0]->nombre : null;

    $anio = $request->input('anio');
    $idiglesia = $request->input('iglesia');

     $nombreiglesia = Iglesia::where('id', $idiglesia)->value('nombre');

    $nombredependencia = Dependencia::where('id', $iddependencia)->value('descripcion_local');
    $nombreambito = Ambitodependencias::where('id', $idambito)->value('nombre');
    $currentYear = date('Y'); // Año actual

    $sql = "
       SELECT 
            d.id,
            ci.nombre as circuito,
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
        
        INNER JOIN iglesias i ON i.id=ri.id_iglesia
        INNER JOIN zonas z ON z.id= i.zona_id 
        INNER JOIN circuitos ci ON ci.id=z.circuito_id 
        LEFT JOIN 
            elecciones e ON e.id_candidato = ca.id AND YEAR(e.created_at) = ?
        WHERE 
            YEAR(ca.created_at) = ?
            AND  d.id = ?
            AND ad.id = ?
            AND ci.id=?
            AND z.id=?
            AND i.id=?
        GROUP BY 
            d.id, 
            c.id, 
            r.nombres, 
            r.apellidos, 
            r.cedula,
            r.imagen,
            c.nombre,
            ci.nombre
             ORDER BY 
            c.orden ASC

        LIMIT 0, 25
    ";


    $dependencia = DB::select($sql, [$anio,$anio,$iddependencia, $idambito, $idcircuito , $idzona,$idiglesia]);



    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("RESULTADO DE ELECIONES: $anio ")), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("DEPENDENCIA: $nombredependencia  | ÁMBITO: $ambito | CIRCUITO: $nombre | ZONA: $nombrezona | IGLESIA: $nombreiglesia   ")), 0, 'C', false);

    $imagelogofielvs = public_path('imagen/logos/60year.png');
    $pdf->Image($imagelogofielvs, 10, 17, 45, 0, 'PNG');
    $imagelogoconef = public_path('imagen/logos/CONEF.png');
    $pdf->Image($imagelogoconef, 155, 17, 45, 0, 'PNG');

    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Ln(3);
    $pdf->SetLeftMargin(16);
    $pdf->Cell(7, 5, utf8_decode("N°"), 1);
    $pdf->Cell(25, 5, utf8_decode("CEDULA"), 1, 0, 'C');
    $pdf->Cell(90, 5, "NOMBRES Y APELLIDOS", 1, 0, 'C');
    $pdf->Cell(18, 5, "VOTOS", 1, 0, 'C');
    $pdf->Cell(18, 5, "%", 1, 0, 'C');
    $pdf->Cell(25, 5, "CONDICION", 1);
    $pdf->Ln(4);



    $ultimocargo = '';
    $sumaResultado = 0;
    $contador = 0;
    $ganadores = []; // Lista para almacenar los IDs de los candidatos ganadores

    // Agrupar candidatos por cargo
    $candidatosPorCargo = [];
    foreach ($dependencia as $item) {
        $candidatosPorCargo[$item->idcargo][] = $item;
    }

    foreach ($candidatosPorCargo as $idcargo => $candidatos) {
        // Ordenar candidatos por la cantidad de votos
        usort($candidatos, function ($a, $b) {
            return $b->candidatos_count - $a->candidatos_count;
        });

        $ganador = null;
        $empate = false;

        // Verificar si hay empate
        if (count($candidatos) > 1 && $candidatos[0]->candidatos_count == $candidatos[1]->candidatos_count) {
            $empate = true;
        } else {
            // Si no hay empate, el primer candidato es el ganador
            $ganador = $candidatos[0];
            $ganadores[] = $candidatos[0]->cedula; // Marcar como ganador
        }

        $totalVotosPorCargo = array_sum(array_map(function ($candidato) {
            return $candidato->candidatos_count;
        }, $candidatos));

        $pdf->SetLeftMargin(95);

        foreach ($candidatos as $item) {
            $cargo = $item->nombrecargo;

            if ($cargo != $ultimocargo) {
                if ($ultimocargo != '') {
                    $pdf->Ln(3);
                    $pdf->SetLeftMargin(95);
                    $pdf->Cell(43, 5, "Total Votos", 1, 0, 'C');
                    $pdf->Cell(18, 5, "$sumaResultado", 1, 1, 'C');
                }
                
                $pdf->SetLeftMargin(16);
                $pdf->SetFont('Arial', 'B', 11);
                $pdf->Cell(30, 10, utf8_decode(strtoupper($cargo)), 0, 1, 'C');
                $pdf->SetFont('Arial', '', 11);
                $ultimocargo = $cargo;
                $sumaResultado = 0;
            }

            $contador++;
            $sumaResultado += $item->candidatos_count;
            
            if ($totalVotosPorCargo > 0) {
    $porcentaje = ($item->candidatos_count / $totalVotosPorCargo) * 100;
} else {
    $porcentaje = 0;  // Si $totalVotosPorCargo es 0, establece el porcentaje en 0
}

            $pdf->Cell(7, 5, utf8_decode("$contador"), 1, 0, 'C');
            $pdf->Cell(25, 5, utf8_decode("$item->cedula"), 1, 0, 'C');
            $pdf->Cell(90, 5, utf8_decode("$item->nombres $item->apellidos"), 1, 0, 'C');
            $pdf->Cell(18, 5, "$item->candidatos_count", 1, 0, 'C');
            $pdf->Cell(18, 5, intval($porcentaje), 1, 0, 'C');

            if ($cargo == 'Vocales') {
                // Seleccionar los tres candidatos con más votos como ganadores
                $topVocales = array_slice($candidatos, 0, 3);
                if (in_array($item->cedula, array_column($topVocales, 'cedula'))) {
                    $pdf->Cell(25, 5, "Ganador", 1, 0, 'C');
                } else {
                    $pdf->Cell(25, 5, "", 1, 0, 'C');
                }
            } else {
                // Marcar "Ganador" o "Empate" según corresponda
                if ($empate && $item->candidatos_count == $candidatos[0]->candidatos_count) {
                    $pdf->Cell(25, 5, "Empate", 1, 0, 'C');
                } else {
                    $pdf->Cell(25, 5, $item === $ganador ? "Ganador" : "", 1, 0, 'C');
                }
            }

            $pdf->Ln(5);

        }

        // Mostrar el total de votos para el último cargo
        
    }

    $pdf->Ln(5);

     $pdf->SetLeftMargin(95);
                    $pdf->Cell(43, 5, "Total Votos", 1, 0, 'C');
                    $pdf->Cell(18, 5, "$sumaResultado", 1, 1, 'C');

 

    $nombreArchivo = strtoupper("RESULTADO_{$nombredependencia}_{$ambito}_{$anio}.pdf");

// Guardar o mostrar el archivo con el nombre dinámico
   $pdf->Output('I', $nombreArchivo);

    $pdf->Output();
    exit;
}



public function comprobante(Request $request)
{



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

date_default_timezone_set('America/Caracas');

$fecha= now()->format('d-m-Y'); // Fecha en formato YYYY-MM-DD
$hora = now()->format('h:i A'); 








 // Crear un nuevo PDF con dimensiones específicas
    $pdf = new FPDFWrapper('P', 'mm', array(80, 170));
    $pdf->SetMargins(4, 10, 4);
    $pdf->AddPage();

    // Configurar la fuente y el color del texto
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->SetTextColor(0, 0, 0);

    // Añadir espacio en blanco
    $pdf->Ln(3);

    // Agregar textos en el PDF
    
    
     $imagelogofielvs = public_path('imagen/logos/CONEF.png');
    $pdf->Image($imagelogofielvs,17, 10, 50, 0, 'PNG');

     $currentYear = date('Y'); // Año actual

       $pdf->Ln(25);

       $pdf->SetFont('Arial', 'B', 12);

     $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper(" $nombredeeleccion: $currentYear ")), 0, 'C', false);

      $pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","---------------------------------------------------------"),0,0,'C');

$pdf->Ln(3);

 $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","DEPARTAMENTO:"),0,'C',false);


    $pdf->SetFont('Arial', 'B', 11);

 $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1"," $nombredepartamento"),0,'C',false);

  $pdf->SetFont('Arial', 'B', 10);

 $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","FECHA: $fecha  HORA:$hora "),0,'C',false);



      $pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------------"),0,0,'C');

$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 12);
      $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Su Elección:"),0,'C',false);

$pdf->SetFont('Arial', '', 12);
     $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Cargos: "),0,'',false);


$pdf->Ln(3);

//dd($request);

$cargos = $request->cargo;         // Ejemplo: ["Presidente", "Vicepresidente"]
$nombres = $request->nombres; // Ejemplo: ["237", "238"]
$apellidos = $request->apellidos;


$contador = 1; 

// Verifica que ambos arrays tengan la misma longitud
if (count($cargos) == count($nombres)) {
    // Iteración sobre los cargos y idcandidatos
    foreach ($cargos as $index => $cargo) {
        $nombre = Str::title(strtolower($nombres[$index]));
         $apellido = Str::title(strtolower($apellidos[$index]));

         $cargoM=strtoupper($cargo);
$pdf->SetFont('Arial', '', 11);

        $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","$contador. $cargoM : $nombre $apellido"),0,'0',false);

    $pdf->Ln(2); 

           $contador++;
       }
      
    
} else {
    // Manejo de error si los arrays no tienen la misma longitud
    echo "Los arrays de cargos e idcandidatos no tienen la misma longitud.";
}


    

 $imagelogofielvs2 = public_path('imagen/fielpvs.png');
    $pdf->Image($imagelogofielvs2,14, 140, 50, 0, 'PNG');


    // Añadir más espacio en blanco
    $pdf->Ln(9);

    // Definir el nombre del archivo
    $nombreArchivo = 'comprobante.pdf';

    // Generar y enviar el PDF al navegador
    $pdf->Output('I', $nombreArchivo);

    // Terminar el script
    exit;



 }





}