<?php

namespace App\Http\Middleware;

use App\Helpers\RoleHelper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthorizedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissionCode): Response
    {
        // Check if is logged in
        if (!Auth::check()) {

            return redirect()->route('login');
        }

        if (!empty($permissionCode)) {

            $isAuthorized = RoleHelper::isAuthorized($permissionCode);

            if (!$isAuthorized) {

                abort(403, 'No hay autorización');
            }
        }

        return $next($request);
    }
}
