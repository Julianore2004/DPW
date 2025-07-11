<?php
require_once 'database.php';

function obtenerDatos() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM textoimagen"); // corregido
    $datos = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $datos[$row['titulo']] = $row;
    }
    return $datos;
}


function obtenerDato($datos, $titulo, $campo) {
    return isset($datos[$titulo][$campo]) ? $datos[$titulo][$campo] : '';
}

function verificarLogin($usuario, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?");
    $stmt->execute([$usuario, $password]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function actualizarContenido($id, $titulo, $textos, $img) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE textoimagen SET titulo = ?, textos = ?, img = ? WHERE id = ?");
    return $stmt->execute([$titulo, $textos, $img, $id]);
}

$datos = obtenerDatos();
?>
