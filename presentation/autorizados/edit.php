<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// edit_user.php
require_once '../../business/AutorizadoService.php';

$autorizadoService = new AutorizadoService();

// Verificar si se recibe un ID de usuario para editar
if (isset($_GET['id'])) {
    $autorizadoId = $_GET['id'];
    $autorizado = $autorizadoService->getAuById($autorizadoId);

    if (!$autorizado) {
        echo "Personal autorizado no encontrado.";
        exit;
    }
} else {
    echo "ID de autorizado no proporcionado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $idNi = $_POST['idNi'];
    $nombre = $_POST['nombre_autorizado'];
    $telefono = $_POST['telefono_autorizado'];
    $parentesco = $_POST['parentesco'];
    $estado = $_POST['estado'];

    // Actualizar usuario existente
    $success = $autorizadoService->updateAu($autorizadoId, $idNi, $nombre, $telefono,$parentesco, $estado);

    if ($success) {
        header('Location: index.php'); // Redirigir a la lista de usuarios
        exit;
    } else {
        echo "Error al actualizar al personal.";
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
                        <h1 class="page-header">Editar Personal Autorizado</h1>
                    </div>
                </div>

                <form action="edit.php?id=<?php echo $autorizadoId; ?>" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre del Niño</label>
                        <!-- El nombre del niño se mostrará aquí, pero no es editable -->
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($autorizado['nombre_niño']); ?>" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_autorizado">Nombre de la persona Autorizada</label>
                        <input type="text" class="form-control" id="nombre_autorizado" name="nombre_autorizado" value="<?php echo htmlspecialchars($autorizado['nombre_autorizado']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono_autorizado">Telefono</label>
                        <input type="text" class="form-control" id="telefono_autorizado" name="telefono_autorizado" value="<?php echo htmlspecialchars($autorizado['telefono_autorizado']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="parentesco">Parentesco</label>
                        <input type="text" class="form-control" id="parentesco" name="parentesco" value="<?php echo htmlspecialchars($autorizado['parentesco']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1" <?= isset($autorizado['estado']) && $autorizado['estado'] == 1 ? 'selected' : '' ?>>Activo</option>
                            <option value="0" <?= isset($autorizado['estado']) && $autorizado['estado'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                        </select>
                    </div>

                    <!-- Campo oculto para enviar niño_id -->
                    <input type="hidden" name="idNi" value="<?php echo htmlspecialchars($autorizado['niño_id']); ?>">

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