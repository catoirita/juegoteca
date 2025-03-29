<?php
require_once '../../business/InscripcionService.php';

// Crear una instancia del servicio de inscripción
$inscripcionService = new InscripcionService();

// Verificar si se ha pasado el ID de la inscripción en la URL
if (isset($_GET['id'])) {
    $inscripcionId = intval($_GET['id']);
    
    try {
        // Obtener los detalles de la inscripción
        $inscripcion = $inscripcionService->getInscripcionById($inscripcionId);
        
        if ($inscripcion) {
            // Mostrar los detalles de la inscripción
            ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <title>Detalles de la Inscripción</title>

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

        <div id="page-wrapper">
            <div class="container-fluid">
                <h1 class="page-header">Detalles de la Inscripción</h1>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td><?php echo htmlspecialchars($inscripcion['id']); ?></td>
                    </tr>
                    <tr>
                        <th>Nombre del Niño</th>
                        <td><?php echo htmlspecialchars($inscripcion['nombre_niño']); ?></td>
                    </tr>
                    <tr>
                        <th>Fecha de Inscripción</th>
                        <td><?php echo htmlspecialchars($inscripcion['fecha_inscripcion']); ?></td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td><?php echo htmlspecialchars($inscripcion['estado']); ?></td>
                    </tr>
                </table>
                <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista</a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/metisMenu.min.js"></script>
    <script src="../public/js/raphael.min.js"></script>
    <script src="../public/js/morris.min.js"></script>
    <script src="../public/js/morris-data.js"></script>
    <script src="../public/js/startmin.js"></script>

</body>
</html>
<?php
        } else {
            echo "Inscripción no encontrada.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de inscripción no proporcionado.";
}
?>
