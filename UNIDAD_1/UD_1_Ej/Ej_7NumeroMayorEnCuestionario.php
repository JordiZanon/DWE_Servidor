<!--Ejercicio 7. Haz un archivo php que permita leer dos valores distintos dados en un formulario,
 y determine cuál de los dos valores es el mayor y mostrarlo en el mismo archivo php.
 Los valores introducidos por el teclado tienen que ser valores distintos y no pueden estar vacíos, si no es así,
  muestra un mensaje que informe de esa introducción. -->

<?php
// 1. Inicializar variables para la primera carga (GET)
$valor1 = "";
$valor2 = "";

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
    $valor1 = test_input($_POST["valor1"] ?? '');
    $valor2 = test_input($_POST["valor2"] ?? '');

    // Validación del primer valor
    if ($valor1 == '') {
        $errores[] = "El campo del primer valor es obligatorio.";
    } elseif (!is_numeric($valor1)) {
        // Comprobar en PHP si realmente es un número válido
        $errores[] = "El primer valor debe ser un número válido.";
    }

    // Validación del segundo valor
    if ($valor2 == '') {
        $errores[] = "El campo del segundo valor es obligatorio.";
    } elseif (!is_numeric($valor2)) {
        // Comprobar en PHP si realmente es un número válido
        $errores[] = "El segundo valor debe ser un número válido.";
    }

    // Validación extra: Los valores introducidos tienen que ser distintos
    // (Solo lo comprobamos si ambos son numéricos para evitar fallos previos)
    if (is_numeric($valor1) && is_numeric($valor2)) {
        if ($valor1 == $valor2) {
            $errores[] = "Los dos valores introducidos tienen que ser distintos.";
        }
    }

    // Si no hay errores, determinamos cuál es mayor y ocultamos el formulario
    if (empty($errores)) {
        $mostrar_formulario = false;

        // --- LÓGICA PARA DETERMINAR EL MAYOR ---
        if ($valor1 > $valor2) {
            $resultado = "El valor mayor es el primero: " . $valor1;
        } else {
            $resultado = "El valor mayor es el segundo: " . $valor2;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7 - Comparar dos números</title>
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
        <!-- Mantener texto/números en los Inputs (Sticky Form) -->
        <!-- Usamos step="any" por si el usuario quiere probar con decimales -->
        <label>Primer valor: <input type="number" step="any" name="valor1" value="<?= htmlspecialchars($valor1) ?>"></label><br><br>
        <label>Segundo valor: <input type="number" step="any" name="valor2" value="<?= htmlspecialchars($valor2) ?>"></label><br><br>

        <input type="submit" value="Comparar">
    </form>
<?php else: ?>
    <h2>Resultado de la comparación:</h2>

    <p><strong><?= htmlspecialchars($resultado) ?></strong></p>
    <p>Has comparado el número <strong><?= htmlspecialchars($valor1) ?></strong> con el <strong><?= htmlspecialchars($valor2) ?></strong>.</p>
    <br>
    <a href="">Volver a comparar</a>
<?php endif; ?>

</body>
</html>