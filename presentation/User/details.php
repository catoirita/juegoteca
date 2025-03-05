<?php
require_once '../../business/UsuarioService.php';

// Crear una instancia del servicio de usuario
$userService = new UserService();

// Verificar si se ha pasado el ID del usuario en la URL
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    
    try {
        // Obtener los detalles del usuario
        $user = $userService->getUserById($userId);
        
        if ($user) {
            // Mostrar los detalles del usuario
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

        <?php include '../Shared/nav.php'; ?>

        <?php include '../Shared/aside.php'; ?>
        <!-- /.sidebar -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    <h1 class="page-header">Detalles del Usuario</h1>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                        </tr>
                        <tr>
                            <th>Correo Electronico</th>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                        </tr>
                        <tr>
                            <th>Contraseña</th>
                            <td><?php echo htmlspecialchars($user['password']); ?></td>
                        </tr>
                    </table>
                    <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista</a>
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
                    <?php
        } else {
            echo "Usuario no encontrado.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de usuario no proporcionado.";
}
?>