<?php
require_once '../../business/EnfermedadService.php';

// Crear una instancia del servicio de usuario
$enfermedadService = new EnfermedadService();

// Verifica si se paso el ID del usuario en la URL
if (isset($_GET['id'])) {
    $enfermedadId = intval($_GET['id']);
    
    try {
        if ($enfermedadService->deleteEn($enfermedadId)) {
            echo "Enfermedad eliminado exitosamente.";
            header("Location: index.php"); 
            exit();
        } else {
            echo "Error al eliminar la enfermedad.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit();
}
?>