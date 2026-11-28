<?php
require_once("./includes/sessions.php");
require_once("./includes/crudCategorias.php");
require_once("./includes/crudLibros.php");

$sesion = new Sessions();
if (!$sesion->comprobarSesion()) {
    header("Location: ../login.php");
    exit();
}

$categoriaObj = new Categorias();
//listar todas las categorias para cargar en el select
$listaCategorias = $categoriaObj->showCategorias();

$libroObj = new Libros();
//listar todos los libros para cargar en la tabla
$listaLibros = $libroObj->getAll();

//obtener accion e ID de URL
$accion = $_GET['accion'] ?? null;
$id = $_GET['id'] ?? null;
$mensaje = "";

//eliminar
if ($accion === "eliminar" && $id){
    $libroObj->eliminarLibro($id);
    header("location:libros.php?mensaje_eliminada");
    exit();
}

if (isset($_GET['mensaje_eliminada'])){
    $mensaje = "Eliminado correctamente";
}

//rellenar el value del formulario (vacío o con la categoria si accion es editar)
$libro = ['titulo' => '',
        'autor' => '',
        'id_categoria' => '',
        'precio' => '',
        'fecha' => '',
        'portada' => ''
]; //si pulsamos en crear

if ($accion === "editar" && $id){
    $libro = $libroObj->getLibroById($id);
}

//procesar form (añadir o editar categoria)
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $id_categoria = $_POST['id_categoria'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];
    $portada = $_POST['portada'];

    if($accion === "crear"){
        $libroObj->insertarLibro($titulo, $autor, $id_categoria, $precio, $fecha, $portada);
    }elseif($accion === "editar" && $id){
        $libroObj->actualizarLibro($id, $titulo, $autor, $id_categoria, $precio, $fecha, $portada);
    }
    //redirección a libros.php
    header("location:libros.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include("./menu.php"); ?>

<!-- Contenedor principal -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <main class="col-md-10">
            <h2>Libros</h2>
            <?php if ($mensaje): ?>
                <div class="alert alert-success"><?= $mensaje ?></div>
            <?php endif; ?>

            <a href="libros.php?accion=crear" class="btn btn-success mb-3">Añadir nuevos Libros</a>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Portada</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listaLibros as $libroItem) : ?>
                    <tr>
                        <td><?=$libroItem['titulo']?></td>
                        <td><?=$libroItem['autor']?></td>
                        <td><?=$libroItem['nombre_categoria']?></td>
                        <td><?=$libroItem['precio']?></td>
                        <td><?=$libroItem['portada']?></td>
                        <td>
                            <a href="libros.php?accion=editar&id=<?=$libroItem['id_libro']?>" class="btn btn-sm btn-primary">Editar</a>
                            <a href="libros.php?accion=eliminar&id=<?=$libroItem['id_libro']?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>

            <?php if ($accion === "crear" || ($accion === "editar" && $id)): ?>
                <!-- Título dependiendo de si se está creando o editando -->
                <h3><?= $accion === "crear" ? "Nueva libro" : "Editar libro" ?></h3>
                <!-- Formulario -->
                <form method="post" class="mb-4" style="max-width: 400px;">
                    <div class="mb-2">
                        <label class="form-label">Titulo:</label>
                        <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($libro['titulo']) ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Autor:</label>
                        <input type="text" name="autor" class="form-control" value="<?= htmlspecialchars($libro['autor']) ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Categoria:</label>
                        <select name="id_categoria">
                            <?php foreach ($listaCategorias as $categoriaItem) : ?>
                            <option value="<?=$categoriaItem['id_categoria']?>"><?=$categoriaItem['categoria']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Fecha:</label>
                        <input type="text" name="fecha" class="form-control" value="<?= htmlspecialchars($libro['fecha']) ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Portada:</label>
                        <input type="text" name="portada" class="form-control" value="<?= htmlspecialchars($libro['portada']) ?>">
                    </div>
                    <!-- Botones para guardar o cancelar -->
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="libros.php" class="btn btn-secondary">Cancelar</a>
                </form>
            <?php endif; ?>

        </main>
    </div>
</div>

<?php include("./footer.php"); ?>
