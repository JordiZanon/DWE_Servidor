<!--Ejercicio 6. Haz una función random que muestre por pantalla la calificación obtenida. Si el número es:-->
<!--menor que 5 → mostrará “suspendido”-->
<!--entre 5 y 5,99 → mostrará “suficiente”-->
<!--entre 6 y 6,99 → mostrará “bien”-->
<!--entre 7 y 8,99 → mostrará “notable”-->
<!--entre 9 y 10 → mostrará “sobresaliente”-->
<!--NOTA: Función php random: $var = rand(1,10);-->

<?php
// 1. Definimos la función que recibirá un número (la nota) y devolverá la calificación en texto.
function evaluarNota($nota) {
    // Usamos la estructura if / elseif para evaluar los rangos.
    // Como la ejecución va de arriba a abajo, si entra en un bloque, ignora los demás.

    if ($nota < 5) {
        return "suspendido";
    } elseif ($nota < 6) { // Si llega aquí, ya sabemos seguro que es >= 5
        return "suficiente";
    } elseif ($nota < 7) {
        return "bien";
    } elseif ($nota < 9) {
        return "notable";
    } elseif ($nota <= 10) {
        return "sobresaliente";
    } else {
        // Siempre es buena práctica poner un 'else' final por si llega un dato inesperado (ej. un 11)
        return "Nota no válida";
    }
}

// 2. Generamos la nota aleatoria tal y como pide el enunciado.
// rand(1, 10) genera un número entero aleatorio entre 1 y 10 (ej: 1, 2, 7, 9...).
//$miNota = rand(1, 10);

// Genera un número entre 100 y 1000, y al dividirlo da resultados como 5.45, 8.99 o 7.30
$notaConDecimales = rand(100, 1000) / 100;

// 3. Llamamos a nuestra función pasándole la nota generada y guardamos el resultado.
$calificacionFinal = evaluarNota($notaConDecimales);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6 - Calificaciones</title>
</head>
<body>

<h2>Resultado de la evaluación:</h2>

<!-- Mostramos por pantalla el número generado y su calificación correspondiente -->
<p>La nota obtenida es un: <strong><?= $notaConDecimales ?></strong></p>
<p>Calificación: <strong><?= $calificacionFinal ?></strong></p>

<!-- Un pequeño botón para recargar la página y ver cómo cambia el número -->
<br>
<a href=""><button>Generar otra nota</button></a>

</body>
</html>