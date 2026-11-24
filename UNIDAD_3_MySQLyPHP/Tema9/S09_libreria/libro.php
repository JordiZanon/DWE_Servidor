<!--archivo libro.php-->
<?php
// Forzamos a PHP a mostrar todos los errores en pantalla (útil para depurar)
ini_set('display_errors', '1');
error_reporting(E_ALL);

// Requerimos el CRUD de libros
require_once "./admin/includes/crudLibros.php";
// Instanciamos el objeto admin\includes\admin\includes\Libros
$libroObj = new Libros();

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $libroObj->sumarVisita($id);
    $libro = $libroObj->getLibroById($id);
}else{
    header("Location:index.php");
    exit;
}

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Librería Online</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

<body>
    <!-- Incluimos el menú superior y el aside lateral -->
<?php include("menu.php"); ?>

<main class="col-md-9">


<div class='row'>
    <div class="col-md-4">
        <img src="portadas/<?=$libro['portada']?>" alt="<?=$libro['titulo']?>" class="img-fluid">
    </div>
    <div class="col-md-8">
        <h2></h2>
        <p><strong>Autor: </strong><?=$libro['autor']?></p>
        <p><strong>Categoría: </strong><?=$libro['nombre_categoria']?></p>
        <p><strong>Precio: </strong><?=$libro['precio']?></p>
        <p><strong>Visitas: </strong><?=$libro['visitas']?></p>
        <p><strong>Fecha: </strong><?=$libro['fecha']?></p>
    </div>
</div>

    <!-- Incluimos el pie de página -->
<?php include("footer.php"); ?>