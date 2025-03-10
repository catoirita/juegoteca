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

    public function authenticate($username, $password)
    {
        $user = $this->userDAO->getUserByUsername($username); 
        if ($password = $user['password']){
       
            return true;
        }

        // Autenticación fallida
        return false;
    }

    // Método para obtener todos los usuarios
    public function getAllUsers() 
    {
        return $this->userDAO->getAllUsers();
    }

    // Método para crear usuarios
    public function createUser($username, $password)
    {
        return $this->userDAO->createUser($username, $password);
    }

    // Obtener un usuario por ID
    public function getUserById($userId)
    {
        return $this->userDAO->findUserById($userId);
    }

    // Actualizar un usuario
    public function updateUser($userId, $username, $password)
    {
        // Validaciones básicas (puedes añadir más validaciones según sea necesario)
        if (empty($username) || empty($password)) {
            return false;
        }

        // Cifrar la contraseña antes de guardarla
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        return $this->userDAO->updateUser($userId, $username, $hashedPassword);
    }

    // Eliminar un usuario
    public function deleteUser($userId)
    {
        return $this->userDAO->deleteUser($userId);
    }
}
