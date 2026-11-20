<?php

namespace App\Helpers;

use App\Models\Permission;
use Exception;
use Illuminate\Support\Facades\Auth;

class RoleHelper {

    private static function currentUserIsAdmin() {

        try {

            $role = Auth::user()->role->name;

            return $role == 'Administrador';

        } catch(Exception $ex) {

            dd($ex);
        }
    }

    public static function isAuthorized($permissionCode) {

        try {

            if (!Auth::check()) {

                return false;
            }

            if (RoleHelper::currentUserIsAdmin()) {

                return true;
            }

            $userId = Auth::user()->id;

            $permissionId = Permission::select('permissions.id')
                                      ->join('role_permissions', 'permissions.id', '=', 'role_permissions.permission_id')
                                      ->join('roles', 'role_permissions.role_id', '=', 'roles.id')
                                      ->join('users', 'roles.id', '=', 'users.role_id')
                                      ->where('permissions.code', '=', $permissionCode)
                                      ->where('users.id', '=', $userId)
                                      ->first();

            return $permissionId != null;

        } catch(Exception $ex) {

            dd($ex);
        }
    }
}
