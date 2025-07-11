<?php
session_start();
require_once '../config/functions.php';

if ($_POST) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    
    if (verificarLogin($usuario, $password)) {
        $_SESSION['admin_logueado'] = true;
        $_SESSION['admin_usuario'] = $usuario;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Login</title>
    <link rel="stylesheet" href="admin_styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <div class="login-header">
                <i class="fas fa-shield-alt"></i>
                <h2>Panel Administrativo</h2>
                <p>Ingresa tus credenciales para acceder</p>
            </div>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-triangle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label><i class="fas fa-user"></i> Usuario:</label>
                    <input type="text" name="usuario" required placeholder="Ingresa tu usuario">
                </div>
                <div class="form-group">
                    <label><i class="fas fa-lock"></i> Contraseña:</label>
                    <input type="password" name="password" required placeholder="Ingresa tu contraseña">
                </div>
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                </button>
            </form>
            
            <div class="login-footer">
                <p><i class="fas fa-info-circle"></i> Acceso restringido a administradores</p>
            </div>
        </div>
    </div>
</body>
</html>