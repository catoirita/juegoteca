<?php
require_once '../../business/InscripcionService.php';

// Crear una instancia del servicio
$inscripcionService = new InscripcionService();

// Comprobamos si es una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibimos los datos del formulario
    $nombre_completo = $_POST['nombre_completo'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $numero_contacto = $_POST['numero_contacto'] ?? '';
    $persona_contacto_emergencia = $_POST['persona_contacto_emergencia'] ?? '';
    $telefono_emergencia = $_POST['telefono_emergencia'] ?? '';
    $alergias = $_POST['alergias'] ?? '';  
    $fecha_inscripcion = $_POST['fecha_inscripcion'] ?? '';
    $monto_pago = $_POST['monto_pago'] ?? '';
    $estado_pago = $_POST['estado_pago'] ?? '';
    $personas_autorizadas = [
        ['nombre' => $_POST['persona_autorizada_1'] ?? '', 'telefono' => $_POST['telefono_autorizado_1'] ?? ''],
        ['nombre' => $_POST['persona_autorizada_2'] ?? '', 'telefono' => $_POST['telefono_autorizado_2'] ?? ''],
        ['nombre' => $_POST['persona_autorizada_3'] ?? '', 'telefono' => $_POST['telefono_autorizado_3'] ?? '']
    ];

    if ($nombre_completo && $fecha_nacimiento && $direccion && $numero_contacto && 
        $persona_contacto_emergencia && $telefono_emergencia && $fecha_inscripcion && 
        $monto_pago && $estado_pago) {

        $id_nino = $inscripcionService->addNiño($nombre_completo, $fecha_nacimiento, $direccion, $numero_contacto, $persona_contacto_emergencia, $telefono_emergencia);

        if ($id_nino) {
            if ($alergias) {
                $inscripcionService->addAlergia($id_nino, $alergias);
            }

            foreach ($personas_autorizadas as $persona) {
                if ($persona['nombre'] && $persona['telefono']) {
                    $inscripcionService->addPersonaAutorizada($id_nino, $persona['nombre'], $persona['telefono']);
                }
            }

            $success = $inscripcionService->addInscripcion($id_nino, $fecha_inscripcion, $monto_pago, $estado_pago);

            if ($success) {
                header('Location: index.php');
                exit;
            } else {
                echo "Error al agregar la inscripción.";
            }
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
    
    <title>Agregar Inscripción</title>

    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/metisMenu.min.css" rel="stylesheet">
    <link href="../../public/css/timeline.css" rel="stylesheet">
    <link href="../../public/css/startmin.css" rel="stylesheet">
    <link href="../../public/css/morris.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navegación -->
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
                            <label for="nombre_completo">Nombre del Niño</label>
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
                        <div class="form-group">
                            <label for="alergias">Alergias (si las hay)</label>
                            <textarea class="form-control" id="alergias" name="alergias"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fecha_inscripcion">Fecha de Inscripción</label>
                            <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion" required>
                        </div>
                        <div class="form-group">
                            <label for="monto_pago">Monto de Pago</label>
                            <input type="number" class="form-control" id="monto_pago" name="monto_pago" required>
                        </div>
                        <div class="form-group">
                            <label for="estado_pago">Estado de Pago</label>
                            <select class="form-control" id="estado_pago" name="estado_pago">
                                <option value="pendiente">Pendiente</option>
                                <option value="pagado">Pagado</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="persona_autorizada_1">Persona Autorizada 1</label>
                            <input type="text" class="form-control" id="persona_autorizada_1" name="persona_autorizada_1">
                            <input type="text" class="form-control mt-2" id="telefono_autorizado_1" name="telefono_autorizado_1" placeholder="Teléfono">
                        </div>
                        <div class="form-group">
                            <label for="persona_autorizada_2">Persona Autorizada 2</label>
                            <input type="text" class="form-control" id="persona_autorizada_2" name="persona_autorizada_2">
                            <input type="text" class="form-control mt-2" id="telefono_autorizado_2" name="telefono_autorizado_2" placeholder="Teléfono">
                        </div>
                        <div class="form-group">
                            <label for="persona_autorizada_3">Persona Autorizada 3</label>
                            <input type="text" class="form-control" id="persona_autorizada_3" name="persona_autorizada_3">
                            <input type="text" class="form-control mt-2" id="telefono_autorizado_3" name="telefono_autorizado_3" placeholder="Teléfono">
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
    <script src="../public/js/morris.min.js"></script>
    <script src="../public/js/startmin.js"></script>

</body>

</html>
