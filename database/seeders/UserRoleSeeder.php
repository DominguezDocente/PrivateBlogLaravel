<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        $adminRole = new Role();
        $adminRole->name = 'Administrador';
        $adminRole->save();

        //Blogs Role
        $blogsRole = new Role();
        $blogsRole->name = 'Gestor de blogs';
        $blogsRole->save();

        $blogPermissions = Permission::where('module', '=', 'Blogs')
                                     ->get();

        foreach($blogPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $blogsRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Sections Role
        $sectionsRole = new Role();
        $sectionsRole->name = 'Gestor de Secciones';
        $sectionsRole->save();

        $sectionPermissions = Permission::where('module', '=', 'Secciones')
                                     ->get();

        foreach($sectionPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $sectionsRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Users

        $user = new User();
        $user->first_name = 'Manuel';
        $user->last_name = 'Dominguez';
        $user->document = '12345678';
        $user->email = 'manueld@yopmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $adminRole->id;
        $user->save();

        $user = new User();
        $user->first_name = 'Ana';
        $user->last_name = 'Doe';
        $user->document = '2222';
        $user->email = 'anad@yopmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $blogsRole->id;
        $user->save();

        $user = new User();
        $user->first_name = 'Jhon';
        $user->last_name = 'Doe';
        $user->document = '3333';
        $user->email = 'jhond@yopmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $sectionsRole->id;
        $user->save();
    }
}
