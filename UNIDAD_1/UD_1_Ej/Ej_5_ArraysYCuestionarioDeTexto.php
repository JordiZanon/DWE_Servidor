<!--Ejercicio 5. Crea un array con los siguientes elementos: "Jose", "Lola", "Lorenzo", “Isabel”, "Mariluz" y "Maria Jose".
 Pide mediante un formulario un nombre de los anteriores y utiliza un bucle for para buscar el nombre indicado.
 Si encuentra el nombre en el array, que muestre el mensaje “Nombre encontrado”, si no, muestra el mensaje “xxx no es profesor”
 donde xxx es el nombre que has escrito en el formulario.-->

<?php
// 1. Definimos el array con los nombres de los profesores que pide el ejercicio
$profesores = ["Jose", "Lola", "Lorenzo", "Isabel", "Mariluz", "Maria Jose"];

// 2. Inicializamos las variables
$nombreBuscado = "";
$mensajeResultado = "";
$mostrar_formulario = true;

// Función de seguridad para limpiar lo que escribe el usuario
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

// $_SERVER: Es un array superglobal que PHP crea automáticamente en cada petición.
// Contiene información del servidor web, del navegador y del protocolo HTTP.
// ["REQUEST_METHOD"]: Es la clave dentro de ese array que guarda el método HTTP utilizado para solicitar la página

// Procesar el formulario, por defecto es GET por lo tanto saltará este if.
// Cuando llega al formulario cambia a: method="POST"

// 3. Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos y limpiamos el nombre escrito
    $nombreBuscado = test_input($_POST["nombre"] ?? '');

    // Comprobamos que el usuario no haya dejado el campo vacío
    if ($nombreBuscado == '') {
        $mensajeResultado = "Por favor, escribe un nombre para buscar.";
    } else {
        // Si ha escrito algo, ocultamos el formulario para mostrar solo el resultado
        $mostrar_formulario = false;

        // --- INICIO DE LA LÓGICA DE BÚSQUEDA ---

        // Creamos una variable bandera (flag) que por defecto es falsa
        $encontrado = false;

        // Bucle FOR:
        // $i = 0 -> Empezamos en la posición 0 del array (donde está "Jose")
        // $i < count($profesores) -> Repetimos mientras $i sea menor que la cantidad de profesores (6)
        // $i++ -> Sumamos 1 a $i en cada vuelta para pasar al siguiente nombre
        for ($i = 0; $i < count($profesores); $i++) {

            // Comparamos si el nombre en la posición $i es exactamente igual al que escribió el usuario
            if (mb_strtolower($profesores[$i]) == mb_strtolower($nombreBuscado)) {
                $encontrado = true; // ¡Lo hemos encontrado! Cambiamos la bandera a true
                break; // Usamos 'break' para detener y salir del bucle (si ya lo encontramos, no hace falta seguir buscando)
            }
        }

        // --- FIN DE LA LÓGICA DE BÚSQUEDA ---

        // 4. Preparamos el mensaje final según lo que haya pasado con la variable $encontrado
        if ($encontrado == true) {
            $mensajeResultado = "Nombre encontrado";
        } else {
            // Si no se encontró, mostramos el nombre introducido y el mensaje
            // Usamos htmlspecialchars por seguridad al imprimir lo que escribió el usuario
            $mensajeResultado = htmlspecialchars($nombreBuscado) . " no es profesor";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 - Búsqueda en Array</title>
</head>
<body>

<h2>Buscador de Profesores</h2>

<?php if ($mostrar_formulario): ?>

    <!-- Mostramos el mensaje de error en rojo si intentó enviar el formulario vacío -->
    <?php if ($mensajeResultado != ''): ?>
        <p style="color: red;"><?= $mensajeResultado ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label>Introduce un nombre:
            <input type="text" name="nombre" value="<?= htmlspecialchars($nombreBuscado) ?>">
        </label><br><br>

        <input type="submit" value="Buscar">
    </form>

<?php else: ?>

    <!-- Pantalla de resultado una vez enviado el formulario -->
    <h3>Resultado de la búsqueda:</h3>

    <p><strong><?= $mensajeResultado ?></strong></p>

    <br>
    <a href="">Volver a buscar</a>

<?php endif; ?>

</body>
</html>