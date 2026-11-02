<!--Ejercicio 8. Haz un archivo php que realice un bucle con la suma de los números enteros comprendidos entre el 1 y el 10 en una serie y mostrando por pantalla:-->
<!--1 //para el número 1-->
<!--3 //para 1+2-->
<!--6 // para 1+2+3-->
<!--...-->

<?php
// Mostrar errores (opcional pero muy recomendado para aprender y depurar)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Inicializamos una variable acumuladora en 0.
// Aquí iremos guardando la suma de los números en cada vuelta del bucle.
$sumaAcumulada = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 8 - Suma acumulativa</title>
</head>
<body>

<h2>Serie de sumas acumuladas (del 1 al 10):</h2>

<ul>
    <?php
    // Bucle FOR:
    // $i = 1 -> Empezamos a contar desde el número 1.
    // $i <= 10 -> El bucle se repetirá hasta llegar al número 10.
    // $i++ -> En cada vuelta, avanzamos al siguiente número (1, 2, 3...).
    for ($i = 1; $i <= 10; $i++) {

        // ACUMULADOR: Sumamos el número actual ($i) a lo que ya teníamos guardado en $sumaAcumulada.
        // Esta línea es abreviatura de: $sumaAcumulada = $sumaAcumulada + $i;
        $sumaAcumulada += $i;

        // Explicación de lo que ocurre paso a paso:
        // Vuelta 1: $sumaAcumulada (0) + $i (1) = 1. Muestra: 1
        // Vuelta 2: $sumaAcumulada (1) + $i (2) = 3. Muestra: 3
        // Vuelta 3: $sumaAcumulada (3) + $i (3) = 6. Muestra: 6
        // ...y así sucesivamente hasta el 10.

        // Imprimimos el resultado de esta vuelta dentro de un elemento de lista <li>
        echo "<li>Para el número $i -> La suma total es: <strong>" . $sumaAcumulada . "</strong></li>";
    }
    ?>
</ul>

<br>
<a href="">Volver a cargar</a>

</body>
</html>