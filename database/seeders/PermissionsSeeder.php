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

            // Secciones
            ['name' => 'showSections', 'description' => 'Ver Secciones', 'module' => 'Secciones'],
            ['name' => 'createSections', 'description' => 'Crear Secciones', 'module' => 'Secciones'],
            ['name' => 'updateSections', 'description' => 'Actualizar Secciones', 'module' => 'Secciones'],
            ['name' => 'deleteSections', 'description' => 'Eliminar Secciones', 'module' => 'Secciones'],

            // Blogs
            ['name' => 'showBlogs', 'description' => 'Ver Blogs', 'module' => 'Blogs'],
            ['name' => 'createBlogs', 'description' => 'Crear Blogs', 'module' => 'Blogs'],
            ['name' => 'updateBlogs', 'description' => 'Actualizar Blogs', 'module' => 'Blogs'],
            ['name' => 'deleteBlogs', 'description' => 'Eliminar Blogs', 'module' => 'Blogs'],

            // Roles
            ['name' => 'showRoles', 'description' => 'Ver Roles', 'module' => 'Roles'],
            ['name' => 'createRoles', 'description' => 'Crear Roles', 'module' => 'Roles'],
            ['name' => 'updateRoles', 'description' => 'Actualizar Roles', 'module' => 'Roles'],
            ['name' => 'deleteRoles', 'description' => 'Eliminar Roles', 'module' => 'Roles'],

            // Usuarios
            ["name" => "showUsers", "description" => "Ver Usuarios", "module" => "Users"],
            ["name" => "createUsers", "description" => "Crear Usuarios", "module" => "Users"],
            ["name" => "updateUsers", "description" => "Editar Usuarios", "module" => "Users"],
            ["name" => "deleteUsers", "description" => "Eliminar Usuarios", "module" => "Users"],

        ];

        foreach($permissions as $permission) {

            $tmpPermission = Permission::where('name', '=', $permission['name'])
                                       ->where('module', '=', $permission['module'])
                                       ->first();

            if (empty($tmpPermission)) {

                $newPermission = new Permission();
                $newPermission->name = $permission['name'];
                $newPermission->description = $permission['description'];
                $newPermission->module = $permission['module'];
                $newPermission->save();
            }
        }
    }
}
