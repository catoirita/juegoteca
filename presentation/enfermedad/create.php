<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// create_user.php
require_once '../../business/EnfermedadService.php';
require_once '../../business/NiñoService.php';

$enfermedadService = new EnfermedadService();
$niñoService = new NiñoService();
$niños = $niñoService->getAllNiños();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $idNi = (int) $_POST['niño_id'];
    $descripcion = $_POST['descripcion'];
    $medicamento = $_POST['medicamento'];
    $estado = 1;
    
    // Crear nuevo registro de enfermedad
    $success = $enfermedadService->addEnfermedad($idNi, $descripcion, $medicamento, $estado);

    if ($success) {
        header('Location: index.php'); // Redirigir a la lista de enfermedades
        exit;
    } else {
        echo "Error al registrar enfermedad.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

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
                            <h1 class="page-header">Registrar Enfermedad de Base</h1>
                        </div>
                    </div>
                    <form action="create.php" method="post">
                        <div class="form-group">
                            <label for="niño_id">Niño</label>
                            <select class="form-control" id="niño_id" name="niño_id" required>
                                <option value="" disabled selected>Selecciona un niño</option>
                                <?php foreach ($niños as $niño): ?>
                                <option value="<?php echo htmlspecialchars($niño['id']); ?>">
                                    <?php echo htmlspecialchars($niño['nombre_completo']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <select class="form-control" id="categoria" required>
                                <option value="" disabled selected>Seleccione una categoría</option>
                                <option value="alergias_respiratorias">Alergias respiratorias</option>
                                <option value="alergias_alimentarias">Alergias alimentarias</option>
                                <option value="alergias_cutaneas">Alergias cutáneas</option>
                                <option value="diabetes">Diabetes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <select class="form-control" id="descripcion" name="descripcion" required>
                                <option value="" disabled selected>Seleccione una descripción</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="otro">Otro (Especifique si no está en la lista)</label>
                            <input type="text" class="form-control" id="otro" name="otro">
                        </div>
                        <div class="form-group">
                            <label for="medicamento">Medicamento</label>
                            <input type="text" class="form-control" id="medicamento" name="medicamento" required>
                        </div>
                        <button type="submit" class="btn btn-primary">REGISTRAR ENFERMEDAD</button>
                    </form>
                    <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("categoria").addEventListener("change", function() {
            let descripcion = document.getElementById("descripcion");
            descripcion.innerHTML = '<option value="" disabled selected>Seleccione una descripción</option>';
            let opciones = {
                "alergias_respiratorias": ["Rinitis alérgica", "Asma alérgica"],
                "alergias_alimentarias": ["Alergia a los frutos secos", "Alergia a la leche de vaca", "Leche de vaca", "Huevos", "Maní y frutos secos", "Pescado", "Mariscos", "Soja", "Trigo", "Sésamo"],
                "alergias_cutaneas": ["Dermatitis atópica", "Sarpullidos causados por plantas", "Sarpullido por fitofotodermatitis"],
                "diabetes": ["Diabetes tipo 1", "Diabetes tipo 2"]
            };
            let categoriaSeleccionada = this.value;
            if (opciones[categoriaSeleccionada]) {
                opciones[categoriaSeleccionada].forEach(opcion => {
                    let option = document.createElement("option");
                    option.value = opcion;
                    option.textContent = opcion;
                    descripcion.appendChild(option);
                });
            }
        });
    </script>
</body>
</html>