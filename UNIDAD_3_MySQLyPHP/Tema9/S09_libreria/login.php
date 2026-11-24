<!--archivo login.php-->
<?php


require_once "test_input.php";

require_once "./admin/includes/sessions.php";

$sesion = new sessions();

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (($_POST['username'] == '') || ($_POST['password']== '')){
        $error = "Debes rellenar los datos del formulario";
   
    }else{
    
        $usuario = test_input($_POST['username']);
        $clave = test_input($_POST['password']);
        $datos = $sesion->comprobarCredenciales($usuario, $clave);
        
        if ($datos) {
            $sesion->crearSesion($datos);
            header("Location: admin/index.php");
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos";
        }
    }
}

if (isset($_GET['end_auth'])){
    $success = "Sesión finalizada con éxito";
}

if (isset($_GET['no_auth'])){
    $error = "Acceso no autorizado";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso privado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include("menu.php"); ?>

<main class="col-md-9">
    <h2>Iniciar sesión</h2>
    
    <form method="POST" class="mt-3" style="max-width: 400px;">
        <p>La primera vez, ejecuta el archivo insertar_usuario.php</p>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <div class="mb-3">
            <label for="username" class="form-label">Usuario:</label>
            <input type="text" placeholder="admin" name="username" id="username" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" placeholder="admin123" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</main>


<?php include("footer.php"); ?>
