<?php
//Ejercicio 4: Muestra un mensaje especial de bienvenida solo
// la primera vez que el usuario accede a la página, utilizando cookies.
// No volverá a mostrarse en visitas posteriores.


$esPrimeraVisita = !isset($_COOKIE['visitado']); //si existe devuelve FALSE, si no existe devuelve TRUE

if ($esPrimeraVisita) {
    setcookie('visitado', 'sí', [
        'expires' => time() + 365 * 24 * 60 * 60, // 1 año
        'path' => '/',
        'samesite' => 'Lax'
    ]);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Primera Visita</title>
</head>

<body>
<?php if ($esPrimeraVisita): ?>
    <h2>¡Bienvenido a tu primera visita!</h2>
<?php else: ?>
    <p>Ya has visitado esta página antes.</p>
<?php endif; ?>
</body>

</html>