<?php
$imagen = $_GET['img'] ?? '';
unlink("upload/".$imagen);  //Ruta de imagen
header('location:index.php'); //Ruta de vuelta a inicio
?>