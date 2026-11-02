<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos lo que el usuario eligió en el desplegable
    $respuesta = $_POST['respuesta'] ?? '';

    if ($respuesta == 'Si') {
        // Si la respuesta es "Si", simplemente lo mostramos en pantalla
        echo "<h1>Si</h1>";

    } elseif ($respuesta == 'No') {
        // Si la respuesta es "No", usamos header() para devolverlo a index.php
        // Le pegamos la variable ?error=1 a la URL para enviarle una señal
        header("Location: Ej_2A_index.php?error=1");

        // MUY IMPORTANTE: Siempre debes poner exit() después de un header()
        // para detener la ejecución del servidor inmediatamente.
        exit();
    }
} else {
    // Si alguien intenta entrar a enviado.php escribiendo la dirección en el navegador
    // sin darle al botón de Enviar, lo mandamos de vuelta al inicio.
    header("Location: Ej_2A_index.php");
    exit();
}
?>