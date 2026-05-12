<?php

namespace App\Helpers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class RoleHelper {


    public static function currentUserIsAdmin() {

        try {

            $role = Auth::user()->role->name;
            return $role == 'Administrador';

        } catch(Exception $ex) {

            dd($ex);
        }
    }

    // permission = 'module.permissionName'
    public static function isAuthorized($permission) {

        try {

            if (!Auth::check()) {

                return false;
            }

            if (RoleHelper::currentUserIsAdmin()) {

                return true;
            }

            $userId = Auth::user()->id;

            $user = User::where('id', '=', $userId)->with('role')->first();
            // $role = Role::with('permissions')->where('id', '=', $user->role_id)->first();

            // if ($permission != 'showSections') {

            //     dd($user->toArray(), $role->toArray(), $permission);
            // }

            $permissionId = Permission::select('permissions.id')
                                      ->join('role_permissions', 'permissions.id', 'role_permissions.permission_id')
                                      ->join('roles', 'role_permissions.role_id', 'roles.id')
                                      ->join('users', 'roles.id', 'users.role_id')
                                      ->where('permissions.name', '=', $permission)
                                      ->where('users.id', '=', $userId)
                                      ->first();

            // if ($permission != 'showSections') {

            //     dd($user->toArray(), $role->toArray(), $permission, $permissionId, $permissionId != null);
            // }

            return $permissionId != null;

        } catch(Exception $ex) {

            dd($ex);
        }

    }
}
