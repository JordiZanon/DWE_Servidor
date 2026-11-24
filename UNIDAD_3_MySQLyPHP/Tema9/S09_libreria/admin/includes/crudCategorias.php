<!--archivo crudCategorias.php-->
<?php
//Clase encargada de comunicarse con la tabla categorias.

// Requerimos el archivo de conexión para poder instanciarlo
require_once("database.php");
//require_once("database.php"): Carga e incluye un archivo externo obligatorio (en este caso, la conexión).
// El _once asegura que, si el archivo ya se había incluido antes en el código, no se vuelva a cargar otra vez para evitar conflictos.
// Si el archivo no existe, detiene la página con un error fatal.

class Categorias
{
    private Connection $db;
    private $conn;

    // Constructor: se ejecuta automáticamente al hacer 'new admin\includes\admin\includes\Categorias()'
    public function __construct() {
        $this->db = new Connection(); // Instanciamos la clase admin\includes\admin\includes\Connection
        $this->conn = $this->db->getConnection(); // Obtenemos la conexión real de mysqli
    }

    // Método para obtener todas las categorías de la base de datos
    public function showCategorias() {
        try {
            $sql = "SELECT * FROM categorias";
            $result = $this->conn->query($sql); // Ejecutamos la consulta directamente

            // Si hay resultado, devolvemos todas las filas como un array asociativo. Si no, un array vacío.
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

        } catch (Exception $e) {
            // Si ocurre algún fallo, capturamos la excepción y devolvemos array vacío para que la web no pete
            return [];
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM categorias WHERE id_categorias = ?;";
            $stmt = $this->conn->prepare($sql); //prepare($sql): Prepara una consulta SQL en la base de datos utilizando comodines (?)
            // en lugar de meter los datos directamente. Es la herramienta clave para prevenir inyecciones SQL.
            $stmt->bind_param("i", $id); // Vinculamos el ID de la categoría recibido por GET
            //bind_param("i", $limite): Asocia variables reales a los comodines ? de una consulta preparada. El primer parámetro ("i")
            // indica el tipo de dato que se va a inyectar (por ejemplo, "i" de integer / entero, "s" de string / texto).
            $stmt->execute(); //execute(): Pone en marcha y lanza la ejecución de una consulta que previamente había sido preparada
            // con prepare() y enlazada con bind_param().
            $result = $stmt->get_result();

            return $result ? $result->fetch_assoc() : null;

        } catch (Exception $e) {
            return null;
        }
    }

    public function insertarCategoria($nombre) {
        try {
            $sql = "INSERT INTO categorias (categoria) VALUES (?)";
            $stmt = $this->conn->prepare($sql); //prepare($sql): Prepara una consulta SQL en la base de datos utilizando comodines (?)
            // en lugar de meter los datos directamente. Es la herramienta clave para prevenir inyecciones SQL.
            $stmt->bind_param("s", $nombre); // Vinculamos el ID de la categoría recibido por GET
            //bind_param("i", $limite): Asocia variables reales a los comodines ? de una consulta preparada. El primer parámetro ("i")
            // indica el tipo de dato que se va a inyectar (por ejemplo, "i" de integer / entero, "s" de string / texto).
            $stmt->execute(); //execute(): Pone en marcha y lanza la ejecución de una consulta que previamente había sido preparada
            // con prepare() y enlazada con bind_param().

        } catch (Exception $e) {
            return null;
        }
    }

    public function actualizarCategoria($id,$nombre) {
        try {
            $sql = "UPDATE categorias set categoria = ? WHERE id_categorias = ?";
            $stmt = $this->conn->prepare($sql); //prepare($sql): Prepara una consulta SQL en la base de datos utilizando comodines (?)
            // en lugar de meter los datos directamente. Es la herramienta clave para prevenir inyecciones SQL.
            $stmt->bind_param("si", $nombre, $id); // Vinculamos el ID de la categoría recibido por GET
            //bind_param("i", $limite): Asocia variables reales a los comodines ? de una consulta preparada. El primer parámetro ("i")
            // indica el tipo de dato que se va a inyectar (por ejemplo, "i" de integer / entero, "s" de string / texto).
            $stmt->execute(); //execute(): Pone en marcha y lanza la ejecución de una consulta que previamente había sido preparada
            // con prepare() y enlazada con bind_param().

        } catch (Exception $e) {
            return null;
        }
    }

    public function eliminarCategoria($id) {
        try {
            $sql = "DELETE FROM categorias WHERE id_categoria = ?";
            $stmt = $this->conn->prepare($sql); //prepare($sql): Prepara una consulta SQL en la base de datos utilizando comodines (?)
            // en lugar de meter los datos directamente. Es la herramienta clave para prevenir inyecciones SQL.
            $stmt->bind_param("i",$id); // Vinculamos el ID de la categoría recibido por GET
            //bind_param("i", $limite): Asocia variables reales a los comodines ? de una consulta preparada. El primer parámetro ("i")
            // indica el tipo de dato que se va a inyectar (por ejemplo, "i" de integer / entero, "s" de string / texto).
            $stmt->execute(); //execute(): Pone en marcha y lanza la ejecución de una consulta que previamente había sido preparada
            // con prepare() y enlazada con bind_param().

        } catch (Exception $e) {
            return null;
        }
    }
    // Destructor: se ejecuta automáticamente al terminar el script para limpiar recursos
    public function __destruct()
    {
        $this->db->closeConnection($this->conn); // Cerramos la conexión con la BD
    }
}

?>