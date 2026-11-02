<?php
//Ejercicio 2B: Muestra un formulario para introducir el nombre del usuario.
// Una vez enviado, guarda el nombre en una cookie durante 3 días y
//  muestra un saludo personalizado cada vez que visite la página.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? 'Visitante';

    setcookie('nombre', $nombre, [
        'expires' => time() + 3 * 24 * 60 * 60, // 3 días  dias, horas, minutos y segundos
        'path' => '/',
        'samesite' => 'Lax'
    ]);

    header("Location: Ej_2B.php");
    exit;
}

$nombre = $_COOKIE['nombre'] ?? null;
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Recordar Nombre</title></head>
<body>

    <h2>Hola, <?= htmlspecialchars($nombre) ?>.</h2>
    <a href="?reset=true">Olvidar nombre</a>

    <form method="post">
        <label>Tu nombre: <input type="text" name="nombre" value="<?=$_COOKIE[$nombre]?>"></label>
        <button type="submit">Guardar</button>
    </form>


<?php
if (isset($_GET['reset'])) {
    setcookie('nombre', '', time() - 3600, '/');
    header("Location: Ej_2B.php");
    exit;
}
?>
</body>
</html>