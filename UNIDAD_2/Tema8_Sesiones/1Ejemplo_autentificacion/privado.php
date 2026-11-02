<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

echo "Hola, " . htmlspecialchars($_SESSION["usuario"]);
?>

<p><a href="logout.php">Cerrar sesión</a></p>