<!--Ejercicio 4. Haz un formulario con un campo para introducir un número que se procese en la misma página. -->
<!--Si ese número es mayor que 10, se ejecutará una función que muestre el número introducido. -->
<!--Si el número es menor o igual que 10,
se ejecutará una función que muestre por pantalla los números comprendidos entre el indicado en el formulario y el 0.-->

<?php
// Inicializar variables
$numero = '';
$errores = [];
$mostrar_formulario = true;
$resultadoFinal = ''; // Nueva variable para guardar el mensaje final

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

// 1. Función para cuando el número es MAYOR que 10
function mostrarNumero($num) {
    // Simplemente devuelve un texto con el número
    return "El número introducido es mayor que 10. Tu número es el: " . $num;
}

// 2. Función para cuando el número es MENOR O IGUAL a 10
function cuentaAtras($num) {
    $texto = "El número es menor o igual a 10. Números hasta el 0: ";

    // Usamos un bucle FOR.
    // $i empieza valiendo lo que vale $num.
    // Mientras $i sea mayor o igual a 0, se repite.
    // $i-- significa que le restamos 1 en cada vuelta.
    for ($i = $num; $i >= 0; $i--) {
        $texto .= $i . ", "; // Concatenamos el número al texto
    }

    // rtrim quita la última coma y espacio sobrante al final
    return rtrim($texto, ", ");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = test_input($_POST["numero"] ?? '');

    // Validaciones
    if ($numero == '') {
        $errores[] = "El número es obligatorio.";
    } elseif (!is_numeric($numero)) {
        $errores[] = "Debe ser un número válido.";
    }

    // Si NO hay errores, ocultamos el formulario y ejecutamos las funciones
    if (empty($errores)) {
        $mostrar_formulario = false;

        // AQUÍ ESTÁ LA LÓGICA PRINCIPAL DEL EJERCICIO
        if ($numero > 10) {
            // Llamamos a la función pasándole $numero y guardamos lo que devuelve
            $resultadoFinal = mostrarNumero($numero);
        } else {
            // Llamamos a la otra función pasándole $numero y guardamos lo que devuelve
            $resultadoFinal = cuentaAtras($numero);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4 - Formulario</title>
</head>
<body>

<?php if (!empty($errores)): ?>
    <ul style="color:red;">
        <?php foreach ($errores as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ($mostrar_formulario): ?>
    <form action="" method="POST">
        <label>Número: <input type="number" name="numero" value="<?= htmlspecialchars($numero) ?>"></label><br><br>
        <input type="submit" value="Enviar">
    </form>
<?php else: ?>
    <h2>Datos enviados:</h2>

    <!-- Aquí imprimimos la variable donde guardamos el resultado de nuestras funciones -->
    <p><strong>Resultado:</strong> <?= htmlspecialchars($resultadoFinal) ?></p>

    <br>
    <a href="">Volver al formulario</a>
<?php endif; ?>

</body>
</html>