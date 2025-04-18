<?php
require_once '../../business/InscripcionService.php';

$inscripcionService = new InscripcionService();

// Verificar si se recibe un ID de inscripción para editar
if (isset($_GET['id'])) {
    $inscripcionId = intval($_GET['id']);
    $inscripcion = $inscripcionService->getInscripcionById($inscripcionId);

    if (!$inscripcion) {
        echo "Inscripción no encontrada.";
        exit;
    }
} else {
    echo "ID de inscripción no proporcionado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario con validación para evitar errores
    $nombre_nino = $_POST['nombre_nino'] ?? '';
    $fecha_inscripcion = $_POST['fecha_inscripcion'] ?? '';
    $estado_pago = $_POST['estado_pago'] ?? '';

    // Actualizar los datos de la inscripción
    $success = $inscripcionService->updateInscripcion($inscripcionId, $nombre_nino, $fecha_inscripcion, $estado_pago);

    if ($success) {
        header('Location: index.php'); // Redirigir a la lista de inscripciones
        exit;
    } else {
        echo "Error al actualizar los datos de la inscripción.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Inscripción</title>
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/startmin.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <?php include '../Shared/nav.php'; ?>
        <?php include '../Shared/aside.php'; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <h1 class="page-header">Editar Inscripción</h1>

                <form action="edit.php?id=<?php echo $inscripcionId; ?>" method="post">
                    <div class="form-group">
                        <label for="nombre_nino">Nombre del Niño</label>
                        <input type="text" class="form-control" id="nombre_nino" name="nombre_nino" 
                            value="<?php echo isset($inscripcion['nombre_nino']) ? htmlspecialchars($inscripcion['nombre_nino']) : ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="fecha_inscripcion">Fecha de Inscripción</label>
                        <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion" 
                            value="<?php echo isset($inscripcion['fecha_inscripcion']) ? htmlspecialchars($inscripcion['fecha_inscripcion']) : ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="estado_pago">Estado de Pago</label>
                        <select class="form-control" id="estado_pago" name="estado_pago" required>
                            <option value="pendiente" <?php echo (isset($inscripcion['estado_pago']) && $inscripcion['estado_pago'] == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                            <option value="pagado" <?php echo (isset($inscripcion['estado_pago']) && $inscripcion['estado_pago'] == 'pagado') ? 'selected' : ''; ?>>Pagado</option>
                        </select>
                    </div>

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