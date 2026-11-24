<?php
// 1. Inicializar variables para que existan en la primera carga
$nombre = "";
$genero = "";
$aficiones = [];
$errores = [];
function test_input($data) //Solo cuando el usuario tenga q escribir texto
{
    $data = trim($data); // elimina espacio vacíos
    $data = stripslashes($data); //elimina la contra barra
    $data = htmlspecialchars($data); //evita que se ejecuten etiquetas HTML: probar <script>alert("hola")</script> y comentar esta línea
    return $data;
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y validar los datos
    $nombre = test_input($_POST["idNombre"] ?? '');
    $genero = $_POST['idGenero'] ?? '';
    $aficiones = $_POST['idAficiones'] ?? [];
}

// Validación
if ($nombre == '') {
    $errores[] = "El campo nombre es obligatorio.";
}
if ($genero == '') $errores[] = "El campo género es obligatorio.";
if (empty($aficiones)) $errores[] = "Debes seleccionar al menos una afición.";

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Formulario completo</title>
    </head>

    <body>
    <br><br>

    <?php
    // Solo mostramos resultado o errores SI el formulario ha sido enviado (POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Si hay errores, los mostramos
        if (!empty($errores)) {
            echo "<div style='color: red;'>";
            foreach ($errores as $error) {
                echo $error . "<br>";
            }
            echo "</div><br>";
        }
        // Si NO hay errores, mostramos el mensaje de éxito
        else {
            echo "<div style='color: green;'>";
            echo "<h3>Datos recibidos correctamente:</h3>";
            echo "Nombre: $nombre;<br>";
            echo "Género: $genero;<br>";
            echo "Aficiones: " . implode(', ', $aficiones) . "<br><br>";
            echo "</div>";
        }
    }
    ?>

    <form action="" method="POST">
        <!-- Mantiene el texto escrito -->
        <label>Nombre:
            <input type="text" name="idNombre" value="<?php echo $nombre; ?>">
        </label>

        <br><br>

        <label>Género:</label><br>
        <!-- Mantiene marcado el radio seleccionado -->
        <label>
            <input type="radio" name="idGenero" value="Hombre" <?php if ($genero == 'Hombre') echo 'checked'; ?>>
        </label> Hombre<br>
        <input type="radio" name="idGenero" value="Mujer" <?php if ($genero == 'Mujer') echo 'checked'; ?>> Mujer<br>

        <br><br>

        <label>Aficiones:</label><br>
        <!-- Mantiene marcados los checkbox -->
        <input type="checkbox" name="idAficiones[]" value="Leer" <?php if (in_array('Leer', $aficiones)) echo 'checked'; ?>> Leer<br>
        <input type="checkbox" name="idAficiones[]" value="Viajar" <?php if (in_array('Viajar', $aficiones)) echo 'checked'; ?>> Viajar<br>
        <input type="checkbox" name="idAficiones[]" value="Cine" <?php if (in_array('Cine', $aficiones)) echo 'checked'; ?>> Cine<br><br>

        <input type="submit" value="Enviar">
    </form>

    <br>
    <a href="">Volver al formulario</a>










    <hr>

    <!-- SECCIÓN DE EJEMPLOS PRÁCTICOS -->
    <h2>Ejemplos de apoyo: implode() y explode()</h2>

    <h3>Ejemplos de implode() (Array a String):</h3>


<?php
//Otros ej de .implode
//Ej 1:
// Array de elementos (por ejemplo, recibidos de $_POST['aficiones'])
$aficiones = ["Leer", "Viajar", "Cine", "Música"];
// Unimos los elementos del array usando una coma y un espacio como separador
$cadena = implode(", ", $aficiones);
// Resultado: "Leer, Viajar, Cine, Música"
echo "Tus aficiones seleccionadas son: " . $cadena;

//Ej 2:
// Array con el usuario y el dominio
$partesEmail = ["usuario", "dominio.com"];
// Unimos las partes usando el signo @
$email = implode("@", $partesEmail);
// Resultado: "usuario@dominio.com"
echo "Correo completo: " . $email;

//Ej 3:
$lenguajes = ["PHP", "HTML", "CSS", "JavaScript", "MySQL"];
// Unimos los elementos usando una barra vertical con espacios
$tecnologias = implode(" | ", $lenguajes);
// Resultado: "PHP | HTML | CSS | JavaScript | MySQL"
echo "Tecnologías del proyecto: " . $tecnologias;


//--------------------------------------------------------------------------------
?>

    <h3>Ejemplos de explode() (String a Array):</h3>
    <?php
//Otros ej de .explode
//Ej 1:
// Cadena original recibida (por ejemplo, de una base de datos o un input de texto)
$cadena = "Leer, Viajar, Cine, Música";

// Dividimos la cadena usando la coma y el espacio ", " como separador
$aficiones = explode(", ", $cadena);

// Resultado generado:
// $aficiones = ["Leer", "Viajar", "Cine", "Música"];

// Acceso individual por índice
echo "Primera afición: " . $aficiones[0] . "<br>"; // Muestra: Leer

// Recorrer el array resultante
echo "<b>Lista de aficiones:</b><br>";
foreach ($aficiones as $aficion) {
    echo "- " . $aficion . "<br>";
}

//Ej 2:
$email = "usuario@dominio.com";
// Dividimos el correo en dos partes
$partes = explode("@", $email);

$nombreUsuario = $partes[0]; // "usuario"
$dominio = $partes[1];       // "dominio.com"

echo "Usuario: $nombreUsuario <br>";
echo "Dominio: $dominio";


//Ej 3:
$texto = "PHP, HTML, CSS, JavaScript, MySQL";
// Solo divide en un máximo de 3 partes (el resto queda agrupado en la última)
$lenguajes = explode(", ", $texto, 3);
/*
$lenguajes contendrá:
[0] => "PHP"
[1] => "HTML"
[2] => "CSS, JavaScript, MySQL"
*/

?>

    </body>

</html>
