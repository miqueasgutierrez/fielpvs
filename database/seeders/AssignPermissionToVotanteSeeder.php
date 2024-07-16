<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AssignPermissionToVotanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear o encontrar el permiso con el guard 'web'
        $permiso = Permission::firstOrCreate(
            ['name' => 'view-members', 'guard_name' => 'web']
        );
        
        // Crear o encontrar el rol 'votante' con el guard 'web'
        $rolUsuario = Role::firstOrCreate(
            ['name' => 'votante', 'guard_name' => 'web']
        );

        // Asignar el permiso a todos los usuarios con el rol 'votante'
        $this->assignPermissionToRole('votante', 'view-members');
    }

    /**
     * Asigna un permiso a todos los usuarios con un rol específico.
     *
     * @param string $roleName
     * @param string $permissionName
     * @return void
     */
    private function assignPermissionToRole($roleName, $permissionName)
    {
        // Obtener el rol y el permiso
        $role = Role::where('name', $roleName)->where('guard_name', 'web')->first();
        $permission = Permission::where('name', $permissionName)->where('guard_name', 'web')->first();

        if ($role && $permission) {
            // Obtener todos los usuarios con el rol específico
            $users = User::role($roleName)->get();

            // Asignar el permiso a cada usuario
            foreach ($users as $user) {
                if (!$user->hasPermissionTo($permission)) {
                    $user->givePermissionTo($permission);
                }
            }
        }
    }
}