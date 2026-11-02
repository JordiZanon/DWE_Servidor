<?php

echo "MOSTRAR ELEMENTOS DE ARRAY INDEXADO <br>";
$colores = ["rojo", "verde", "azul"];
echo "Los colores son " . $colores[0] . ", " . $colores[1] . " y " . $colores[2] . ".";
echo "<br>";

echo "<br>MOSTRAR CANTIDAD DE ELEMENTOS DE ARRAY INDEXADO <br>";
$colores = ["rojo", "verde", "azul"];
echo count($colores);
echo "<br>";

echo "<br>MOSTRAR ELEMENTOS DE ARRAY INDEXADO RECORRIENDO ARRAY<br>";
$colores = ["rojo", "verde", "azul"];
$ultimo = count($colores);
for ($i = 0; $i < $ultimo; $i++) {
    echo $colores[$i];
    echo "<br>";
}

print "<br>Recorrer indexado con foreach<br>";
//Recorrer array indexado con un foreach
foreach ($colores as $c) {
    if ($c == "rojo") {
        echo "Antirrojo";
        echo "<br>";
    }else{
        echo $c;
        echo "<br>";
    }

}

echo "<br>MOSTRAR ELEMENTOS DE ARRAY ASOCIATIVO RECORRIENDO ARRAY<br>";
$altura = ["Maria" => "1.65", "Paula" => "1.68", "Ana" => "1.70"];
foreach ($altura as $i => $i_valor) {
    echo "Clave=" . $i . ", Valor=" . $i_valor;
    echo "<br>";
}



