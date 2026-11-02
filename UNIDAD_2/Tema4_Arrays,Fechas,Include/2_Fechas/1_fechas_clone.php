
<?php                                 //La a es para poner el am y pm de la hora en formatos de 12h
echo " Hoy es " . date ("d/m/Y H:i:sa"). " <br> " ;
echo " Hoy es " . date ("d.m.Y"). " <br> " ;
echo " Hoy es " . date ("d-m-Y") . " <br> " ;
echo " Son las " . date ("H:i:sa" ). " <br><br> " ;


date_default_timezone_set("Japan") ;
echo "En Japón son las " . date("h:i:sa"). " <br><br> " ;

date_default_timezone_set("America/New_York") ;
echo "En Nueva York son las " . date("h:i:sa"). " <br><br> " ;


//https://www.php.net/manual/en/timezones.europe.php