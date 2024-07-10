<?php

namespace App\Http\Controllers;

use App\Libraries\FPDF\FPDFWrapper;

use Illuminate\Http\Request;

use App\Models\Dependencia;

use App\Models\Registro;

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
        $pdf->SetTextColor(0,0,0);
         $pdf->Ln(7);
        $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("FEDERACIÓN DE IGLESIAS EVANGÉLICAS LIBRES ")),0,'C',false);
        
         $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("PENTECOSTALES DE VENEZUELA SALEM ")),0,'C',false);

         $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("COMISIÓN NACIONAL ELECTORAL FIELPVS ")),0,'C',false);

           $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("CONEF")),0,'C',false);

 $pdf->Ln(9);
           $pdf->SetFont('Arial', 'B', 12);



           $totalvotos=0;
            $totalvotoscargos=0;


            $numResultadovista = 0;

           $iddependencia = $request->input('iddependencia');
           $idambito = $request->input('idambito');

            $nombredependencia=Dependencia::where('id', $iddependencia)->value('nombre');
 $nombreambito=Ambitodependencias::where('id', $idambito)->value('nombre');


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

        $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("RESULTADO DE ELECIONES")),0,'C',false);
        $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("DEPENDENCIA: $nombredependencia  | ÁMBITO:$nombreambito")),0,'C',false);
        
        $imagelogofielvs = public_path('imagen\logos\60year.png');
        $pdf->Image($imagelogofielvs, 10, 17, 45, 0, 'PNG');
        $imagelogoconef = public_path('imagen\logos\CONEF.png');
        $pdf->Image($imagelogoconef, 155, 17, 45, 0, 'PNG');

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Ln(3);
        $pdf->SetLeftMargin(16);
        $pdf->Cell(7,5, utf8_decode("N°"), 1);
        $pdf->Cell(25,5, utf8_decode("CEDULA"), 1, 0, 'C');
        $pdf->Cell(90,5, "NOMBRES Y APELLIDOS", 1, 0, 'C');
        $pdf->Cell(18,5,"VOTOS ", 1, 0, 'C');
        $pdf->Cell(18,5,"%",1, 0, 'C');
        $pdf->Cell(25,5,"CONDICION",1);
        $pdf->Ln(4);

        $ultimocargo = '';
        $sumaResultado = 0;
        $contador = 0;

        // Agrupar candidatos por cargo
        $candidatosPorCargo = [];
        foreach ($dependencia as $item) {
            $candidatosPorCargo[$item->idcargo][] = $item;
        }

        foreach ($candidatosPorCargo as $idcargo => $candidatos) {
            // Determinar el ganador por cargo
            usort($candidatos, function($a, $b) {
                return $b->candidatos_count - $a->candidatos_count;
            });

            $ganador = $candidatos[0]; // El primer candidato después de ordenar es el ganador
            $totalVotosPorCargo = array_sum(array_map(function($candidato) {
                return $candidato->candidatos_count;
            }, $candidatos));

            foreach ($candidatos as $item) {
                $cargo = $item->nombrecargo;

                if ($cargo != $ultimocargo) {
                    if ($ultimocargo != '') {
                        $pdf->Ln(3);
                        $pdf->SetLeftMargin(95);
                        $pdf->Cell(43,5, "Total Votos", 1, 0, 'C');
                        $pdf->Cell(18,5,"$sumaResultado",1, 1, 'C');
                    }

                     $pdf->SetLeftMargin(95);

                    $pdf->SetLeftMargin(16);
                    $pdf->SetFont('Arial', 'B', 11);
                    $pdf->Cell(30, 10, utf8_decode(strtoupper($cargo)), 0, 1, 'C');
                    $pdf->SetFont('Arial', '', 11);
                    $ultimocargo = $cargo;
                    $sumaResultado = 0;
                }

                $contador++;
                $sumaResultado += $item->candidatos_count;

                $porcentaje = ($item->candidatos_count / $totalVotosPorCargo) * 100;

                $pdf->SetLeftMargin(16);
                $pdf->Cell(7,5, utf8_decode("$contador"), 1);
                $pdf->Cell(25,5, utf8_decode("$item->cedula"), 1, 0, 'C');
                $pdf->Cell(90,5, utf8_decode("$item->nombres $item->apellidos"), 1, 0, 'C');
                $pdf->Cell(18,5, "$item->candidatos_count", 1, 0, 'C');
                $pdf->Cell(18, 5, intval($porcentaje ), 1, 0, 'C');
                $pdf->Cell(25,5, $item == $ganador ? "Ganador" : "", 1, 0, 'C');
                $pdf->Ln(5);
                $totalvotos += $item->candidatos_count;
            }
        }

        // Mostrar el total de votos para el último cargo
        if ($ultimocargo != '') {
            $pdf->Ln(3);
            $pdf->SetLeftMargin(95);
            $pdf->Cell(43,5, "Total Votos", 1, 0, 'C');
            $pdf->Cell(18,5,"$sumaResultado",1, 1, 'C');
        }

        // Total general de votos
        $pdf->Ln(3);
        $pdf->SetLeftMargin(95);
        $pdf->Cell(43,5, "Total General de Votos", 1, 0, 'C');
        $pdf->Cell(18,5,"$totalvotos",1, 1, 'C');

        $pdf->Output();
        exit;
    }
}