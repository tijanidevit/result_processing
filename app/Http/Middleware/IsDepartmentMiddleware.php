<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsDepartmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role !== UserRoleEnum::DEPARTMENT_OFFICER ) {
            abort(403);
        }
        return $next($request);
    }
}
