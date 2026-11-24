<?php
// 1. Inicializar variables para la primera carga (GET), Para guardar lo q se haya escrito bien el usuario, sin perder informacion
$nombre = "";
$cp = "";
$edad = "";
$precio = "";
$password = "";
$email = "";
$color = "#000000";
$genero = "";
$pais = "";
$aficiones = [];
$comentarios = "";

// Inicializar variables
$errores = [];
$mostrar_formulario = true;


function test_input($data) //Funcion  REQUERIDA para la seguridad, q no ponga cosas raras el usuario ni hakers
{//Solo cuando el usuario tenga q escribir texto
    $data = trim($data); // elimina espacio vacíos
    $data = stripslashes($data); //elimina la contra barra
    //Este no usar por q ya se usa abajo, y hay q usarlo abajo por q, aqui arriba te pondria caracteres raros
    //$data = htmlspecialchars($data); //evita que se ejecuten etiquetas HTML: probar <script>alert("hola")</script> y comentar esta línea
    return $data;
}


//$_SERVER: Es un array superglobal que PHP crea automáticamente en cada petición.
// Contiene información del servidor web, del navegador y del protocolo HTTP.
//["REQUEST_METHOD"]: Es la clave dentro de ese array que guarda el mét odo HTTP utilizado para solicitar la página



// Procesar el formulario, por defecto es GET por lo tanto saltara este if.
// Cuando llega al formulario cambia a: method="POST"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y validar los datos. //Captura los valores recibidos mediante $_POST[...].
    $nombre = test_input($_POST["nombre"] ?? '');
    $cp = test_input($_POST["cp"] ?? ''); // Capturar Código Postal
    $edad = test_input($_POST["edad"] ?? ''); // Capturar Edad
    $precio = test_input($_POST["precio"] ?? ''); // Capturar Precio
    $password = test_input($_POST["password"] ?? '');
    $email = test_input($_POST["email"] ?? '');
    $color = $_POST["color"] ?? '#000000';
    $genero = $_POST["genero"] ?? '';
    $pais = $_POST["pais"] ?? '';
    $aficiones = $_POST["aficiones"] ?? [];
    $comentarios = test_input($_POST["comentarios"] ?? '');

    // Validación, Comprueba si los campos cumplen las reglas ($nombre == '', etc.).
    if ($nombre == ''){
        $errores[] = "El campo nombre es obligatorio.";
    }
    // Validación de Código Postal
    if ($cp == '') $errores[] = "El código postal es obligatorio.";
    // Validación de Edad (comprobando si está vacío y luego si es numérico)
    if ($edad == '') {
        $errores[] = "La edad es obligatoria.";
    } elseif (!is_numeric($edad)) {
        // Comprobar en PHP si realmente es un número entero válido
        $errores[] = "La edad debe ser un número válido.";
    }
    // Validación de Precio (comprobando si está vacío y luego si es numérico)
    if ($precio == '') {
        $errores[] = "El precio es obligatorio.";
    } elseif (!is_numeric($precio)) {
        $errores[] = "El precio debe ser un número válido.";
    }
    if ($password == '') $errores[] = "El campo contraseña es obligatorio.";
    if ($email == '') $errores[] = "El campo email es obligatorio.";
    //Esta linea no hace falta, por q siempre habra un color seleccionado
    //if ($color == '') $errores[] = "El color es obligatorio.";
    if ($genero == '') $errores[] = "Debes seleccionar un género.";
    if ($pais == '') $errores[] = "Debes seleccionar un país.";
    if (empty($aficiones)) $errores[] = "Debes seleccionar al menos una afición.";
    if ($comentarios == '') $errores[] = "El campo comentarios es obligatorio.";

    // Si todos los datos son válidos, cambia $mostrar_formulario = false.
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

