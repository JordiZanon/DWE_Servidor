<?php
//Ej_2

$i = 0;
while ($i <= 10) {
    $resultado = $i * 4;
    echo "$i * 4 = $resultado<br>";
    $i++;
}

echo "<br>";

//Ej_3
function multiplicarTres($a, $b, $c)
{
    return $a * $b * $c;
}

// Llamada de ejemplo
$resultado = multiplicarTres(2, 3, 4);
echo "El resultado de multiplicar 2, 3 y 4 es: $resultado";


echo "<br>";
//Ej_4

$numero = rand(1, 100); // Número aleatorio entre 1 y 100.      El 100 esta incluido.

if ($numero % 2 == 0) {
    echo "El número $numero es par";
} else {
    $doble = $numero * 2;
    echo "El número $numero es impar y el doble es $doble";
}
