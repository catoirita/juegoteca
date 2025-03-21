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

    // Método para obtener los datos del usuario para su validación
    public function getUserByEmail($email)
    {
        echo "Parametro de entrada:";
        var_dump($email);
        $query = "CALL GetUserByEmail(:p_email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':p_email', $email);
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

    // Método para crear un usuario
    public function createUser($nombre, $apellido, $email, $password, $estado)
{
    $query = "CALL CreateUser(:email, :password, :apellido, :nombre, :estado)"; 
    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        'nombre' => $nombre,
        'apellido' => $apellido,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT), // Encriptar contraseña
        'estado' => $estado
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
    public function updateUser($userId, $nombre, $apellido, $email, $hashedPassword, $estado)
    {
        $query = "CALL UpdateUser(:id, :nombre, :apellido, :email, :password, :estado)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_INT);

        return $stmt->execute(); // devuelve el resultado de la ejecución
    }

    // Eliminar un usuario por su ID
    public function deleteUser($userId)

    {
        $estado = 0;
        $query = "CALL DeleteUser(:id,:estado)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_INT);


        return $stmt->execute(); // devuelve el resultado de la ejecución
    }
}