<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AttachSanctumCookie
{

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (Auth::check()) {
            $token = Auth::user()->currentAccessToken(); // Obtiene el token
            if ($token) {
                $response->cookie(
                    'sanctum_token',
                    $token->plainTextToken, // Usar el token en texto plano
                    1440,
                    '/',
                    '127.0.0.1', // Dominio explícito
                    false,        // Secure
                    true,         // HttpOnly
                    false,
                    'Lax'
                );
            }
        }

        return $response;
    }
}
