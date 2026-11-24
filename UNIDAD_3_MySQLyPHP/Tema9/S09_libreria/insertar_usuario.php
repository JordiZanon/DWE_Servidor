<!--archivo insertar_usuario.php-->
<?php

include_once("./admin/includes/database.php");

$usuarios = [
    ['Administrador', '', 'admin@solvam.es', 'admin', 'admin123']
];

$db = new Connection();
$conn = $db->getConnection();

foreach ($usuarios as $u) {
    $nombre = $u[0];
    $apellidos = $u[1];
    $email = $u[2];
    $username = $u[3];
    $password = password_hash($u[4], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, apellidos, email, username, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $apellidos, $email, $username, $password);
    $stmt->execute();
}

echo "Usuarios insertados correctamente";
$db->closeConnection($conn);
?>