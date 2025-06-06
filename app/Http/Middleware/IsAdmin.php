<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (! $user || ! $user->is_admin) {
            abort(403, 'Acesso negado. Você precisa ser administrador para acessar esta área.');
        }

        return $next($request);
    }
}