<?php if (!empty($errores)): ?>
    <ul style="color:red;">
        <?php foreach ($errores as $error): ?>
            <li><?=
                //(Solo haría falta htmlspecialchars() si en la frase del error incluyes el texto que metió el usuario,
                // por ejemplo: $errores[] = "El email '$email' no es válido";).
                htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ($mostrar_formulario): ?>
    <form action="" method="POST">
        <!-- Mantener texto en Inputs -->
        <label>Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>"></label><br><br>

        <!-- Código Postal (type="text" como pediste, justo debajo del otro) -->
        <label>Código Postal: <input type="text" name="cp" value="<?= htmlspecialchars($cp) ?>" maxlength="5"></label><br><br>

        <!-- Edad (type="number" para números enteros) -->
        <label>Edad: <input type="number" name="edad" value="<?= htmlspecialchars($edad) ?>" min="1" max="120"></label><br><br>

        <!-- Precio (type="number" con step para decimales) -->
        <label>Precio: <input type="number" name="precio" value="<?= htmlspecialchars($precio) ?>" step="0.01"></label><br><br>

        <label>Contraseña: <input type="password" name="password" value="<?= htmlspecialchars($password) ?>"></label><br><br>
        <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"></label><br><br>
        <label>Color favorito: <input type="color" name="color" value="<?= htmlspecialchars($color) ?>"></label><br><br>

        <!-- Mantener marcado el Radio -->
        <label>Género:</label><br>
        <input type="radio" name="genero" value="Hombre" <?php if ($genero == 'Hombre') echo 'checked'; ?>> Hombre<br>
        <input type="radio" name="genero" value="Mujer" <?php if ($genero == 'Mujer') echo 'checked'; ?>> Mujer<br><br>

        <!-- Mantener seleccionado el Select -->
        <label>País:
            <select name="pais">
                <option value="">-- Selecciona --</option>
                <option value="España" <?php if ($pais == 'España') echo 'selected'; ?>>España</option>
                <option value="México" <?php if ($pais == 'México') echo 'selected'; ?>>México</option>
                <option value="Argentina" <?php if ($pais == 'Argentina') echo 'selected'; ?>>Argentina</option>
            </select>
        </label><br><br>

        <!-- Mantener marcados los Checkbox con in_array -->
        <label>Aficiones:</label><br>
        <input type="checkbox" name="aficiones[]" value="Leer" <?php if (in_array('Leer', $aficiones)) echo 'checked'; ?>> Leer<br>
        <input type="checkbox" name="aficiones[]" value="Viajar" <?php if (in_array('Viajar', $aficiones)) echo 'checked'; ?>> Viajar<br>
        <input type="checkbox" name="aficiones[]" value="Cine" <?php if (in_array('Cine', $aficiones)) echo 'checked'; ?>> Cine<br><br>

        <!-- Mantener texto dentro del Textarea -->
        <label>Comentarios:<br>
            <textarea name="comentarios" rows="5" cols="30"><?= htmlspecialchars($comentarios) ?></textarea>
        </label><br><br>

        <input type="submit" value="Enviar">
    </form>
<?php else: ?>
    <h2>Datos enviados:</h2>

    <ul>
        <li><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></li>
        <li><strong>Código Postal:</strong> <?= htmlspecialchars($cp) ?></li>
        <li><strong>Edad:</strong> <?= htmlspecialchars($edad) ?></li>
        <li><strong>Precio:</strong> <?= htmlspecialchars($precio) ?></li>
        <li><strong>Email:</strong> <?= htmlspecialchars($email) ?></li>
        <li><strong>Contraseña:</strong> <?= htmlspecialchars($password) ?></li>
        <li><strong>Color favorito:</strong> <?= htmlspecialchars($color) ?></li>
        <li><strong>Género:</strong> <?= htmlspecialchars($genero) ?></li>
        <li><strong>País:</strong> <?= htmlspecialchars($pais) ?></li>
        <li><strong>Aficiones:</strong> <?= implode(', ', array_map('htmlspecialchars', $aficiones)) ?></li>
        <li><strong>Comentarios:</strong> <?= nl2br(htmlspecialchars($comentarios)) ?></li>
    </ul>
    <br>
    <a href="">Volver al formulario</a>
<?php endif; ?>

</body>
</html>