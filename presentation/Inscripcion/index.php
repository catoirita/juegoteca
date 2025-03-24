<?php

require_once '../../business/InscripcionService.php';

// Instancia de InscripcionService
$inscripcionService = new InscripcionService();

// Obtener todas las inscripciones
$inscripciones = $inscripcionService->getAllInscripciones();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <title>Lista de Niños inscritos en la Juegoteca Re-creo</title>

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
        <!-- Navigation -->
        <?php include '../Shared/nav.php'; ?>
        <?php include '../Shared/aside.php'; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lista de Niños inscritos en la Juegoteca Re-creo</h1>
                        <a href="create.php" title="Agregar una nueva inscripcion" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addInscripcionModal">REGISTRAR</a>
                    </div>
                </div>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Id del niño</th>
                            <th>Fecha de inscripcion</th>
                            <th>Monto del pago</th>
                            <th>Estado del pago</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inscripciones as $inscripcion): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($inscripcion['id']); ?></td>
                                <td><?php echo htmlspecialchars($inscripcion['id_niño']); ?></td>
                                <td><?php echo htmlspecialchars($inscripcion['fecha_inscripcion']); ?></td>
                                <td><?php echo htmlspecialchars($inscripcion['monto_pago']); ?></td>
                                <td><?php echo htmlspecialchars($inscripcion['estado_pago']); ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo htmlspecialchars($inscripcion['id']); ?>" 
                                       title="Editar inscripcion" 
                                       class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> EDITAR
                                    </a>
                        
                                    <a href="delete.php?id=<?php echo htmlspecialchars($inscripcion['id']); ?>" 
                                       title="Eliminar inscripcion" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('¿Estás seguro de que quieres eliminar esta inscripcion?');">
                                        <i class="fa fa-trash"></i> ELIMINAR
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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