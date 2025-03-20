<?php
// Index: Principal
//Llamar a la capa de negocio para niños
require_once '../../business/NiñoService.php';

// Instancia de NiñoService
$niñoService = new NiñoService();

// Obtener todos los niños
$niños = $niñoService->getAllNiños();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <title>Lista de Niños</title>

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
                        <h1 class="page-header">Lista de Niños</h1>
                        <a href="create.php" title="Agregar nuevo niño" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addNiñoModal">REGISTRAR</a>
                    </div>
                </div>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Completo</th>
                            <th>Fecha de nacimiento</th>
                            <th>Direccion</th>
                            <th>Numero de contacto</th>
                            <th>Persona de contacto (EMERGENCIAS)</th>
                            <th>Telefono de emergencias</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($niños as $niño): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($niño['id']); ?></td>
                                <td><?php echo htmlspecialchars($niño['nombre_completo']); ?></td>
                                <td><?php echo htmlspecialchars($niño['fecha_nacimiento']); ?></td>
                                <td><?php echo htmlspecialchars($niño['direccion']); ?></td>
                                <td><?php echo htmlspecialchars($niño['numero_contacto']); ?></td>
                                <td><?php echo htmlspecialchars($niño['persona_contacto_emergencia']); ?></td>
                                <td><?php echo htmlspecialchars($niño['telefono_emergencia']); ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo htmlspecialchars($niño['id']); ?>" 
                                       title="Editar niño" 
                                       class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> EDITAR
                                    </a>
                                    <a href="details.php?id=<?php echo htmlspecialchars($niño['id']); ?>" 
                                       title="Ver detalles" 
                                       class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i> VER
                                    </a>
                                    <a href="delete.php?id=<?php echo htmlspecialchars($niño['id']); ?>" 
                                       title="Eliminar niño" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('¿Estás seguro de que quieres eliminar este niño?');">
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