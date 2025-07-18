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
<style>
    /* admin_styles.css - Estilos para el login administrativo */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

/* Partículas animadas de fondo */
body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
        radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
        radial-gradient(circle at 40% 80%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
        radial-gradient(circle at 0% 50%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
        radial-gradient(circle at 80% 50%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
        radial-gradient(circle at 0% 100%, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
    background-size: 200px 200px, 300px 300px, 250px 250px, 180px 180px, 220px 220px, 320px 320px;
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.login-container {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 450px;
    padding: 20px;
}

.login-form {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    box-shadow: 
        0 25px 50px rgba(0, 0, 0, 0.2),
        0 0 0 1px rgba(255, 255, 255, 0.1);
    padding: 40px;
    position: relative;
    overflow: hidden;
    animation: slideInUp 0.6s ease-out;
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.login-form::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #667eea, #764ba2, #667eea);
    background-size: 200% 100%;
    animation: gradientMove 3s ease infinite;
}

@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.login-header {
    text-align: center;
    margin-bottom: 40px;
}

.login-header i {
    font-size: 4em;
    color: #667eea;
    margin-bottom: 20px;
    display: block;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.login-header h2 {
    font-size: 2.2em;
    color: #2c3e50;
    margin-bottom: 10px;
    font-weight: 700;
}

.login-header p {
    color: #7f8c8d;
    font-size: 1.1em;
    font-weight: 400;
}

.alert {
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 25px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 10px;
    animation: shake 0.5s ease-in-out;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

.alert-error {
    background: linear-gradient(135deg, #ff6b6b, #ee5a52);
    color: white;
    border: 1px solid #e74c3c;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #2c3e50;
    font-size: 1.1em;
}

.form-group label i {
    margin-right: 8px;
    color: #667eea;
    width: 20px;
}

.form-group input {
    width: 100%;
    padding: 15px 20px;
    border: 2px solid #e0e6ed;
    border-radius: 12px;
    font-size: 1em;
    transition: all 0.3s ease;
    background: #f8f9fa;
    color: #2c3e50;
}

.form-group input:focus {
    outline: none;
    border-color: #667eea;
    background: white;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    transform: translateY(-2px);
}

.form-group input::placeholder {
    color: #95a5a6;
    font-style: italic;
}

.btn-login {
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 1.1em;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    margin-top: 10px;
}

.btn-login::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.btn-login:hover::before {
    left: 100%;
}

.btn-login:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
}

.btn-login:active {
    transform: translateY(-1px);
}

.btn-login i {
    margin-right: 10px;
}

.login-footer {
    text-align: center;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #e0e6ed;
}

.login-footer p {
    color: #7f8c8d;
    font-size: 0.9em;
}

.login-footer i {
    color: #667eea;
    margin-right: 5px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .login-container {
        max-width: 380px;
        padding: 15px;
    }
    
    .login-form {
        padding: 30px 25px;
    }
    
    .login-header h2 {
        font-size: 1.8em;
    }
    
    .login-header i {
        font-size: 3em;
    }
    
    .form-group input {
        padding: 12px 15px;
    }
    
    .btn-login {
        padding: 14px;
        font-size: 1em;
    }
}

@media (max-width: 480px) {
    .login-container {
        max-width: 320px;
        padding: 10px;
    }
    
    .login-form {
        padding: 25px 20px;
    }
    
    .login-header h2 {
        font-size: 1.6em;
    }
    
    .login-header p {
        font-size: 1em;
    }
    
    .form-group label {
        font-size: 1em;
    }
    
    .form-group input {
        padding: 10px 12px;
        font-size: 0.9em;
    }
    
    .btn-login {
        padding: 12px;
        font-size: 0.9em;
    }
}

/* Animaciones adicionales */
.form-group {
    animation: fadeInUp 0.6s ease-out;
    animation-fill-mode: both;
}

.form-group:nth-child(1) { animation-delay: 0.1s; }
.form-group:nth-child(2) { animation-delay: 0.2s; }
.form-group:nth-child(3) { animation-delay: 0.3s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Efectos adicionales para mejorar la experiencia */
.login-form:hover {
    transform: translateY(-5px);
    box-shadow: 
        0 30px 60px rgba(0, 0, 0, 0.25),
        0 0 0 1px rgba(255, 255, 255, 0.1);
}

/* Loading state para el botón */
.btn-login.loading {
    pointer-events: none;
    opacity: 0.7;
}

.btn-login.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
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