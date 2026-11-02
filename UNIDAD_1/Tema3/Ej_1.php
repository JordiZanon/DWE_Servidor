<?php
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transporte = strtolower(trim($_POST["transporte"] ?? ''));

    if ($transporte == "metro") {
        $mensaje = "El trayecto es de 10 minutos";
    } elseif ($transporte == "bus") {
        $mensaje = "El trayecto es de 20 minutos";
    } else {
        $mensaje = "El trayecto no se puede realizar";
    }
}
?>


    <form action="" method="POST">
        <label>Transporte: <input type="text" name="transporte"></label>
        <input type="submit" value="Enviar">
    </form>

<?php
if ($mensaje) {
    echo "<p>$mensaje</p>";
}
?>