<?php
// Recoge las variables desde la URL
//<a href="destino.php?nombre=Juan&edad=25">Ver datos</a>
$nombre = $_GET['nombre'] ?? 'No recibido';
$edad = $_GET['edad'] ?? 'No recibido';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar datos</title>
</head>
<body>
<h2>Datos recibidos:</h2>
<p>Nombre: <?= htmlspecialchars($nombre) ?></p>
<p>Edad: <?= htmlspecialchars($edad) ?></p>
</body>
</html>


### Explicación del funcionamiento (Paso a paso)

Este código muestra **cómo pasar parámetros a través de la URL usando `$_GET`** y
cómo hacer **redirecciones automáticas desde el servidor con `header()`**[cite: 8, 9].

1. **Carga inicial (`index.php`):**
* El usuario entra a la página. Se crean las variables `$nombre = "Mariluz"` y `$edad = 45`[cite: 8].
* Como todavía no hay datos en la URL, se muestra únicamente el enlace `<a href="index.php?nombre=Mariluz">Ver datos</a>`[cite: 8].

2. **Hacer clic en el enlace:**
* Al pulsar "Ver datos", la página se recarga a sí misma pasando el parámetro por GET: `index.php?nombre=Mariluz`[cite: 8].

3. **Evaluación y Redirección (`header()`):**
* El `if ($_GET['nombre'] == "Mariluz")` detecta que en la URL viene el nombre "Mariluz"[cite: 8].
* Se ejecuta la función `header("location:destino.php?edad=$edad")`,
que le ordena al navegador **redireccionar inmediatamente** a `destino.php` enviándole el parámetro de la edad (`?edad=45`)[cite: 8].

4. **Recepción de datos (`destino.php`):**
* `destino.php` recibe únicamente la variable `edad=45` en la URL[cite: 8, 9].
* Usa el operador de fusión de nulos (`??`) para evitar errores:
* `$nombre` pasará a valer `'No recibido'` (ya que no se envió la variable `nombre` hacia `destino.php`)[cite: 9].
* `$edad` capturará el valor `45`[cite: 9].
* Finalmente, muestra los datos sanitizados con `htmlspecialchars()` para prevenir inyecciones de código HTML/JS[cite: 9].