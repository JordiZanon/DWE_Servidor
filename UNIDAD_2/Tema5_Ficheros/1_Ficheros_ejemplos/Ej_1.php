<?php

$file = fopen("fichero1.txt", "r");
fread($file, filesize("fichero1.txt")); // Permite leer el fichero hasta el final
fclose($file);