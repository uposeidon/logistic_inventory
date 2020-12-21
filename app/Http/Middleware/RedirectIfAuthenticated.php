<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use App\Role\UserRole;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->hasRole(UserRole::ROLE_ADMIN)){
                return redirect(RouteServiceProvider::ADMIN_HOME);
            }
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
