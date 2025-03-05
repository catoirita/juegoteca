<?php
// /datos/UserDAO.php
require_once __DIR__ . '/../config/Database.php';

class UserDAO
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /*public function getUserByUsername($username)
    {
        $query = "SELECT * FROM usuario WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }*/

    //Metodo para obtener los datos del usuario para su validacion
    public function getUserByUsername($username)
    {
        echo "Parametro de entrada:";
        var_dump($username);
        $query = "CALL GetUserByUsername(:p_username)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':p_username', $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
        echo("Esta es la capa de datos:");
        var_dump($stmt);
    }

    // Método para obtener todos los usuarios
    public function getAllUsers() 
    {
        $query = "CALL GetAllUsers()";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // devuelve un array asociativo
    }

    // Metodo para crear el usuario
    public function createUser($username, $password)
    {
        $query = "CALL CreateUser(:username, :password)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            'username' => $username,
            'password' => $password // Enviar la contraseña sin encriptar
        ]);
    }

    // Encontrar un usuario por su ID usando PDO
    public function findUserById($userId)
    {
        $query = "CALL FindUserById(:id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // devuelve un array asociativo
    }

    // Actualizar un usuario en la base de datos usando PDO
    public function updateUser($userId, $username, $hashedPassword)
    {
        $query = "CALL UpdateUser(:id, :username, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

        return $stmt->execute(); // devuelve el resultado de la ejecución
    }

    // Eliminar un usuario por su ID
    public function deleteUser($userId)
    {
        $query = "CALL DeleteUser(:id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

        return $stmt->execute(); // devuelve el resultado de la ejecución
    }
}