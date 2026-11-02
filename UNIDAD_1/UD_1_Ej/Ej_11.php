<!--Ejercicio 11. Haz un archivo en el que se lean los primeros 300 números enteros
y se determine cuántos de ellos son impares, al final deberás indicar su suma.-->


<?php
// 1. Inicializamos las variables necesarias:
// - Un contador para saber CUÁNTOS números impares hay.
// - Un acumulador para sumar el valor de todos esos impares.
$contadorImpares = 0;
$sumaImpares = 0;

// 2. Bucle FOR para recorrer los primeros 300 números enteros (del 1 al 300)
for ($i = 1; $i <= 300; $i++) {

    // Comprobamos si el número actual es impar.
    // Usamos el operador módulo (!= 0 significa que el resto de dividir entre 2 NO es 0).
    if ($i % 2 != 0) {

        // CONTADOR: Incrementamos en 1 cada vez que encontramos un número impar.
        $contadorImpares++;

        // ACUMULADOR: Sumamos el valor del número impar actual a la suma total.
        $sumaImpares += $i;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 11 - Conteo y Suma de Impares</title>
</head>
<body>

<h2>Análisis de los números del 1 al 300:</h2>

<p>Cantidad de números impares encontrados: <strong><?= $contadorImpares ?></strong></p>
<p>Suma total de los valores impares: <strong><?= $sumaImpares ?></strong></p>

</body>
</html>