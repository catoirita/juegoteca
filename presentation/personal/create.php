<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// create_user.php
require_once '../../business/PersonalService.php';

$personalService = new PersonalService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $cargo= $_POST['cargo'];
    $estado=1;
    
    // Crear nuevo usuario
    $success = $personalService->addPersonal($nombre, $apellido, $telefono, $cargo,  $estado);

    if ($success) {
        header('Location: index.php'); // Redirigir a la lista de usuarios
        exit;
    } else {
        echo "Error al crear el usuario.";
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

    <!-- Bootstrap Core CSS -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../public/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../../public/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../public/css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../public/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php include '../Shared/nav.php'; ?>

            <?php include '../Shared/aside.php'; ?>
            <!-- /.sidebar -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Nuevo Personal</h1>
                            </div>
                        </div>
                        <form action="create.php" method="post">
                        <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="form-group">
                                <label for="cargo">Cargo</label>
                                <input type="text" class="form-control" id="cargo" name="cargo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">REGISTRAR PERSONAL</button>
                        </form>
                        <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista</a>
                    </div>
                </div>    
            </div>
            <!-- /#wrapper -->

            <!-- jQuery -->
            <script src="../public/js/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="../public/js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="../public/js/metisMenu.min.js"></script>

            <!-- Morris Charts JavaScript -->
            <script src="../public/js/raphael.min.js"></script>
            <script src="../public/js/morris.min.js"></script>
            <script src="../public/js/morris-data.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="../public/js/startmin.js"></script>

        </body>

        </html>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>