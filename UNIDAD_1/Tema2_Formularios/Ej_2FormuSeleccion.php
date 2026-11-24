<?php
// Mostrar errores (opcional)
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Array de frutas
$frutas = ["Manzana", "Plátano", "Naranja", "Uva", "Melón"];


// Comprobamos si se ha enviado el formulario y no esta vacío
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["fruta"])) {
    $frutaSeleccionada =$_POST["fruta"];
    echo "<h3>Tu fruta favorita es: $frutaSeleccionada</h3>";
    echo '<a href="">Volver</a>';
} else {
    ?>
    <h3>Selecciona tu fruta favorita:</h3>
    <form method="POST" action="">
        <label for="fruta">Fruta:</label>
<!--        id="fruta" (Para el navegador / HTML / CSS / JavaScript): Es el identificador único del elemento dentro de la página web.
vincula la etiqueta <label for="fruta">-->
        <select name="fruta" id="fruta">
            <option value="">-- Elige una fruta --</option>
<!--            Opción 1: Sintaxis clásica (PHP + echo)-->
            <?php
            foreach ($frutas as $fruta) {
                echo "<option value=".$fruta.">".$fruta."</option>";
            }
            ?>

<!--            Opción 2: Sintaxis alternativa o de plantilla (Recomendada para HTML)-->
            <?php foreach ($frutas as $fruta) : ?>
                <option value="<?= $fruta ?>">
                    <?= $fruta ?>
                </option>
            <?php endforeach ?>

        </select>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
}
?>