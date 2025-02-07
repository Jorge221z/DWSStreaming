<?php

require_once 'helpers.php'; //ubicación del archivo helpers.php

// Prueba de las funciones
$fechaMysql = '2025-01-18';
$fechaEsp = '18/01/2025';

// Probar conversión de MYSQL a Español
echo "Fecha MYSQL a Español: " . helper1($fechaMysql) . PHP_EOL;

// Probar conversión de Español a MYSQL
echo "Fecha Español a MYSQL: " . helper2($fechaEsp) . PHP_EOL;
