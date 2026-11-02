<!--Ejercicio 9. Haz un archivo php que tenga un formulario con 1 campo para introducir un número
 e indicar si dicho número es par o impar.-->



<?php
// 1. Inicializar variables para la primera carga (GET)
$numero = "";

// Inicializar variables de control de errores y formulario
$errores = [];
$mostrar_formulario = true;
$resultado = "";

function test_input($data) // Función REQUERIDA para la seguridad, que no ponga cosas raras el usuario ni hackers
{
    $data = trim($data); // elimina espacios vacíos
    $data = stripslashes($data); // elimina la barra invertida
    return $data;
}

// $_SERVER: Es un array superglobal que PHP crea automáticamente en cada petición.
// Contiene información del servidor web, del navegador y del protocolo HTTP.
// ["REQUEST_METHOD"]: Es la clave dentro de ese array que guarda el método HTTP utilizado para solicitar la página

// Procesar el formulario, por defecto es GET por lo tanto saltará este if.
// Cuando llega al formulario cambia a: method="POST"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y validar los datos. Captura los valores recibidos mediante $_POST[...].
    $numero = test_input($_POST["numero"] ?? '');

    // Validación del número
    if ($numero == '') {
        $errores[] = "El campo número es obligatorio.";
    } elseif (!is_numeric($numero)) {
        // Comprobar en PHP si realmente es un número válido
        $errores[] = "Debes introducir un número válido.";
    }

    // Si no hay errores, determinamos si es par o impar y ocultamos el formulario
    if (empty($errores)) {
        $mostrar_formulario = false;

        // --- LÓGICA PARA SABER SI ES PAR O IMPAR ---
        // Usamos el operador módulo (%) que calcula el resto de una división entre 2.
        // Si divides cualquier número par entre 2, el resto siempre es 0.
        if ($numero % 2 == 0) {
            $resultado = "El número " . htmlspecialchars($numero) . " es PAR.";
        } else {
            // Si el resto no es 0, significa que sobra 1, por lo tanto es impar.
            $resultado = "El número " . htmlspecialchars($numero) . " es IMPAR.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 9 - Par o Impar</title>
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
        <!-- Mantener el número introducido en el Input (Sticky Form) -->
        <label>Introduce un número: <input type="number" name="numero" value="<?= htmlspecialchars($numero) ?>"></label><br><br>

        <input type="submit" value="Comprobar">
    </form>
<?php else: ?>
    <h2>Resultado:</h2>

    <p><strong><?= $resultado ?></strong></p>

    <br>
    <a href="">Comprobar otro número</a>
<?php endif; ?>

</body>
</html>