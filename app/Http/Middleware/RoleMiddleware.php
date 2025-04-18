<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = Auth::user(); // langsung tangkap user

        if (!$user || $user->role->name !== $role) {
            abort(403, 'Anda tidak memiliki izin untuk akses ini.');
        }

        return $next($request);
    }
}
