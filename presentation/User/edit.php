<?php
// edit_user.php
require_once '../../business/UsuarioService.php';

$userService = new UserService();

// Verificar si se recibe un ID de usuario para editar
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $user = $userService->getUserById($userId);

    if (!$user) {
        echo "Usuario no encontrado.";
        exit;
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $estado = $_POST['estado'];

    // Actualizar usuario existente
    $success = $userService->updateUser($userId, $nombre, $apellido, $email, $password, $estado);

    if ($success) {
        header('Location: index.php'); // Redirigir a la lista de usuarios
        exit;
    } else {
        echo "Error al actualizar el usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuario - Startmin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/metisMenu.min.css" rel="stylesheet">
    <link href="../../public/css/timeline.css" rel="stylesheet">
    <link href="../../public/css/startmin.css" rel="stylesheet">
    <link href="../../public/css/morris.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
    <?php include '../Shared/nav.php'; ?>

    <?php include '../Shared/aside.php'; ?>
    <!-- /.sidebar -->

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Usuario</h1>
                    </div>
                </div>

                <form action="edit.php?id=<?php echo $userId; ?>" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($user['nombre']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo htmlspecialchars($user['apellido']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Etado</label>
                        <input type="number" class="form-control" id="estado" name="estado" value="<?php echo htmlspecialchars($user['estado']); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
                <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista</a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <script src="../../public/js/metisMenu.min.js"></script>
    <script src="../../public/js/startmin.js"></script>
</body>

</html>