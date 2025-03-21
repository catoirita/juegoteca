<?php
require_once '../../business/NiñoService.php';

$niñoService = new NiñoService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_completo = $_POST['nombre_completo'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $numero_contacto = $_POST['numero_contacto'] ?? '';
    $persona_contacto_emergencia = $_POST['persona_contacto_emergencia'] ?? '';
    $telefono_emergencia = $_POST['telefono_emergencia'] ?? '';

    if ($nombre_completo && $fecha_nacimiento && $direccion && $numero_contacto && $persona_contacto_emergencia && $telefono_emergencia) {
        $success = $niñoService->addNiño($nombre_completo, $fecha_nacimiento, $direccion, $numero_contacto, $persona_contacto_emergencia, $telefono_emergencia);
        
        if ($success) {
            header('Location: index.php'); // Redirigir a la lista de niños
            exit;
        } else {
            echo "Error al agregar el niño.";
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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startmin - Bootstrap Admin Theme</title>

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
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">REGISTRAR NIÑO</h1>
                    </div>
                </div>
                <form action="create.php" method="post">
                    <div class="form-group">
                        <label for="nombre_completo">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="numero_contacto">Número de Contacto</label>
                        <input type="text" class="form-control" id="numero_contacto" name="numero_contacto" required>
                    </div>
                    <div class="form-group">
                        <label for="persona_contacto_emergencia">Persona de Contacto de Emergencia</label>
                        <input type="text" class="form-control" id="persona_contacto_emergencia" name="persona_contacto_emergencia" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono_emergencia">Teléfono de Emergencia</label>
                        <input type="text" class="form-control" id="telefono_emergencia" name="telefono_emergencia" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Niño</button>
                </form>
                <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista</a>
            </div>
        </div>
    </div>
</div>

<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/metisMenu.min.js"></script>
<script src="../public/js/raphael.min.js"></script>
<script src="../public/js/morris.min.js"></script>
<script src="../public/js/morris-data.js"></script>
<script src="../public/js/startmin.js"></script>

</body>
</html>