<?php
require_once 'database.php';

function obtenerDatos() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM textoimagen ORDER BY id");
    $datos = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $datos[$row['id']] = $row;
    }
    return $datos;
}

function obtenerDatoPorId($datos, $id, $campo) {
    return isset($datos[$id][$campo]) ? $datos[$id][$campo] : '';
}

// Función para obtener un dato específico por ID (para uso directo)
function obtenerDatoDirecto($id, $campo) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT {$campo} FROM textoimagen WHERE id = ?");
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result[$campo] : '';
}

// Función para obtener registro completo por ID
function obtenerRegistroPorId($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM textoimagen WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function verificarLogin($usuario, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?");
    $stmt->execute([$usuario, $password]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function actualizarContenido($id, $titulo, $textos, $img) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE textoimagen SET titulo = ?, textos = ?, img = ? WHERE id = ?");
    return $stmt->execute([$titulo, $textos, $img, $id]);
}

// Función para crear nuevo registro
function crearRegistro($titulo, $textos, $img) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO textoimagen (titulo, textos, img) VALUES (?, ?, ?)");
    return $stmt->execute([$titulo, $textos, $img]);
}

// Función para eliminar registro
function eliminarRegistro($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM textoimagen WHERE id = ?");
    return $stmt->execute([$id]);
}

$datos = obtenerDatos();
?>