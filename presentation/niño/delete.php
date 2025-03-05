<?php
require_once __DIR__ . "/../../business/NiñoService.php";


$niñoService = new NiñoService();

if (isset($_GET['id'])) {
    $niñoId = intval($_GET['id']);

    try {
        if ($niñoService->deleteNiño($niñoId)) {
            echo "El niño fue eliminado exitosamente.";
            header("Location: index.php"); 
            exit();
        } else {
            echo "Error al eliminar el niño.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID del niño no proporcionado.";
    exit();
}
?>