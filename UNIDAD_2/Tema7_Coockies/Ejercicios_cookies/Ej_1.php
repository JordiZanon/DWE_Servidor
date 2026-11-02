<?php
//Ejercicio 1: Crea una cookie que cuente cuántas veces el usuario ha visitado una página específica. Muestra el número de visitas.

$visitas = $_COOKIE['visitas'] ?? 0;
$visitas++;

setcookie('visitas', $visitas, [
    'expires' => time() + 10,
    'path' => '/',
    'samesite' => 'Lax'
]);

echo "<h2>Has visitado esta página $visitas veces.</h2>";
