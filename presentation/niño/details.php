<?php
require_once '../../business/NiñoService.php';

// Crear una instancia del servicio de niño
$niñoService = new NiñoService();

// Verificar si se ha pasado el ID del niño en la URL
if (isset($_GET['id'])) {
    $niñoId = intval($_GET['id']);
    
    try {
        // Obtener los detalles del niño
        $niño = $niñoService->getNiñoById($niñoId);
        
        if ($niño) {
            // Mostrar los detalles del niño
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

    <title>Detalles del Niño</title>

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
                <h1 class="page-header">Detalles del Niño</h1>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td><?php echo htmlspecialchars($niño['id']); ?></td>
                    </tr>
                    <tr>
                        <th>Nombre Completo</th>
                        <td><?php echo htmlspecialchars($niño['nombre_completo']); ?></td>
                    </tr>
                    <tr>
                        <th>Fecha de Nacimiento</th>
                        <td><?php echo htmlspecialchars($niño['fecha_nacimiento']); ?></td>
                    </tr>
                    <tr>
                        <th>Dirección</th>
                        <td><?php echo htmlspecialchars($niño['direccion']); ?></td>
                    </tr>
                    <tr>
                        <th>Número de Contacto</th>
                        <td><?php echo htmlspecialchars($niño['numero_contacto']); ?></td>
                    </tr>
                    <tr>
                        <th>Persona de Contacto de Emergencia</th>
                        <td><?php echo htmlspecialchars($niño['persona_contacto_emergencia']); ?></td>
                    </tr>
                    <tr>
                        <th>Teléfono de Emergencia</th>
                        <td><?php echo htmlspecialchars($niño['telefono_emergencia']); ?></td>
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
            echo "Niño no encontrado.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de miño no proporcionado.";
}
?>