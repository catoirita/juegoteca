<?php
// Index: Principal
//Llamar a la capa de negocio pero de usuario
require_once '../../business/AutorizadoService.php';

// Instancia de UserService
$autorizadoService = new AutorizadoService();

// Obtener todos los usuarios
$autorizados = $autorizadoService->getAllAu();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

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
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">ADMINISTRAR PERSONA AUTORIZADA </h1>
                            <a href="create.php" title="Agregar nuevo usuario" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addUserModal">REGISTRAR</a>
                        </div>
                    </div>
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre del niño</th>
                                <th>Nombre del Autorizado</th>
                                <th>Celular de Autorizado</th>
                                <th>Parentesco</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($autorizados as $autorizado): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($autorizado['id']); ?></td>
                                    <td><?php echo htmlspecialchars($autorizado['nombre_niño']); ?></td>
                                    <td><?php echo htmlspecialchars($autorizado['nombre_autorizado']); ?></td>
                                    <td><?php echo htmlspecialchars($autorizado['telefono_autorizado']); ?></td>
                                    <td><?php echo htmlspecialchars($autorizado['parentesco']); ?></td>
                                    <td><?php if($autorizado['estado']){
                                        echo htmlspecialchars('Activo');
                                    }else{
                                        echo htmlspecialchars('inactivo');
                                    }; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo htmlspecialchars($autorizado['id']); ?>" 
                                           title="Editar usuario" 
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> EDITAR
                                        </a>
                                        
                                        <a href="delete.php?id=<?php echo htmlspecialchars($autorizado['id']); ?>" title="Eliminar usuario" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar a esta persona?');">
                                            <i class="fa fa-trash"></i> ELIMINAR
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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