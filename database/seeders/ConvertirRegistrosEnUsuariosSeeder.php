<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registro;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class ConvertirRegistrosEnUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todos los registros
        $registros = Registro::all();

        // Definir el rol que deseas asignar
        $rolUsuario = Role::firstOrCreate(['name' => 'votante']);

        
        // Recorrer los registros y crear usuarios
        foreach ($registros as $registro) {

              $user = User::where('name', $registro->cedula)->first();
            
            if (!$user) {

            // Crear un nuevo usuario
            $user = new User();
            $user->name = $registro->cedula;

            // Obtener el año de la fecha de nacimiento
            $yearOfBirth = Carbon::parse($registro->fecha_nacimiento)->year;

            // Usar el año como contraseña y encriptarla
            $user->password = Hash::make($yearOfBirth);
            $user->save();

            // Asignar el rol al usuario
            $user->assignRole($rolUsuario);

            // Asignar el permiso al usuario
    
    }
    
        } // Cierre del bucle foreach
    } // Cierre del método run
}