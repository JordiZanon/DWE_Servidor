<?php
//Ejercicio 3: Muestra un formulario para elegir idioma (es/en/fr).
//  Guarda la elección en una cookie. Muestra un mensaje de bienvenida en el idioma elegido.


$mensajes = [
    'es' => 'Bienvenido',
    'en' => 'Welcome',
    'fr' => 'Bienvenue'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idioma = $_POST['idioma'] ?? 'es';

    setcookie('idioma', $idioma, [
        'expires' => time() + 7 * 24 * 60 * 60, // 7 días
        'path' => '/',
        'samesite' => 'Lax'
    ]);

    header("Location: ejercicio_3.php");
    exit;
}

$idioma = $_COOKIE['idioma'] ?? null;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Idioma</title>
</head>

<body>
<?php if ($idioma): ?>
    <h2><?= $mensajes[$idioma] ?? 'Bienvenido' ?></h2>
    <a href="?reset=1">Cambiar idioma</a>
<?php else: ?>
    <form method="post">
        <label>Elige idioma:
            <select name="idioma">
                <option value="es">Español</option>
                <option value="en">Inglés</option>
                <option value="fr">Francés</option>
            </select>
        </label>
        <button type="submit">Guardar</button>
    </form>
<?php endif; ?>

<?php
if (isset($_GET['reset'])) {
    setcookie('idioma', '', time() - 3600, '/');
    header("Location: ejercicio_3.php");
    exit;
}
?>
</body>

</html>