<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$usuario_valido = "admin";
$clave_valida = "1234";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"] ?? "";
    $clave = $_POST["clave"] ?? "";

    if ($usuario === $usuario_valido && $clave === $clave_valida) {
        $_SESSION["usuario"] = $usuario;
        session_regenerate_id(); // Previene fijación de sesión
        header("Location: privado.php");
        exit;
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<form method="post">
    Usuario: <input type="text" name="usuario"><br>
    Clave: <input type="password" name="clave"><br>
    <input type="submit" value="Entrar">
</form>