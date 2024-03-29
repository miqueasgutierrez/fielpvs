<?php

namespace App\Imports;

use App\Models\Registro;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RegistrosImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)

    {


        // Invertir el formato de fecha de dd/mm/yyyy a yyyy-mm-dd
    $fecha_nacimiento = date('Y-m-d', strtotime($row['fecha_nacimiento']));
    $fecha_uncion = date('Y-m-d', strtotime($row['fecha_uncion']));

    // Buscar si ya existe un registro con la misma cédula
    $registro = Registro::where('cedula', $row['cedula'])->first();

    // Si existe, actualiza el registro, de lo contrario, crea uno nuevo
    if ($registro) {
        $registro->update([
            'nombres' => $row['nombres'],
            'apellidos' => $row['apellidos'],
            'imagen' => $row['imagen'],
            'telefono' => $row['telefono'],
            'fecha_nacimiento'=>  $fecha_nacimiento,
            'edad' => $row['edad'],  
            'genero' => $row['genero'],
            'profesion' => $row['profesion'],
             'ministerio' => $row['ministerio'],
            'dependencia' => $row['dependencia'],
            'circuito' => $row['circuito'],
            'zona' => $row['zona'],
            'direccion' => $row['direccion'],
            'estado_civil' => $row['estado_civil'],
            'ministro_ordenado' => $row['ministro_ordenado'],
            'fecha_uncion' => $fecha_uncion,
        ]);
    } else {
        // Si no existe, crea un nuevo registro
        $registro = Registro::create([
            'cedula'  => $row['cedula'],
            'nombres' => $row['nombres'],
            'apellidos' => $row['apellidos'],
            'imagen' => $row['imagen'],
            'telefono' => $row['telefono'],
            'fecha_nacimiento'=>  $fecha_nacimiento,
             'edad' => $row['edad'],  
            'genero' => $row['genero'],
             'profesion' => $row['profesion'],
             'ministerio' => $row['ministerio'],
              'dependencia' => $row['dependencia'],
               'circuito' => $row['circuito'],
               'zona' => $row['zona'],
               'direccion' => $row['direccion'],
                'estado_civil' => $row['estado_civil'],
              'ministro_ordenado' => $row['ministro_ordenado'],
               'fecha_uncion' => $fecha_uncion,
        ]);
    }

    return $registro;

           return view('registros.index', compact('registros'));
    }
}
