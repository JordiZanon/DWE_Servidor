<!--archivo crudLibros.php-->
<?php


require_once("database.php");

class Libros
{
    private Connection $db;
    private $conn;

    public function __construct()
    {
        $this->db = new Connection();
        $this->conn = $this->db->getConnection();
    }

    // Obtener libros más populares ordenados por visitas (por defecto 4)
    public function getPopulares($limite = 4)
    {
        try {
            $sql = "SELECT * FROM libros ORDER BY visitas DESC LIMIT ?";

            // 1. Preparamos la consulta SQL (evita inyecciones SQL)
            $stmt = $this->conn->prepare($sql);

            // 2. Vinculamos el parámetro: "i" indica que es un número entero (integer) para el LIMIT
            $stmt->bind_param("i", $limite);

            // 3. Ejecutamos la consulta preparada
            $stmt->execute();

            // 4. Obtenemos los resultados
            $result = $stmt->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

        } catch (Exception $e) {
            return [];
        }
    }

    // Obtener libros más recientes ordenados por fecha
    public function getRecientes($limite = 4)
    {
        try {
            $sql = "SELECT * FROM libros ORDER BY fecha DESC LIMIT ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $limite);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

        } catch (Exception $e) {
            return [];
        }
    }

    // Filtrar libros por una categoría concreta usando su ID
    public function getByCategoria($id_categoria)
    {
        try {
            $sql = "SELECT * FROM libros WHERE id_categoria = ?";
            $stmt = $this->conn->prepare($sql); //prepare($sql): Prepara una consulta SQL en la base de datos utilizando comodines (?)
            // en lugar de meter los datos directamente. Es la herramienta clave para prevenir inyecciones SQL.
            $stmt->bind_param("i", $id_categoria); // Vinculamos el ID de la categoría recibido por GET
            //bind_param("i", $limite): Asocia variables reales a los comodines ? de una consulta preparada. El primer parámetro ("i")
            // indica el tipo de dato que se va a inyectar (por ejemplo, "i" de integer / entero, "s" de string / texto).
            $stmt->execute(); //execute(): Pone en marcha y lanza la ejecución de una consulta que previamente había sido preparada
            // con prepare() y enlazada con bind_param().
            $result = $stmt->get_result();

            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

        } catch (Exception $e) {
            return [];
        }
    }

    public function getlibroById($id)
    {
        try {
            $sql = "SELECT libros.* , categorias.categoria as nombre_categoria
                        FROM libros LEFT JOIN categorias
                        ON libros.id_categoria = categorias.id_categoria
                        WHERE id_libro = ?;";
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

    public function sumarVisita($id)
    {
        try {
            $sql = "UPDATE libros SET visitas = visitas +1 WHERE id_libro = ?;";
            $stmt = $this->conn->prepare($sql); //prepare($sql): Prepara una consulta SQL en la base de datos utilizando comodines (?)
            // en lugar de meter los datos directamente. Es la herramienta clave para prevenir inyecciones SQL.
            $stmt->bind_param("i", $id); // Vinculamos el ID de la categoría recibido por GET
            //bind_param("i", $limite): Asocia variables reales a los comodines ? de una consulta preparada. El primer parámetro ("i")
            // indica el tipo de dato que se va a inyectar (por ejemplo, "i" de integer / entero, "s" de string / texto).
            $stmt->execute(); //execute(): Pone en marcha y lanza la ejecución de una consulta que previamente había sido preparada
            // con prepare() y enlazada con bind_param().

        } catch (Exception $e) {
            return null;
        }
    }


    public function getAll()
    {
        try {
            $sql = "SELECT libros.* , categorias.categoria as nombre_categoria
                        FROM libros LEFT JOIN categorias
                        ON libros.id_categoria = categorias.id_categoria
                        ORDER BY titulo;";
           $result = $this->conn->query($sql);

            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

        } catch (Exception $e) {
            return [];
        }
    }

    public function insertarLibro($titulo, $autor, $id_categoria, $precio, $fecha, $portada) {
        try {
            $sql = "INSERT INTO libros (titulo,autor,id_categoria,precio,fecha,portada) VALUES (?,?,?,?,?,?,0)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssidss", $titulo, $autor, $id_categoria, $precio, $fecha, $portada);
            $stmt->execute();

        } catch (Exception $e) {
            return null;
        }
    }

    public function actualizarLibro($titulo, $autor, $id_categoria, $precio, $fecha, $portada, $id_libro) {
        try {
            $sql = "UPDATE libros SET titulo = ?, autor = ?, id_categoria = ?, precio = ?,fecha = ?, portada = ? WHERE id_libro = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssidssi", $titulo, $autor, $id_categoria, $precio, $fecha, $portada, $id_libro);
            $stmt->execute();

        } catch (Exception $e) {
            return null;
        }
    }

    public function eliminarLibro($id_libro) {
        try {
            $sql = "DELETE FROM libros WHERE id_libro = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id_libro);
            $stmt->execute();

        } catch (Exception $e) {
            return null;
        }
    }
    public function __destruct()
    {
        $this->db->closeConnection($this->conn);
    }
}

?>

