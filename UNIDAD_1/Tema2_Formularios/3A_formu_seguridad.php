<?php

//Funcion  REQUERIDA para la seguridad, q no ponga cosas raras el usuario ni hakers
function test_input($data) //Solo cuando el usuario tenga q escribir texto
{
    $data = trim($data); // elimina espacio vacíos
    $data = stripslashes($data); //elimina la contra barra
    $data = htmlspecialchars($data); //evita que se ejecuten etiquetas HTML: probar <script>alert("hola")</script> y comentar esta línea
    return $data;
}

//REQUERIDO Comprobacion de error, para mandar resultado solo si hay resultado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // o if(isset($_POST["submit"]))
    // //Esto es para saber si exsite la variable submit y se ha guardado algo al darle al boton
    $usuario = test_input($_POST["usuario"] );
    $email = test_input($_POST["email"]);

    echo "Usuario $usuario y email $email";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


<form action="<?php echo (htmlentities($_SERVER['PHP_SELF'])); ?>" method="POST">
    <label>
        Usuario: <input type="text" name="usuario" />
    </label>
    <label>
        email: <input type="email" name="email" />
    </label>
    <input type="submit" value="OK" name="submit"/>
    <!-- El submit es un boton -->
</form>


</body>

</html>