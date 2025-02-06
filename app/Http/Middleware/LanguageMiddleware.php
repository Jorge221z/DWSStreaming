<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        // Si existe 'locale' en la sesión, se configura como idioma actual
        if (session()->has('locale')) {
            App::setLocale(session('locale'));
        }
        return $next($request);
    }
}
