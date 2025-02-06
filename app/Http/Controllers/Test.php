<?php

namespace App\Http\Controllers;

use App\Services\Suma;
use Illuminate\Http\Request;

class Test extends Controller //controler que se usará para los tests unicamente//
{

    public function sumar($n1, $n2)
    {
        return (new Suma())->calcular($n1, $n2);
    }

}
