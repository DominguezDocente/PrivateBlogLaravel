<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $adminRole = new Role();
        $adminRole->name = 'Administrador';
        $adminRole->save();

        // Blog role
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

        // Sections role
        $sectionsRole = new Role();
        $sectionsRole->name = 'Gestor de secciones';
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
        $user->last_name = 'Domínguez';
        $user->document = '123456789';
        $user->email = 'manueld@yopmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $adminRole->id;
        $user->save();

        $user = new User();
        $user->first_name = 'Jhon';
        $user->last_name = 'Doe';
        $user->document = '22222';
        $user->email = 'jhopd@yopmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $blogsRole->id;
        $user->save();

        $user = new User();
        $user->first_name = 'Ana';
        $user->last_name = 'Doe';
        $user->document = '333333';
        $user->email = 'anad@yopmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $sectionsRole->id;
        $user->save();
    }
}
