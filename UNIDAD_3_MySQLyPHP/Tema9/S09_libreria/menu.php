<!--archivo menu.php-->
<?php
// Importamos el CRUD de categorías
require_once "./admin/includes/crudCategorias.php";

// Instanciamos el objeto admin\includes\admin\includes\Categorias
$categoriasObj = new Categorias();

// Obtenemos el array con todas las categorías de la BD
$categorias = $categoriasObj->showCategorias();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="logo.png" alt="Logo" height="40">
        </a>
        <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
            <li class="nav-item"><a class="nav-link" href="login.php">Acceso privado</a></li>
        </ul>
    </div>
</nav>

<div class="container-fluid mt-4">
    <div class="row">
        <!-- Menú lateral de categorías generado de forma dinámica -->
        <aside class="col-md-3">
            <h4>Categorías</h4>
            <ul class="list-group">
                <?php foreach ($categorias as $cat) : ?>
                    <li class="list-group-item">
                        <!-- Cada enlace envía el ID de la categoría por el método GET (?cat=ID) -->
                        <a href="index.php?cat=<?= $cat['id_categoria'] ?>" class="text-decoration-none">
                            <?= $cat['categoria'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </aside>