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


           $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("RESULTADO DE ELECIONES")),0,'C',false);

           $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("DEPENDENCIA: $nombredependencia  | ÁMBITO:$nombreambito")),0,'C',false);
        
         $imagelogofielvs = public_path('imagen\logos\60year.png');
        // Inserta la imagen en el PDF
        $pdf->Image($imagelogofielvs, 10, 17, 45, 0, 'PNG');

     
         $imagelogoconef = public_path('imagen\logos\CONEF.png');
        // Inserta la imagen en el PDF
        $pdf->Image($imagelogoconef, 155, 17, 45, 0, 'PNG');
           $pdf->SetFont('Arial', 'B', 11);


 $pdf->Ln(3);

  $pdf->SetLeftMargin(16);
     $pdf->Cell(25,5, utf8_decode("CEDULA"), 1, 0, 'C');
    $pdf->Cell(90,5, "NOMBRES Y APELLIDOS", 1, 0, 'C');
    $pdf->Cell(20,5,"VOTOS ", 1, 0, 'C');
    $pdf->Cell(20,5,"%",1, 0, 'C');
     $pdf->Cell(25,5,"CONDICION",1);
$pdf->Ln(4);

$ultimocargo = '';


foreach ($dependencia as $item) {


    $cargo =  $item->nombrecargo ;

    if ($cargo != $ultimocargo) {
    
    $pdf->Cell(175, 10, strtoupper($item->nombrecargo), 0, 1, 'C');

              $ultimocargo = $item->nombrecargo;

            }

        


        
     $pdf->Cell(25,5, utf8_decode("$item->cedula"), 1, 0, 'C');
    $pdf->Cell(90,5, "$item->nombres $item->apellidos", 1, 0, 'C');
    $pdf->Cell(20,5,"$item->candidatos_count", 1, 0, 'C');
    $pdf->Cell(20,5,"",1, 0, 'C');
     $pdf->Cell(25,5,"",1);
      $pdf->Ln(5);

  }


$pdf->Output('D', 'Resultados.pdf');

        $pdf->Output();

        exit;
  

     } 
}
