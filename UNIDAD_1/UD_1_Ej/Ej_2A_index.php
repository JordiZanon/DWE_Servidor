<!--Ejercicio 2. Haz un index.php con un formulario que tenga un desplegable con las opciones (Si/No) y el botón de envío.
El formulario se enviará a enviado.php.-->
<!--Si el dato recogido en enviado.php es “Si”, se mostrará “Si” en enviado.php-->
<!--Si el dato recogido en enviado.php es “No”, se hará una redirección a index.php y se mostrará el mensaje “Dato no aceptado”-->


<?php
// Comprobamos si la URL trae una señal de error (ej: index.php?error=1)
$error = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 - Formulario</title>
</head>
<body>

<!-- Si detectamos la señal de error en la URL, mostramos el mensaje -->
<?php
if ($error == '1') {
    echo "<h3 style='color: red;'>Dato no aceptado</h3>";
}
?>

<!-- action="enviado.php" indica a qué archivo viajarán los datos -->
<form action="Ej_2B_enviado.php" method="POST">
    <label>Elige una opción:</label>

    <!-- Etiqueta <select> para crear un desplegable -->
    <select name="respuesta">
        <option value="Si">Sí</option>
        <option value="No">No</option>
    </select>

    <br><br>    <!--    Boton-->
    <input type="submit" value="Enviar">
</form>

</body>
</html>


<!--Explicación paso a paso de lo que ocurre (El viaje de los datos)-->
<!--El inicio (index.php): Tú entras a la página web.
La variable $error se queda vacía porque la URL está limpia. Ves un menú desplegable, eliges "No" y le das a Enviar.-->
<!--El viaje por POST: Los datos viajan ocultos hacia enviado.php.-->
<!--La comprobación (enviado.php): El servidor lee el dato $respuesta. Al ver que es un "No", entra en el bloque elseif.-->
<!--La redirección (header): PHP ejecuta header("Location: index.php?error=1");. Esto le dice a tu navegador web:
"Aquí no puedes quedarte, vuelve a index.php, pero llévate esta etiqueta ?error=1 pegada en la dirección web".-->
<!--El aterrizaje (vuelta a index.php): Tu pantalla vuelve a cargar index.php. Pero esta vez,
el primer bloque de código de arriba del todo lee tu dirección web con $_GET['error'] y detecta que trae un 1.-->
<!--El mensaje: Como $error ahora vale 1, el if ($error == '1') se cumple y, justo encima del formulario,
se dibuja en rojo "Dato no aceptado".-->