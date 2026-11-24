<!--  Codigo de errores, para verlos-->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!-- REQUERIDO Comprobacion de error, para mandar resultado solo si hay resultado -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Si se ha enviado el formulario
    echo "La palabra a buscar es: " . $_POST['busqueda'];
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
<!-- action-> Es donde se envia el formulario y method-> Es con q metodos se van a procesar los datos del formularios  -->
<form action="" method="POST">
    <label>
        Buscar: <input type="text" name="busqueda" />
    </label>
    <input type="submit" value="OK" />
</form>

<!-- Esto no hece falta, solo es por el ejemplo de ver la impresion -->
<?= "La palabra a buscar es: " . $_POST['busqueda']; ?>
<!-- //Esto de abajo es lo mismo con el echo -->
<?php echo "La palabra a buscar es: " . $_POST['busqueda']; ?>

</body>

</html>
