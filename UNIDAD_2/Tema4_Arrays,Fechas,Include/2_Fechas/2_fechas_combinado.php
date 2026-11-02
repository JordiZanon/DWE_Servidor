<?php
echo "<b>EJEMPLO DateTime - format - getTimestamp - clone - modify</b><br>";
$fechaOriginal = new DateTime('20-09-2025 10:00:00');

echo "Fecha original: " . $fechaOriginal->format('d-m-Y H:i:s') . "<br>";
echo "Timestamp original: " . $fechaOriginal->getTimestamp() . "<br><br>";

$fechaModificada = clone $fechaOriginal;
$fechaModificada->modify('+5 days 3 hours');

echo "Fecha modificada (+5día y +3horas): " . $fechaModificada->format('d-m-Y H:i:s') . "<br>";
echo "Timestamp modificado: " . $fechaModificada->getTimestamp() . "<br><br>";
echo "Fecha original después de modificar la copia: " . $fechaOriginal->format('d-m-Y H:i:s') . "<br><br><br>";



echo "<b>EJEMPLO DateTime - DateInterval - add - format</b> <br>";
$fecha = new DateTime('2024-10-01');
$intervalo = new DateInterval('P2W');
$fecha->add($intervalo);

echo $fecha->format('d/m/Y');
echo "<br><br><br>";


echo "<b>EJEMPLO DateTime - DateInterval - DatePeriod - format</b> <br>";
$inicio = new DateTime('2024-10-01');
$fin = new DateTime('2024-12-31');

$intervalo = new DateInterval('P2W');
$periodo = new DatePeriod($inicio, $intervalo, $fin);

foreach ($periodo as $fecha) {
    echo $fecha->format('d/m/Y') . "<br>";
}
echo "<br><br><br>";


echo "<b>EJEMPLO DateTime - modify - IntlDateFormatter - format</b> <br>";
$fecha = new DateTime('2024-10-01');
$fecha->modify('+1 month');
$formatter = new IntlDateFormatter(
    'es_ES',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE);

echo $formatter->format($fecha);
//echo $formatter->format("d/m/Y");