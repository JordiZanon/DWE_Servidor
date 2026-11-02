<?php

$actividades = [
    ['nombre' => 'Actividad 1', 'fecha' => '30/09/2024', 'estado' => 'Pendiente'],
    ['nombre' => 'Actividad 2', 'fecha' => '14/10/2024', 'estado' => 'En progreso'],
    ['nombre' => 'Actividad 3', 'fecha' => '28/10/2024', 'estado' => 'Completada'],
    ['nombre' => 'Actividad 4', 'fecha' => '11/11/2024', 'estado' => 'Pendiente'],
    ['nombre' => 'Actividad 5', 'fecha' => '25/11/2024', 'estado' => 'Pendiente'],
];

$nombre = "Ana";
echo "Me llamo $nombre";
echo "<br><br>";

// Ejercicio 1: Recorrer el array con foreach y mostrarlo por pantalla.
echo "<h3>Ejercicio 1: foreach</h3>";
foreach ($actividades as $actividad) {
    echo "Nombre: ".$actividad['nombre']. "<br>";
    echo "Fecha: {$actividad['fecha']} <br>";
    echo "Estado: {$actividad['estado']}<br><br>";
}

// Ejercicio 2. Recorrer el array con for y mostrarlo por pantalla.
echo "<h3>Ejercicio 2: for</h3>";
for ($i = 0; $i < count($actividades); $i++) {
    echo "Nombre: {$actividades[$i]['nombre']}<br>";
    echo "Fecha: {$actividades[$i]['fecha']}<br>";
    echo "Estado: {$actividades[$i]['estado']}<br><br>";
}

// Ejercicio 3. Recorrer el array con foreach y obtener también el índice.
echo "<h3>Ejercicio 3: foreach con índice</h3>";
foreach ($actividades as $indice => $actividad) {
    echo "Índice: $indice<br>";
    echo "Nombre: {$actividad['nombre']}<br>";
    echo "Fecha: {$actividad['fecha']}<br>";
    echo "Estado: {$actividad['estado']}<br><br>";
}