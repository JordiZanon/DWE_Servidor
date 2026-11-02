<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$usuario_valido = "admin";
$clave_valida = "1234";
$mensaje= "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"] ?? "";
    $clave = $_POST["clave"] ?? "";

    if ($usuario === $usuario_valido && $clave === $clave_valida) {
        $_SESSION["usuario"] = $usuario;
        session_regenerate_id(); // Previene fijación de sesión
        header("Location: admin/index.php");
        exit;
    } else {
        $mensaje= "Credenciales incorrectas.";
    }
}

if (!isset($_GET['logout'])) {
    $mensaje = "Sesion cerrada con exito.";
}
if (!isset($_GET['no_auth'])) {
    $mensaje = "No tienes permiso para acceder, Inicia sesion.";
}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<?php include "menu.php" ?>
<h2>Bienvenidos a mi web - Juegos de mesa</h2>
<?= $mensaje;?>
<form method="post">
    Usuario: <input type="text" name="usuario"><br>
    Clave: <input type="password" name="clave"><br>
    <input type="submit" value="Entrar">
</form>
</body>
</html>
