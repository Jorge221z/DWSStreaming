<?php
use PHPUnit\Framework\TestCase;
//Test de el helper(helpers.php) que convierten fechas a otros formatos//


class HelperTest extends TestCase {
public function test(): void {

    $salida1 = helper1('2020-04-20');
    expect($salida1)->toBe('20/04/2020');

    $salida2 = helper1('');
    expect($salida2)->toBeFalse();

//------TESTS DE LA SEGUNDA FUNCION DEL HELPER---//

    $salida3 = helper2('07/11/2029');
    expect($salida3)->toBe('2029-11-07');

    $salida4 = helper2('');
    expect($salida4)->toBeFalse();
}
}


