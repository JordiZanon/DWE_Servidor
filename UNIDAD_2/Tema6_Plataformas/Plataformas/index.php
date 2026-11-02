<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- MOSTRAR ENLACES PLATAFORMAS -->
<?php
// Escaneamos la carpeta principal 'catalogo' para obtener la lista de plataformas (directorios)
$plataformas = scandir('catalogo');
?>

<?php for($i=2 ;$i<count($plataformas);$i++): ?>
    <!-- Generamos un enlace dinámico por cada plataforma para filtrar sus imágenes -->
    <a href="index.php?plataforma=<?=$plataformas[$i];?>">
        <?=$plataformas[$i];?>
    </a>
    &nbsp;&nbsp;
<?php endfor;?>
<!-- FIN MOSTRAR ENLACES PLATAFORMAS -->
<br><br>

<!-- Menú de navegación principal mediante parámetros GET -->
<a href="index.php?nueva_plataforma">Nueva plataforma</a>
<br>
<a href="index.php?nueva_imagen">Subir imagen</a>
<br>
<a href="index.php?elimnar_plataforma">Eliminar plataforma</a>
<br>
<br>

<!--  MOSTRAR IMÁGENES DE LA PLATAFORMA SELECCIONADA -->
<?php if(isset($_GET['plataforma'])): ?>
    <?php
    // Si el usuario hace clic en una plataforma, escaneamos su carpeta interna específica
    $imagen = scandir('catalogo/'.$_GET['plataforma']);
    ?>

    <?php for($i=2;$i<count($imagen);$i++):?>
        <!-- Mostramos cada imagen situada dentro de la carpeta de esa plataforma -->
        <img src="catalogo/<?=$_GET['plataforma']?>/<?=$imagen[$i]?>" width="200">
        <br>
    <?php endfor ?>
<?php endif ?>
<!--  FIN MOSTRAR IMÁGENES PLATAFORMA SELECCIONADA -->

<!--  MOSTRAR FORMULARIO PARA AÑADIR PLATAFORMA  -->
<?php if(isset($_GET['nueva_plataforma'])): ?>
    <form action="" method="post">
        <input type="text" name="nueva_plataforma">
        <input type="submit">
    </form>
<?php endif ?>
<!-- FIN MOSTRAR FORMULARIO AÑADIR PLATAFORMA  -->


<!--  PROCESAR FORMULARIO PARA AÑADIR PLATAFORMA  -->
<?php if(isset($_POST['nueva_plataforma'])): ?>
    <?php $nueva_p = $_POST['nueva_plataforma']; ?>

    <?php
    /*
     * EXPLICACIÓN DE LA LÍNEA MKDIR:
     * mkdir('catalogo/'.$nueva_p, 0755, true);
     * - 'catalogo/'.$nueva_p : Es la ruta completa y el nombre del directorio que queremos crear.
     * - 0755 : Son los permisos de Linux para la carpeta (lectura, escritura y ejecución para el creador; lectura y ejecución para los demás).
     * - true : Activa el modo recursivo. Significa que si faltara alguna carpeta intermedia de la ruta, PHP la crearía automáticamente.
     */
    mkdir('catalogo/'.$nueva_p, 0755, true);
    
    // Redirigimos para limpiar el formulario y refrescar la lista de plataformas
    header("location:index.php");
    ?>
<?php endif ?>
<!-- FIN PROCESAR FORMULARIO AÑADIR PLATAFORMA  -->

<!--  FORMULARIO PARA AÑADIR IMAGEN A UNA PLATAFORMA  -->
<?php if(isset($_GET['nueva_imagen'])): ?>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Creamos un desplegable (<select>) dinámico con las plataformas existentes -->
        <select name="select_plataforma">
            <?php for($i=2;$i<count($plataformas);$i++): ?>
                <option value="<?=$plataformas[$i]?>">
                    <?=$plataformas[$i]?>
                </option>
            <?php endfor;?>
        </select>
        <input type="file" name="imagen">
        <input type="submit">
    </form>
<?php endif ?>
<!-- FIN FORMULARIO PARA AÑADIR IMAGEN  -->

<!-- PROCESAR FORMULARIO PARA AÑADIR IMAGEN  -->
<?php if(isset($_FILES['imagen'])): ?>
    <?php
    $origen = $_FILES['imagen']['tmp_name'];
    // Guardamos la imagen dentro de la carpeta correspondiente a la plataforma elegida en el select
    $destino = "catalogo/".$_POST['select_plataforma']."/".$_FILES['imagen']['name'];
    move_uploaded_file($origen, $destino);
    ?>
<?php endif ?>
<!-- FIN PROCESAR FORMULARIO PARA AÑADIR IMAGEN  -->

<!--  FORMULARIO PARA ELIMINAR PLATAFORMA  -->
<?php if(isset($_GET['elimnar_plataforma'])): ?>
    <form action="" method="post">
        <select name="select_plataforma">
            <?php for($i=2;$i<count($plataformas);$i++): ?>
                <option value="<?=$plataformas[$i]?>">
                    <?=$plataformas[$i]?>
                </option>
            <?php endfor;?>
        </select>
        <input type="submit" name="eliminar_plataforma" value="Eliminar plataforma">
    </form>
<?php endif ?>
<!-- FIN FORMULARIO PARA ELIMINAR PLATAFORMA  -->

<!-- PROCESAR FORMULARIO PARA ELIMINAR PLATAFORMA  -->
<?php if(isset($_POST['eliminar_plataforma'])): ?>
    <?php
    $carpetaAEliminar = 'catalogo/' . $_POST["select_plataforma"];

    // 1. Comprobamos que realmente es un directorio válido
    if (is_dir($carpetaAEliminar)) {

        // 2. Escaneamos todos los archivos que hay dentro de la carpeta
        $archivosInternos = scandir($carpetaAEliminar);

        // 3. Recorremos el contenido ignorando el '.' y el '..'
        foreach ($archivosInternos as $archivo) {
            if ($archivo != "." && $archivo != "..") {
                // Borramos cada archivo de dentro usando unlink()
                unlink($carpetaAEliminar . "/" . $archivo);
            }
        }

        // 4. Una vez que la carpeta está completamente vacía, ya podemos borrarla con rmdir()
        rmdir($carpetaAEliminar);
    }

    header('location:index.php');
    ?>
<?php endif ?>
<!-- FIN PROCESAR FORMULARIO PARA ELIMINAR PLATAFORMA  -->







<!-- Otra forma pero sin q se pueda borrar la carpeta, por q tiene contenido dentro  -->
<!-- PROCESAR FORMULARIO PARA ELIMINAR PLATAFORMA  -->
<?php //if(isset($_POST['eliminar_plataforma'])): ?>
<!--    --><?php
//    // rmdir() solo borra carpetas si están VACÍAS. Si tienen archivos dentro, dará error.
//    rmdir ('catalogo/'.$_POST["select_plataforma"]);
//
//    header('location:index.php');
//    ?>
<?php //endif ?>
<!-- FIN PROCESAR FORMULARIO PARA ELIMINAR PLATAFORMA  -->
</body>
</html>