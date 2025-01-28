<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InjectSanctumToken
{
    public function handle(Request $request, Closure $next)
    {
        // Inyectar token desde la cookie a los headers
        if ($token = $request->cookie('sanctum_token')) {
            $request->headers->set('Authorization', "Bearer $token");
        }

        return $next($request);
    }
}
