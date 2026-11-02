<!--Ejercicio 10. Haz un archivo en el que se sumen los números enteros múltiplos de 5, comprendidos entre el 1 y el 100.
El programa deberá imprimir los números en cuestión y la suma final de los múltiplos de 5. +
Además, si el múltiplo de 5 es par, almacénalo en un array indexado y muestra al final la suma de los valores de este array.-->




<?php

// 1. Inicializamos las variables acumuladoras y el array vacío
$sumaTotal = 0;
$multiplosPares = [];  //El array indexado ($multiplosPares[] = $i): Cada vez que encuentra un número par (10, 20, 30...),
                            // lo añade automáticamente al final del array gracias a los corchetes vacíos.

echo "<h2>Múltiplos de 5 entre el 1 y el 100:</h2>";

// 2. Bucle optimizado: en lugar de ir de 1 en 1, avanzamos directamente de 5 en 5 ($i += 5)
for ($i = 5; $i <= 100; $i += 5) {

    // Imprimimos el número actual
    echo "Número: $i<br>";

    // Acumulamos la suma de todos los múltiplos de 5
    $sumaTotal += $i;

    // 3. Comprobamos si el múltiplo de 5 es par (su resto al dividir entre 2 es 0)
    if ($i % 2 == 0) {
        // Almacenamos el número par en el array indexado
        $multiplosPares[] = $i;
    }
}

// 4. Mostramos los resultados finales fuera del bucle
echo "<hr>";
echo "<h3>Resultados finales:</h3>";
echo "Suma total de todos los múltiplos de 5: <strong>$sumaTotal</strong><br>";

// Calculamos la suma de los valores guardados en el array de pares usando array_sum()
$sumaArrayPares = array_sum($multiplosPares);

echo "Múltiplos de 5 que son pares detectados: " . implode(", ", $multiplosPares) . "<br>";
echo "Suma de los valores del array de pares: <strong>$sumaArrayPares</strong>";
