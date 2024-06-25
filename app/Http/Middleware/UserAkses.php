<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (!is_array($roles) || empty($roles)) {
                abort(403, 'Unauthorized action.');
            }

            if (in_array($user->role, $roles)) {
                return $next($request);
            }
        }
        abort(403, 'Unauthorized action.');
    }
}
