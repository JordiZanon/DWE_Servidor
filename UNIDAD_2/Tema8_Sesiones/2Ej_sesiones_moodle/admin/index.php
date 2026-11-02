<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php?no_auth");
    exit;
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
<br>
<br>
<?= "Hola, " . htmlspecialchars($_SESSION["usuario"]); ?>
</body>
</html>

<!--<p><a href="logout.php">Cerrar sesión</a></p>-->
