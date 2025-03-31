<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// edit_user.php
require_once '../../business/PersonalService.php';

$personalService = new PersonalService();

// Verificar si se recibe un ID de usuario para editar
if (isset($_GET['id'])) {
    $personalId = $_GET['id'];
    $personal = $personalService->getPeById($personalId);

    if (!$personal) {
        echo "Personal no encontrado.";
        exit;
    }
} else {
    echo "ID de Personal no proporcionado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $cargo = $_POST['cargo'];
    $estado = $_POST['estado'];

    // Actualizar usuario existente
    $success = $personalService->updatePersonal($personalId, $nombre, $apellido, $telefono, $cargo, $estado);

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
                        <h1 class="page-header">Editar Personal</h1>
                    </div>
                </div>

                <form action="edit.php?id=<?php echo $personalId; ?>" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($personal['nombre_personal']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo htmlspecialchars($personal['apellido_personal']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($personal['telefono_personal']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo htmlspecialchars($personal['cargo']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1" <?= isset($personal['estado']) && $personal['estado'] == 1 ? 'selected' : '' ?>>Activo</option>
                            <option value="0" <?= isset($personal['estado']) && $personal['estado'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                        </select>
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