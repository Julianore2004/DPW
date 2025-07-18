<?php
header('Content-Type: application/json');

function obtenerImagenes() {
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
    
    return $images;
}

echo json_encode(obtenerImagenes());
?>