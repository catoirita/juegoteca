<?php
require_once '../../business/UsuarioService.php';
session_start(); // Inicia la sesión

$error = ''; // Variable para almacenar mensajes de error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura los datos enviados por el usuario
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $userService = new UserService();

    // Verifica si las credenciales son correctas
    if ($userService->authenticate($email, $password)) {
        $_SESSION['user'] = $email;
        $_SESSION['nombre'] = 'Ita Catoira'; // Puedes cambiar esto según la base de datos

        header("Location: ../../presentation/dashboard/dashboard.php");
        exit();
    } else {
        $error = 'Usuario/Contraseña inválida.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <style>
        body {
            background-color: #CE2834;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #A4A1A1;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .input-field::placeholder {
            font-weight: bold;
            color: black;
        }
        .logo {
            width: 200px;
            margin-bottom: 20px;
        }
        .input-field {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
            text-align: center;
        }
        .btn {
            background-color: #4CAF50;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 85%;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Bienvenidos</h1>
        <img src="../../public/img/recreo.png" alt="Logo" class="logo">
        
        <!-- Formulario de inicio de sesión -->
        <form action="" method="POST">
            <input type="text" name="email" placeholder="Correo electrónico" class="input-field" required>
            <input type="password" name="password" placeholder="Contraseña" class="input-field" required>
            <button type="submit" class="btn">Ingresar</button>
        </form>

        <?php if (!empty($error)): ?>
            <p class="error-message"><?= $error ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
