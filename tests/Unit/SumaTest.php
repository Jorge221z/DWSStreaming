<?php
namespace Tests\Unit;

use App\Services\Suma;
use PHPUnit\Framework\TestCase;


class SumaTest extends TestCase {
    public function test(): void {

    //instancia de la clase suma declarada en el controller//
    $suma = new Suma();

    //casos de prueba del test//
    expect($suma->calcular(2,4))->toBe(6);
    expect($suma->calcular(-1,2))->toBe(1);
    expect($suma->calcular(0,0))->toBe(0);

}
}
