<?php
// /negocio/UserService.php
require_once __DIR__ . '/../data/UsuarioDAO.php';

class UserService
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function authenticate($email, $password)
    {
        $user = $this->userDAO->getUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return true;
        }
        return false;
    }

    // Método para obtener todos los usuarios
    public function getAllUsers() 
    {
        return $this->userDAO->getAllUsers();
    }

    // Método para crear usuarios (sin necesidad de pasar ID)
    public function createUser($nombre, $apellido, $email, $password, $estado)
{
    if (empty($nombre) || empty($apellido) || empty($email) || empty($password)) {
        return false; // Validar que no haya datos vacíos
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Encriptar contraseña
    return $this->userDAO->createUser($nombre, $apellido, $email, $hashedPassword, $estado);
}


    // Obtener un usuario por ID
    public function getUserById($userId)
    {
        return $this->userDAO->findUserById($userId);
    }

    // Actualizar un usuario
    public function updateUser($userId, $nombre, $apellido, $email, $password, $estado)
    {
        if (empty($nombre) || empty($apellido) || empty($email) || empty($password)) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        return $this->userDAO->updateUser($userId, $nombre, $apellido, $email, $hashedPassword, $estado);
    }

    // Eliminar un usuario
    public function deleteUser($userId)
    {
        return $this->userDAO->deleteUser($userId);
    }
}
