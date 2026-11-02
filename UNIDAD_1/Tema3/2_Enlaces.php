<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Enlaces</title>
</head>
<body>
<h2>Selecciona un número:</h2>
<a href="uno.php?numero=uno">Uno</a><br>
<a href="dos.php?numero=dos">Dos</a><br>
<a href="tres.php?numero=tres">Tres</a>
</body>
</html>


<?php
$numero = $_GET['numero'] ?? 'desconocido';
echo "El número es el " . htmlspecialchars($numero);
?>