<?php
require_once '../../business/AutorizadoService.php';

// Crear una instancia del servicio de usuario
$autorizadoService = new AutorizadoService();

// Verifica si se paso el ID del usuario en la URL
if (isset($_GET['id'])) {
    $autorizadoId = intval($_GET['id']);
    
    try {
        if ($autorizadoService->deleteAu($autorizadoId)) {
            echo "Persona Autorizado eliminado exitosamente.";
            header("Location: index.php"); 
            exit();
        } else {
            echo "Error al eliminar personal autorizado.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit();
}
?>