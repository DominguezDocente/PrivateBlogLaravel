<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            // Sections
            ['code' => 'sections.show', 'description' => 'Ver Secciones', 'module' => 'Secciones'],
            ['code' => 'sections.create', 'description' => 'Crear Secciones', 'module' => 'Secciones'],
            ['code' => 'sections.update', 'description' => 'Editar Secciones', 'module' => 'Secciones'],
            ['code' => 'sections.delete', 'description' => 'Eliminar Secciones', 'module' => 'Secciones'],

            // Users
            ['code' => 'users.show', 'description' => 'Ver Usuarios', 'module' => 'Usuarios'],
            ['code' => 'users.create', 'description' => 'Crear Usuarios', 'module' => 'Usuarios'],
            ['code' => 'users.update', 'description' => 'Editar Usuarios', 'module' => 'Usuarios'],
            ['code' => 'users.delete', 'description' => 'Eliminar Usuarios', 'module' => 'Usuarios'],

            // Roles
            ['code' => 'roles.show', 'description' => 'Ver Roles', 'module' => 'Roles'],
            ['code' => 'roles.create', 'description' => 'Crear Roles', 'module' => 'Roles'],
            ['code' => 'roles.update', 'description' => 'Editar Roles', 'module' => 'Roles'],
            ['code' => 'roles.delete', 'description' => 'Eliminar Roles', 'module' => 'Roles'],

        ];


        foreach($permissions as $permission) {

            $tmpPermission = Permission::where('code', '=', $permission['code'])
                                       ->first();

            if (empty($tmpPermission)) {

                $newPermission = new Permission();
                $newPermission->code = $permission['code'];
                $newPermission->description = $permission['description'];
                $newPermission->module = $permission['module'];
                $newPermission->save();
            }
        }
    }
}
