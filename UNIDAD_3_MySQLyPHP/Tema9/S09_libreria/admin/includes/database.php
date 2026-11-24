<!--archivo database.php-->
<?php

//Este archivo centraliza la conexión a la base de datos usando la librería orientada a objetos de MySQLi.
class Connection
{
    private $host = "localhost";
    private $user = "root"; // Credenciales por defecto de XAMPP
    private $pass = "";     // Credenciales por defecto de XAMPP
    private $dbname = "ud3_libreria";

    // Método para crear y devolver la conexión activa a la BD
    public function getConnection()
    {
        // Creamos un objeto mysqli con los datos de configuración
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        // Si hay un error de conexión, detenemos la ejecución y mostramos el error
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Forzamos el juego de caracteres a UTF-8 para evitar problemas con tildes y eñes
        $conn->set_charset("utf8");
        return $conn;
    }

    // Método para cerrar la conexión cuando ya no sea necesaria
    public function closeConnection($conn)
    {
        $conn->close();
    }
}

?>