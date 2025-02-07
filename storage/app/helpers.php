<?php
//EJERCICIO HELPERS//

function helper1($fechaMySql)
{
    $fecha = DateTime::createFromFormat('Y-m-d', $fechaMySql);

    // Verificar si la fecha es válida
    if ($fecha === false) {
        // Manejo del error, por ejemplo, devolver un mensaje predeterminado o lanzar una excepción
        return false;
    }

    return $fecha->format('d/m/Y'); // devuelve la fecha en formato dd/mm/yy
}


function helper2($fechaEsp)
{
    $fecha = DateTime::createFromFormat('d/m/Y', $fechaEsp);

    // Verificar si la fecha es válida
    if ($fecha === false) {
        // Manejo del error, por ejemplo, devolver un mensaje predeterminado o lanzar una excepción
        return false;
    }

    return $fecha->format('Y-m-d'); //devuelve la fecha en formato YYYY-mm-dd
}
