<!--archivo index.php-->
<?php
// Forzamos a PHP a mostrar todos los errores en pantalla (útil para depurar)
ini_set('display_errors', '1');
error_reporting(E_ALL);

// Requerimos el CRUD de libros
require_once "./admin/includes/crudLibros.php";
// Instanciamos el objeto admin\includes\admin\includes\Libros
$libroObj = new Libros();
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
<?php
// Comprobamos si el usuario ha hecho clic en una categoría (si existe 'cat' en la URL)
if (isset($_GET['cat'])) {
    $libros = $libroObj->getByCategoria($_GET['cat']);
    echo "<h3>admin\includes\Libros de la categoría seleccionada</h3><div class='row'>";
} else {
    // Si no hay categoría seleccionada, cargamos populares y recientes para la portada
    $librosPop = $libroObj->getPopulares();
    $librosNew = $libroObj->getRecientes();
    echo "<h3>admin\includes\Libros + populares</h3><div class='row'>";
    $libros = $librosPop; // Por defecto mostramos los populares en el primer bloque
}?>

    <!-- Bucle para pintar los libros del primer bloque -->
<?php foreach ($libros as $libro) : ?>
    <div class="col-md-3 text-center mb-4">
        <a href="libro.php?id=<?= $libro['id_libro']?>">
            <img src="portadas/<?= $libro['portada']?>" class="img-fluid" alt="<?= $libro['titulo']?>">
        </a>
        <p><?= $libro['titulo']?></p>
    </div>
<?php endforeach; ?>
    </div>

    <!-- Bloque de Novedades: Solo se muestra si NO estamos dentro de una categoría específica -->
<?php if (!isset($_GET['cat'])) : ?>
    <h3>Novedades</h3>
    <div class='row'>
        <?php foreach ($librosNew as $libro) : ?>
            <div class="col-md-3 text-center mb-4">
                <a href="libro.php?id=<?= $libro['id_libro']?>">
                    <img src="portadas/<?= $libro['portada']?>" class="img-fluid" alt="<?= $libro['titulo']?>">
                </a>
                <p><?= $libro['titulo']?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <!-- Incluimos el pie de página -->
<?php include("footer.php"); ?>