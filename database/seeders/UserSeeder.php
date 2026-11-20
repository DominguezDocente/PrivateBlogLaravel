<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        // Admin
        $adminRole = new Role();
        $adminRole->name = 'Administrador';
        $adminRole->save();

        $contentManagerRole = new Role();
        $contentManagerRole->name = 'Content Manager';
        $contentManagerRole->save();

        $contentManagerPermissions = Permission::where('module', '=', 'Secciones')
                                               ->get();

        foreach($contentManagerPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $contentManagerRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Users
        // Admin
        $user = new User();
        $user->first_name = "Super";
        $user->last_name = "Admin";
        $user->document = "1111";
        $user->email = "admin@privateblog.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $adminRole->id;
        $user->save();

        // Content Manager
        $user = new User();
        $user->first_name = "Jhon";
        $user->last_name = "Doe";
        $user->document = "2222";
        $user->email = "jhond@privateblog.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $contentManagerRole->id;
        $user->save();
    }
}
