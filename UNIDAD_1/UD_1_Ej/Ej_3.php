<!--Ejercicio 3. Crea una página php que tenga un formulario con la siguiente funcionalidad:-->
<!--El formulario se procesará a la misma página-->
<!--El formulario tendrá un campo de radio, un campo de selección y un campo de checkbox.-->
<!--Muestra en la misma página los valores del formulario-->

<?php
// Inicializar variables
$errores = [];
$mostrar_formulario = true;

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y validar los datos
    $coche = $_POST["coche"] ?? '';
    $color = $_POST["color"] ?? '';
    $extrasCoche = $_POST["extrasCoche"] ?? [];

    // Validación
    if ($coche == '') $errores[] = "El coche es obligatorio.";
    if ($color == '') $errores[] = "El color es obligatorio.";
    if (empty($extrasCoche)) $errores[] = "Debes seleccionar al menos un extra del Coche.";

    // Si no hay errores, no mostrar el formulario
    if (empty($errores)) {
        $mostrar_formulario = false;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario completo</title>
</head>
<body>

<?php if (!empty($errores)) { ?>
    <ul style="color:red;">
        <?php foreach ($errores as $error) { ?>
            <li><?= $error ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<?php if ($mostrar_formulario): ?>

<form action="" method="POST">

    <label>Coche:</label><br>
    <input type="radio" name="coche" value="Porche"> Porche<br>
    <input type="radio" name="coche" value="Mercedes"> Mercedes<br><br>

    <label>Color:
        <select name="color">
            <option value="">-- Selecciona --</option>
            <option value="Azul">Azul</option>
            <option value="Verde">Verde</option>
            <option value="Aguamarina">Aguamarina</option>
        </select>
    </label><br><br>

    <label>Extras Coche:</label><br>
    <input type="checkbox" name="extrasCoche[]" value="Aire acondicionado"> Aire acondicionado<br>
    <input type="checkbox" name="extrasCoche[]" value="Rueda de repuesto"> Rueda de repuesto<br>
    <input type="checkbox" name="extrasCoche[]" value="Gancho trasero"> Gancho trasero<br><br>

    <input type="submit" value="Enviar">
</form>

<?php else: ?>
    <h2>Datos enviados:</h2>

    <ul>
        <li><strong>Coche:</strong> <?= htmlspecialchars($coche) ?></li>
        <li><strong>Color:</strong> <?= htmlspecialchars($color) ?></li>
        <li><strong>Extras Coche:</strong> <?= implode(', ', array_map('htmlspecialchars', $extrasCoche)) ?></li>
    </ul>
    <br>
    <a href="">Volver al formulario</a>
<?php endif; ?>

</body>
</html>