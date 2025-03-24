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
    // Obtener datos del formulario
    $nombre_niño = $_POST['nombre_niño'];
    $fecha_inscripcion = $_POST['fecha_inscripcion'];
    $curso = $_POST['curso'];
    $estado = $_POST['estado'];
        //actualiza los datos de las inscripciones realizadas. 
    $success = $inscripcionService->updateInscripcion($inscripcionId, $nombre_niño, $fecha_inscripcion, $curso, $estado);

    if ($success) {
        header('Location: index.php'); 
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
    
    <!-- Bootstrap Core CSS -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
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
                        <label for="nombre_niño">Nombre del Niño</label>
                        <input type="text" class="form-control" id="nombre_niño" name="nombre_niño" value="<?php echo htmlspecialchars($inscripcion['nombre_niño']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="fecha_inscripcion">Fecha de Inscripción</label>
                        <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion" value="<?php echo htmlspecialchars($inscripcion['fecha_inscripcion']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="estado">Etado</label>
                        <input type="number" class="form-control" id="estado" name="estado" value="<?php echo htmlspecialchars($inscripcion['estado']); ?>" required>
                    </div>  
                    
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
                <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista</a>
            </div>
        </div>
    </div>

    <!-- jQuery y Bootstrap JS -->
    <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
</body>
</html>