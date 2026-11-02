<?php
echo "Bienbenidos <b> 2DAW</b> ";

echo "<br/>";

$nombre = "Jordi";
$apellido = "Zzz";

echo $nombre;
echo "<br/>";
echo $apellido;

//Concatenar variables
echo "<br/>";
echo "Hola, q tal $nombre? ";

//Concatenar variables mas visual
echo "<br/>";
echo "Hola, q tal {$nombre} 2? ";

//Variable no se procesa
echo "<br/>";
echo 'Hola, q tal $nombre? ';

//Comilla simple concatenada con .
echo "<br/>";
echo 'Hola, q tal ' . $nombre . ' y el apellido es: ' .$apellido. ' 3?';



//Variables

function cumpleaños() {
// Establece la edad en 1
$edad= 1;
}
// Establece que la edad es 30
$edad= 30;
// invoca la función
cumpleaños();
// Muestra la edad
echo $edad;

//Esto muestra: 30

//Variables globales

function cumpleaños(){
// Define $edad como variable global
global $edad;
// Añade 1 al valor de $edad
$edad= $edad+ 1;
}
// Establece el valor de $edad en 30
$edad= 30;
// Invoca la función
cumpleaños();
// Muestra la edad
echo $edad;




?>

