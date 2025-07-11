<?php
session_start();

// Verificar que el usuario esté autenticado
if (!isset($_SESSION['admin_logueado'])) {
    http_response_code(401);
    echo json_encode(['error' => 'No autorizado']);
    exit;
}

// Función para obtener todas las imágenes del directorio
function obtenerTodasLasImagenes() {
    $imageDir = '../img/';
    $images = [];
    
    if (is_dir($imageDir)) {
        $files = scandir($imageDir);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $images[] = 'img/' . $file;
                }
            }
        }
    }
    
    // Ordenar por fecha de modificación (más recientes primero)
    usort($images, function($a, $b) {
        $timeA = filemtime('../' . $a);
        $timeB = filemtime('../' . $b);
        return $timeB - $timeA;
    });
    
    return $images;
}

// Establecer header para JSON
header('Content-Type: application/json');

try {
    $images = obtenerTodasLasImagenes();
    echo json_encode($images);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al cargar imágenes: ' . $e->getMessage()]);
}
?>