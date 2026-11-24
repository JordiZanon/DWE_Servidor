<!--archivo sessions.php-->
<?php


require_once("database.php");

class sessions
{
    private Connection $db;
    private $conn;

    // Constructor: se ejecuta automáticamente al hacer 'new admin\includes\admin\includes\Categorias()'
    public function __construct()
    {
        $this->db = new Connection(); // Instanciamos la clase admin\includes\admin\includes\Connection
        $this->conn = $this->db->getConnection(); // Obtenemos la conexión real de mysqli
    }

    public function comprobarCredenciales($username, $password)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE username = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            $usuario = $result->fetch_assoc();
//          fetch_assoc()  Obtiene una única fila del resultado de la consulta como un array asociativo.

            if ($usuario && password_verify($password, $usuario['password'])) {
                return $usuario;
            }

        } catch (Exception $e) {
            return null;
        }
    }

    public function crearSesion($usuario)
    {
        session_start();
        $_SESSION["usuario"] = $usuario;
    }

    public function comprobarSesion()
    {
        session_start();
        return isset($_SESSION["usuario"]);
    }

    public function cerrarSesion()
    {
        session_start();
        session_destroy();
    }

    public function __destruct()
    {
        $this->db->closeConnection($this->conn); // Cerramos la conexión con la BD
    }
}
