<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../business/EnfermedadService.php';

$enfermedadService = new EnfermedadService();

// Verificar si se recibe un ID de usuario para editar
if (isset($_GET['id'])) {
    $idEn = $_GET['id'];
    $enfermedad = $enfermedadService->getEnById($idEn);

    if (!$enfermedad) {
        echo "Registro no encontrado.";
        exit;
    }
} else {
    echo "ID de registro no proporcionado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $idNi = (int) $_POST['idNi'];
    $descripcion = $_POST['descripcion'];
    $medicamento = $_POST['medicamento'] ?? '';
    $estado = (int) $_POST['estado'];

    $success = $enfermedadService->updateEn($idEn, $idNi, $descripcion, $medicamento, $estado);

    if ($success) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error al actualizar el registro.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Enfermedad</title>
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/startmin.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <?php include '../Shared/nav.php'; ?>
        <?php include '../Shared/aside.php'; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Registro de Enfermedad</h1>
                    </div>
                </div>

                <form action="edit.php?id=<?php echo $idEn; ?>" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre del Niño</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" 
                               value="<?php echo htmlspecialchars($enfermedad['nombre_niño'] ?? ''); ?>" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" 
                               value="<?php echo htmlspecialchars($enfermedad['descripcion'] ?? ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="medicamento">Medicamento</label>
                        <input type="text" class="form-control" id="medicamento" name="medicamento" 
                               value="<?php echo htmlspecialchars($enfermedad['medicamento'] ?? ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1" <?= isset($enfermedad['estado']) && $enfermedad['estado'] == 1 ? 'selected' : '' ?>>Con Síntomas</option>
                            <option value="0" <?= isset($enfermedad['estado']) && $enfermedad['estado'] == 0 ? 'selected' : '' ?>>Recuperado</option>
                        </select>
                    </div>

                    <input type="hidden" name="idNi" value="<?php echo htmlspecialchars($enfermedad['niño_id'] ?? ''); ?>">

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
                <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista</a>
            </div>
        </div>
    </div>

    <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
</body>
</html>
