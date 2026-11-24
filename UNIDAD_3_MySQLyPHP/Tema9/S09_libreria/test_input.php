<!--archivo test_input.php-->
<?php

function test_input($data)
{
    $data = trim($data); // elimina espacio vacíos
    $data = stripslashes($data); //elimina la contra barra
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}
