<?php
$file = fopen("new_file.txt", "w");
$add_text = "Alba Abad \t ";
fwrite($file, $add_text);
$add_text = "Carlos Blanco \t ";
fwrite($file, $add_text);
fclose($file);