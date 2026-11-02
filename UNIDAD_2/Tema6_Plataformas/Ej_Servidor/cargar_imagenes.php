<?php

if (isset($_FILES['imagen'])) {
    if ($_FILES['imagen']['error'] > 0) {
        echo "Error";
    } else {
        echo "Nombre: " . $_FILES['imagen']['name'];
        echo "<br>Tipo: " . $_FILES['imagen']['type'];
        echo "<br>Tamaño: " . ($_FILES['imagen']['size'] / 1024) . "KB";
        echo "<br>Imagen en temporal: " . $_FILES['imagen']['tmp_name'];
    }
    if (file_exists("upload/" . $_FILES['imagen']['name'])) {
        echo " La imagen ya existe";
        echo "<br>Imagen en upload : " . $_FILES['imagen']['tmp_name'];
    } else {
        $origen = $_FILES['imagen']['tmp_name'];
        $destino = "upload/" . $_FILES['imagen']['name'];
        move_uploaded_file($origen, $destino);

    }
}
?>

<br>
<br>
<a href="upload/<?=$_FILES['imagen']['name']?>" download>Descargar imagen</a>

<br>
<br>
<a href="eliminar.php?img=<?=$_FILES['imagen']['name']?>">Eliminar imagen</a>


<?php
$upload = scandir('upload'); //array
foreach ($upload as $img){
    echo $img;
    echo "<br>";
}
?>

<br>
<br>
<?php   //Fijarse q empieza por 2
for($i=2;$i<count($upload);$i++):?>
    <img src="upload/<?=$upload[$i]?>" width="200">
    <br>
    <a href="upload/<?=$upload[$i]?>" download>Descargar imagen</a>


<?php endfor; ?>


