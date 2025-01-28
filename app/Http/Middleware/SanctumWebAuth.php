<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SanctumWebAuth extends Middleware
{
    public function handle(Request $request, Closure $next) {
        if ($token = $request->cookie('sanctum_token')) {
            $request->headers->set('Authorization', "Bearer $token");
            // Autenticar sin forzar setUser si el token es inválido
            Auth::shouldUse('sanctum');
            try {
                $user = Auth::guard('sanctum')->user();
                if (!$user) {
                    throw new \Exception('Token inválido');
                }
            } catch (\Exception $e) {
                // Eliminar la cookie corrupta
                return redirect()
                    ->route('inicio')
                    ->withoutCookie('sanctum_token');
            }
        }
        return $next($request);
    }
}
