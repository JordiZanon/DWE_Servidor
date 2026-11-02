<?php
$datos = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clave = trim($_POST["clave"] ?? '');
    $valor = trim($_POST["valor"] ?? '');

    if ($clave && $valor) {
        $datos[$clave] = $valor;
    }
}
?>

    <form method="POST">
        <label>Clave: <input type="text" name="clave"></label><br>
        <label>Valor: <input type="text" name="valor"></label><br>
        <input type="submit" value="Añadir al array">
    </form>

<?php
if (!empty($datos)) {
    echo "<h3>Array asociativo:</h3><pre>";
    print_r($datos);
    echo "</pre>";
}
