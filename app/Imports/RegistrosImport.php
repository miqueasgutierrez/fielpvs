<?php

namespace App\Imports;

use App\Models\Registro;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Carbon\Carbon;

class RegistrosImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)

    {

         ini_set('max_execution_time', 500);


        
         $result = $row['fecha_nacimiento'];



       $fecha = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($result));
            // Otros campos según sea necesario...


    // Buscar si ya existe un registro con la misma cédula
    $registro = Registro::where('cedula', $row['cedula'])->first();

    // Si existe, actualiza el registro, de lo contrario, crea uno nuevo
    if ($registro) {
        $registro->update([
             'cedula' => $row['cedula'],
            'apellidos' => $row['apellidos'],
            'nombres' => $row['nombres'],
            'edad' => $row['edad'],
            'fecha_nacimiento'=> $fecha->format('Y-m-d'),
            'telefono' => $row['telefono'],
            'estado_civil' => $row['estado_civil'], 
            'genero' => $row['genero'], 
            'profesion' => $row['profesion'],
            'pastor' => $row['pastor'],
            'ministro_ungido' => $row['ministro_ungido'],
            'fecha_uncion' => $row['fecha_uncion'],   
        ]);
    } else {
        // Si no existe, crea un nuevo registro
        $registro = Registro::create([
             'cedula' => $row['cedula'],
            'apellidos' => $row['apellidos'],
            'nombres' => $row['nombres'],
            'edad' => $row['edad'],
            'fecha_nacimiento'=>  $fecha->format('Y-m-d'),
            'telefono' => $row['telefono'],
            'estado_civil' => $row['estado_civil'],
            'genero' => $row['genero'], 
            'profesion' => $row['profesion'],
            'pastor' => $row['pastor'],
            'ministro_ungido' => $row['ministro_ungido'], 
            'fecha_uncion' => $row['fecha_uncion'], 
        ]);
    }




    return $registro;

           return view('registros.index', compact('registros'));
    }
}
