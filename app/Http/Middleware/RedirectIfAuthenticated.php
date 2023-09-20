<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
                $userRole = auth()->user()->role;
                if ($userRole === UserRoleEnum::ADMIN ) {
                    return to_route('admin.dashboard');
                }
                if ($userRole === UserRoleEnum::DEPARTMENT_OFFICER ) {
                    return to_route('department.dashboard');
                }
                if ($userRole === UserRoleEnum::DEAN ) {
                    return to_route('dean.dashboard');
                }
                else{
                    dd($userRole);
                }
            }
        }

        return $next($request);
    }
}
