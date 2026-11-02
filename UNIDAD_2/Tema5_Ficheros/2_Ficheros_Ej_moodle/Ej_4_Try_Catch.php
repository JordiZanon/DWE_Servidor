<!--Ejercicio 4. Crea un sistema que registre cualquier error de acceso a archivos en un archivo de log llamado error_log.txt.
 Si un archivo no puede abrirse, debe registrarse el error junto con la fecha y hora.-->




<?php
$log_file = 'error_log.txt';
$file = 'archivo_inexistente.txt';

// Intentar abrir el archivo
if (!file_exists($file)) {
    // Registrar el error en el log
    $fecha = date('d/m/Y H:i:s');
    $error_message = "$fecha - Error: El archivo $file no existe.\n";

    // Abrir el archivo de log en modo append
    $fp = fopen($log_file, 'a');
    fwrite($fp, $error_message);
    fclose($fp);

    echo "Error registrado en el archivo de log.";
} else {
    // Si el archivo existe, leer su contenido
    $fp = fopen($file, 'r');
    $contenido = fread($fp, filesize($file));
    fclose($fp);

    echo "Contenido del archivo: $contenido";

}

//OTRA FORMA

$archivo = 'archivo_inexistente.txt';

try {
    $contenido = file_get_contents($archivo);
    echo $contenido;
} catch (Throwable $e) {
    $fecha = (new DateTime())->format('Y-m-d H:i:s');
    $error = "[$fecha] Error accediendo a '$archivo': {$e->getMessage()}\n";
    file_put_contents('error_log.txt', $error, FILE_APPEND);
    echo "No se pudo acceder al archivo.";
}

