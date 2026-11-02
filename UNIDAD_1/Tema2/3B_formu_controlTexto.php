<?php
$nombre="";
$email =""; //Estan al inicio, por lo tanto son globales, y sin valor para cuando rellenas formulario no se te borre si te equivocas
function test_input($data) //Funcion  REQUERIDA para la seguridad, q no ponga cosas raras el usuario ni hakers
{//Solo cuando el usuario tenga q escribir texto
    $data = trim($data); // elimina espacio vacíos
    $data = stripslashes($data); //elimina la contra barra
    $data = htmlspecialchars($data); //evita que se ejecuten etiquetas HTML: probar <script>alert("hola")</script> y comentar esta línea
    return $data;
}

// REQUERIDO Comprobacion de error, para mandar resultado solo si hay resultado
if ($_SERVER["REQUEST_METHOD"] == "POST") { //se ha enviado el form?
    $nombre = test_input($_POST["usuario"] ?? '');
    //?? '' -> Es como un ternario o esto o esto otro q esta '' aqui esta vacio pero puedes poner lo q quieras
    $email = test_input($_POST["email"] ?? '');

    if ($nombre == '')
        $errores[] = "El campo nombre es obligatorio.";
    if ($email == '')
        $errores[] = "El campo email es obligatorio.";

    if (!empty($errores)):
        foreach ($errores as $error):
            echo $error;
        endforeach;
    else : echo "Usuario $nombre e email $email";
    endif;
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


<form action="" method="POST">
    <label>
        Usuario: <input type="text" name="usuario" value="<?= $nombre?>"/>
    </label>
    <br>
    <label>
        email: <input type="email" name="email" value="<?= $email?>"/>
    </label>
    <br>
    <input type="submit" value="OK" name="submit" />
</form>


</body>

</html>
