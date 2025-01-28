<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware // Extiende la clase base
{
    protected $except = [
        'sanctum_token' // Excluir esta cookie de la encriptación
    ];
}
