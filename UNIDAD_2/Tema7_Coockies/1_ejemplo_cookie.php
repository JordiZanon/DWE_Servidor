<?php
setcookie("usuario", "Carlos", [
    'expires' => time() + 3600,
    'path' => '/',
    'secure' => false,
    'httponly' => false,
    'samesite' => 'Lax'
]);

//setcookie("usuario", "Carlos", time() + 3600);

if (isset($_COOKIE["usuario"])) {
    echo "Hola, " . htmlspecialchars($_COOKIE["usuario"]);
}

//setcookie("usuario", "", time() - 3600, "/");
