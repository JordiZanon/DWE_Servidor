<?php
$moda = [
    ["camiseta", 22, 50],
    ["pantalones", 15, 0],
    ["gorra", 5],
    ["camisa", 5],
    ["chaqueta", 17, 95,"Disponible"]
];

for ($i = 0; $i < count($moda); $i++) {
    echo "Producto $i: ";
    for ($j = 0; $j < count($moda[$i]); $j++) {
        echo $moda[$i][$j];
        if ($j < count($moda[$i]) - 1) {
            echo " | ";
        }
    }
    echo "<br>";
}
?>