<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user(); // langsung tangkap user

        if (!$user) {
            return redirect()->route('login');
        }

        // If no roles matched, deny access
        if (!in_array($user->role->name, $roles)) {
            abort(403, 'Anda tidak memiliki izin untuk akses ini.');
        }

        return $next($request);
    }
}
