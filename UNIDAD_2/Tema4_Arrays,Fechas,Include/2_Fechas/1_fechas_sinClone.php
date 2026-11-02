<?php

echo "Ejemplo sin clone (modifica ambos)<br>";
$fecha1 = new DateTime('20-09-2025');
$fecha2 = $fecha1;
$fecha2->modify('+1 day');

echo $fecha1->format('d-m-Y');

/*
echo "Ejemplo con clone (solo modifica la copia)<br>";
$fecha1 = new DateTime('20-09-2025');

$fecha2 = clone $fecha1;
//$fecha2 =  new DateTime('20-09-2025');

$fecha2->modify('+1 day');

echo $fecha1->format('d-m-Y')."<br>";
echo $fecha2->format('d-m-Y');
*/