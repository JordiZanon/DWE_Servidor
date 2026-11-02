<!--Ejercicio 2. Crea un archivo llamado log.txt que guarde mensajes de eventos.
Cada entrada debe incluir la fecha en formato corto (dd/mm/aaaa) y el mensaje asociado.-->


<?php
$file = 'log.txt';

// Mensaje que se desea registrar en el log
$mensaje = "Usuario ha accedido al sistema.";

// Obtener la fecha actual en formato dd/mm/aaaa
$fecha = date('d/m/Y');

// Abrir el archivo en modo de escritura (append)
$fp = fopen($file, 'a');

// Escribir la fecha y el mensaje en el archivo
fwrite($fp, "$fecha - $mensaje\n");

// Cerrar el archivo
fclose($fp);

echo "Mensaje registrado en el log.";



//OTRA FORMA

/*
$mensaje = "El usuario accedió al sistema.";
$fecha = (new DateTime())->format('d/m/Y');
$log = "[$fecha] $mensaje\n";

file_put_contents("log.txt", $log, FILE_APPEND);
*/