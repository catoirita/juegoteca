<?php
require_once '../../business/PersonalService.php';

// Crear una instancia del servicio de usuario
$personalService = new PersonalService();

// Verifica si se paso el ID del usuario en la URL
if (isset($_GET['id'])) {
    $personalId = intval($_GET['id']);
    
    try {
        if ($personalService->deletePersonal($personalId)) {
            echo "Personal eliminado exitosamente.";
            header("Location: index.php"); 
            exit();
        } else {
            echo "Error al eliminar el personal.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit();
}
?>