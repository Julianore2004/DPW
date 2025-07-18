<?php
require_once 'database.php';

function obtenerDatos() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM textoimagen ORDER BY id");
        $datos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $datos[$row['id']] = $row;
        }
        return $datos;
    } catch (PDOException $e) {
        error_log("Error en obtenerDatos(): " . $e->getMessage());
        return [];
    }
}

function obtenerDatoPorId($datos, $id, $campo) {
    return isset($datos[$id][$campo]) ? $datos[$id][$campo] : '';
}

// Función para obtener un dato específico por ID (para uso directo)
function obtenerDatoDirecto($id, $campo) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT {$campo} FROM textoimagen WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result[$campo] : '';
    } catch (PDOException $e) {
        error_log("Error en obtenerDatoDirecto(): " . $e->getMessage());
        return '';
    }
}

// Función para obtener registro completo por ID
function obtenerRegistroPorId($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM textoimagen WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en obtenerRegistroPorId(): " . $e->getMessage());
        return false;
    }
}

function verificarLogin($usuario, $password) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?");
        $stmt->execute([$usuario, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en verificarLogin(): " . $e->getMessage());
        return false;
    }
}

function actualizarContenido($id, $titulo, $textos, $img) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("UPDATE textoimagen SET titulo = ?, textos = ?, img = ? WHERE id = ?");
        return $stmt->execute([$titulo, $textos, $img, $id]);
    } catch (PDOException $e) {
        error_log("Error en actualizarContenido(): " . $e->getMessage());
        return false;
    }
}

// Función para crear nuevo registro
function crearRegistro($titulo, $textos, $img) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO textoimagen (titulo, textos, img) VALUES (?, ?, ?)");
        return $stmt->execute([$titulo, $textos, $img]);
    } catch (PDOException $e) {
        error_log("Error en crearRegistro(): " . $e->getMessage());
        return false;
    }
}

// Función para eliminar registro
function eliminarRegistro($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM textoimagen WHERE id = ?");
        return $stmt->execute([$id]);
    } catch (PDOException $e) {
        error_log("Error en eliminarRegistro(): " . $e->getMessage());
        return false;
    }
}

// Cargar datos solo si la base de datos está disponible
try {
    $datos = obtenerDatos();
} catch (Exception $e) {
    error_log("Error al cargar datos iniciales: " . $e->getMessage());
    $datos = [];
}
?>