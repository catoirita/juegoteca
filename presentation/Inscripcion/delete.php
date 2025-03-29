<?php
require_once __DIR__ . "/../../business/InscripcionService.php";

$inscripcionService = new InscripcionService();

if (isset($_GET['id'])) {
    $inscripcionId = intval($_GET['id']);

    try {
        if ($inscripcionService->deleteInscripcion($inscripcionId)) {
            echo "La inscripción fue eliminada exitosamente.";
            header("Location: index.php"); 
            exit();
        } else {
            echo "Error al eliminar la inscripción.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de la inscripción no proporcionado.";
    exit();
}
?>