<?php
require_once '../../business/InscripcionService.php';

$inscripcionService = new InscripcionService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_nino = $_POST['id_niño'] ?? '';
    $fecha_inscripcion = $_POST['fecha_inscripcion'] ?? '';
    $monto_pago = $_POST['monto_pago'] ?? '';
    $estado_pago = $_POST['estado_pago'] ?? '';

    if ($id_nino && $fecha_inscripcion && $monto_pago && $estado_pago) {
        $success = $inscripcionService->addInscripcion($id_niño, $fecha_inscripcion, $monto_pago, $estado_pago);
        
        if ($success) {
            header('Location: index.php'); // Redirigir a la lista de inscripciones
            exit;
        } else {
            echo "Error al agregar la inscripción.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Inscripción</title>
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/metisMenu.min.css" rel="stylesheet">
    <link href="../../public/css/startmin.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="wrapper">
    <?php include '../Shared/nav.php'; ?>
    <?php include '../Shared/aside.php'; ?>
    
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Agregar Inscripción</h1>
                    </div>
                </div>
                <form action="create.php" method="post">
                    <div class="form-group">
                        <label for="id_nino">ID del Niño</label>
                        <input type="text" class="form-control" id="id_nino" name="id_nino" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inscripcion">Fecha de Inscripción</label>
                        <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="monto_pago">Monto de Pago</label>
                        <input type="number" class="form-control" id="monto_pago" name="monto_pago" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="estado_pago">Estado de Pago</label>
                        <select class="form-control" id="estado_pago" name="estado_pago" required>
                            <option value="pendiente">Pendiente</option>
                            <option value="pagado">Pagado</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Inscripción</button>
                </form>
                <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista</a>
            </div>
        </div>
    </div>
</div>

<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/metisMenu.min.js"></script>
<script src="../public/js/startmin.js"></script>

</body>
</html>
