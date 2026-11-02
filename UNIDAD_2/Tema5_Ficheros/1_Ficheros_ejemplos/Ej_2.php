<?php
$users_file = "users.txt";
file_exists($users_file) or die("Error: no existe el archivo");
$file = fopen($users_file, 'r');
$read_users_file = fgets($file); //leer archivo
fclose($file); //cerrar archivo
echo $read_users_file;