<?php
session_start();
if (!isset($_SESSION['admin_logueado'])) {
    header('Location: index.php');
    exit;
}
require_once '../config/functions.php';

// Manejar upload de imágenes
if (isset($_POST['upload_image'])) {
    $uploadDir = '../img/';
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] == 0) {
        $fileName = $_FILES['image_file']['name'];
        $fileTemp = $_FILES['image_file']['tmp_name'];
        $fileSize = $_FILES['image_file']['size'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validar extensión
        if (!in_array($fileExt, $allowedTypes)) {
            $error = "Solo se permiten archivos: " . implode(', ', $allowedTypes);
        }
        // Validar tamaño (5MB máximo)
        elseif ($fileSize > 5 * 1024 * 1024) {
            $error = "El archivo es demasiado grande. Máximo 5MB.";
        } else {
            // Generar nombre único para evitar conflictos
            $newFileName = time() . '_' . preg_replace('/[^a-zA-Z0-9.-]/', '_', $fileName);
            $uploadPath = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTemp, $uploadPath)) {
                $mensaje = "Imagen subida correctamente: " . $newFileName;
                $nuevaImagen = 'img/' . $newFileName; // Ruta relativa para la BD
            } else {
                $error = "Error al subir la imagen.";
            }
        }
    } else {
        $error = "No se seleccionó ninguna imagen o hubo un error.";
    }
}

// Manejar actualización de contenido
if (isset($_POST['update_content'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $textos = $_POST['textos'];
    $img = $_POST['img'];
    if (actualizarContenido($id, $titulo, $textos, $img)) {
        $mensaje = "Contenido actualizado correctamente";
        $datos = obtenerDatos(); // Recargar datos
    } else {
        $error = "Error al actualizar";
    }
}

// Manejar creación de nuevo registro
if (isset($_POST['create_content'])) {
    $titulo = $_POST['titulo'];
    $textos = $_POST['textos'];
    $img = $_POST['img'];
    if (crearRegistro($titulo, $textos, $img)) {
        $mensaje = "Contenido creado correctamente";
        $datos = obtenerDatos(); // Recargar datos
    } else {
        $error = "Error al crear el contenido";
    }
}

// Manejar eliminación de registro
if (isset($_POST['delete_content'])) {
    $id = $_POST['id'];
    if (eliminarRegistro($id)) {
        $mensaje = "Contenido eliminado correctamente";
        $datos = obtenerDatos(); // Recargar datos
    } else {
        $error = "Error al eliminar el contenido";
    }
}

// Obtener lista de imágenes disponibles
function obtenerImagenes()
{
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

// Obtener datos después de procesar todas las operaciones
try {
    $datos = obtenerDatos();
} catch (Exception $e) {
    $error = "Error al cargar los datos: " . $e->getMessage();
    $datos = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 250px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .admin-logo {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .admin-logo i {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .admin-nav ul {
            list-style: none;
            padding: 20px 0;
        }

        .admin-nav li {
            margin-bottom: 5px;
        }

        .admin-nav a {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .admin-nav a:hover,
        .admin-nav a.active {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: #fff;
        }

        .admin-nav i {
            margin-right: 10px;
            width: 20px;
        }

        /* Main content */
        .admin-main {
            flex: 1;
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }

        .admin-header {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .admin-header h1 {
            color: #333;
            font-size: 24px;
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logout-btn {
            background: #e74c3c;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        .admin-content {
            padding: 30px;
        }

        /* Alerts */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Upload section */
        .upload-section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .upload-section h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .upload-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .file-input-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .file-input-wrapper {
            position: relative;
        }

        .file-input-wrapper input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 2px dashed #ddd;
            border-radius: 8px;
            background: #f9f9f9;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-wrapper input[type="file"]:hover {
            border-color: #667eea;
            background: #f0f0f0;
        }

        .btn-upload {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: transform 0.3s ease;
            align-self: flex-start;
        }

        .btn-upload:hover {
            transform: translateY(-2px);
        }

        .upload-info {
            font-size: 14px;
            color: #666;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Section content */
        .section-content {
            display: block;
        }

        .section-header {
            margin-bottom: 30px;
        }

        .section-header h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .section-header p {
            color: #666;
            font-size: 16px;
        }

        /* Content grid - RESPONSIVO */
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        /* Content cards */
        .content-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }

        .card-header h3 {
            color: #333;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-id {
            background: #667eea;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .card-preview {
            margin-bottom: 20px;
        }

        .image-preview {
            width: 100%;
            height: 200px;
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid #e9ecef;
        }

        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .image-preview:hover img {
            transform: scale(1.05);
        }

        /* Forms */
        .edit-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group input,
        .form-group textarea {
            padding: 12px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        .image-input-group {
            display: flex;
            gap: 10px;
        }

        .image-input-group input {
            flex: 1;
        }

        .btn-browse {
            background: #6c757d;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
            white-space: nowrap;
        }

        .btn-browse:hover {
            background: #5a6268;
        }

        .form-group small {
            color: #666;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Form actions */
        .form-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background: white;
            margin: 5% auto;
            padding: 0;
            border-radius: 12px;
            width: 90%;
            max-width: 800px;
            max-height: 80vh;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .close {
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .close:hover {
            opacity: 0.7;
        }

        .modal-body {
            padding: 20px;
            max-height: 60vh;
            overflow-y: auto;
        }

        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }

        .gallery-item {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gallery-item:hover {
            border-color: #667eea;
            transform: translateY(-2px);
        }

        .gallery-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        .gallery-item p {
            padding: 8px;
            font-size: 12px;
            text-align: center;
            background: #f8f9fa;
            margin: 0;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .no-content {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 18px;
        }

        /* Hamburger menu */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 10px;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1100;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: #333;
            margin: 3px 0;
            transition: 0.3s;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.active {
                transform: translateX(0);
            }

            .admin-main {
                margin-left: 0;
            }

            .admin-header {
                padding: 20px 20px 20px 70px;
            }

            .admin-header h1 {
                font-size: 20px;
            }

            .admin-user {
                flex-direction: column;
                gap: 10px;
            }

            .admin-user span {
                display: none;
            }

            .admin-content {
                padding: 20px;
            }

            .content-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .content-card {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }

            .image-input-group {
                flex-direction: column;
            }

            .modal-content {
                width: 95%;
                margin: 10% auto;
            }

            .image-gallery {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
                gap: 10px;
            }

            .gallery-item img {
                height: 100px;
            }

            .upload-form {
                gap: 15px;
            }

            .file-input-group {
                gap: 10px;
            }
        }

        @media (max-width: 480px) {
            .admin-header {
                padding: 15px 15px 15px 60px;
            }

            .admin-header h1 {
                font-size: 18px;
            }

            .admin-content {
                padding: 15px;
            }

            .content-card {
                padding: 15px;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .card-header h3 {
                font-size: 16px;
            }

            .image-preview {
                height: 150px;
            }

            .modal-content {
                width: 98%;
                margin: 15% auto;
            }

            .image-gallery {
                grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
                gap: 8px;
            }

            .gallery-item img {
                height: 80px;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .content-card {
            animation: fadeIn 0.5s ease-out;
        }

        /* Overlay para mobile */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .overlay.active {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Hamburger menu -->
    <div class="hamburger" onclick="toggleSidebar()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Overlay para mobile -->
    <div class="overlay" onclick="closeSidebar()"></div>

    <div class="admin-container">
        <div class="admin-sidebar" id="sidebar">
            <div class="admin-logo">
                <i class="fas fa-shield-alt"></i>
                <h3>Panel Admin</h3>
            </div>
            <nav class="admin-nav">
                <ul>
                    <li><a href="#" class="active" onclick="showSection('content')"><i class="fas fa-edit"></i> Contenido</a></li>
                    <li><a href="#" onclick="showSection('new-content')"><i class="fas fa-plus"></i> Nuevo Contenido</a></li>
                </ul>
            </nav>
        </div>

        <div class="admin-main">
            <div class="admin-header">
                <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
                <div class="admin-user">
                    <span><i class="fas fa-user"></i> <?php echo isset($_SESSION['admin_usuario']) ? $_SESSION['admin_usuario'] : 'Usuario'; ?></span>
                    <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Salir</a>
                </div>
            </div>

            <?php if (isset($mensaje)): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($mensaje); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error)): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-triangle"></i> <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <div class="admin-content">
                <!-- Sección de upload de imágenes -->
                <div class="upload-section">
                    <h3><i class="fas fa-cloud-upload-alt"></i> Subir Nueva Imagen</h3>
                    <form method="POST" enctype="multipart/form-data" class="upload-form">
                        <div class="file-input-group">
                            <label for="image_file">Seleccionar imagen:</label>
                            <div class="file-input-wrapper">
                                <input type="file" name="image_file" id="image_file" accept="image/*" required>
                            </div>
                        </div>
                        <button type="submit" name="upload_image" class="btn-upload">
                            <i class="fas fa-upload"></i> Subir Imagen
                        </button>
                        <div class="upload-info">
                            <i class="fas fa-info-circle"></i> Formatos permitidos: JPG, JPEG, PNG, GIF, WEBP. Tamaño máximo: 5MB
                        </div>
                    </form>
                </div>

                <!-- Sección para crear nuevo contenido -->
                <div id="new-content-section" class="section-content" style="display: none;">
                    <div class="section-header">
                        <h2><i class="fas fa-plus"></i> Crear Nuevo Contenido</h2>
                        <p>Agrega un nuevo elemento de contenido</p>
                    </div>
                    <div class="content-card">
                        <form method="POST" class="edit-form">
                            <input type="hidden" name="create_content" value="1">
                            <div class="form-group">
                                <label><i class="fas fa-heading"></i> Título:</label>
                                <input type="text" name="titulo" placeholder="Ingresa el título" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-align-left"></i> Texto:</label>
                                <textarea name="textos" rows="4" placeholder="Escribe el contenido aquí..."></textarea>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-image"></i> Imagen:</label>
                                <div class="image-input-group">
                                    <input type="text" name="img" id="img_new" placeholder="Ruta de la imagen" required>
                                    <button type="button" class="btn-browse" onclick="openImageSelector('new')">
                                        <i class="fas fa-folder-open"></i> Seleccionar
                                    </button>
                                </div>
                                <small><i class="fas fa-info-circle"></i> Selecciona una imagen de la galería</small>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Crear Contenido
                                </button>
                                <button type="button" class="btn btn-secondary" onclick="resetForm(this)">
                                    <i class="fas fa-times"></i> Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sección de gestión de contenido existente -->
                <div id="content-section" class="section-content">
                    <div class="section-header">
                        <h2><i class="fas fa-edit"></i> Gestión de Contenido</h2>
                        <p>Edita los textos e imágenes de tu sitio web</p>
                    </div>
                    <div class="content-grid">
                        <?php if (!empty($datos)): ?>
                            <?php foreach ($datos as $id => $item): ?>
                                <div class="content-card">
                                    <div class="card-header">
                                        <h3><i class="fas fa-file-alt"></i> <?php echo htmlspecialchars($item['titulo']); ?></h3>
                                        <span class="card-id">#<?php echo $id; ?></span>
                                    </div>
                                    <div class="card-preview">
                                        <div class="image-preview">
                                            <img src="../<?php echo htmlspecialchars($item['img']); ?>" alt="Preview" onerror="this.src='../img/default.jpg'">
                                        </div>
                                    </div>
                                    <form method="POST" class="edit-form">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="update_content" value="1">
                                        <div class="form-group">
                                            <label><i class="fas fa-heading"></i> Título:</label>
                                            <input type="text" name="titulo" value="<?php echo htmlspecialchars($item['titulo']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="fas fa-align-left"></i> Texto:</label>
                                            <textarea name="textos" rows="4" placeholder="Escribe el contenido aquí..."><?php echo htmlspecialchars($item['textos']); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="fas fa-image"></i> Imagen:</label>
                                            <div class="image-input-group">
                                                <input type="text" name="img" id="img_<?php echo $id; ?>" value="<?php echo htmlspecialchars($item['img']); ?>" required>
                                                <button type="button" class="btn-browse" onclick="openImageSelector(<?php echo $id; ?>)">
                                                    <i class="fas fa-folder-open"></i> Seleccionar
                                                </button>
                                            </div>
                                            <small><i class="fas fa-info-circle"></i> Selecciona una imagen de la galería</small>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Guardar Cambios
                                            </button>
                                            <button type="button" class="btn btn-secondary" onclick="resetForm(this)">
                                                <i class="fas fa-undo"></i> Resetear
                                            </button>
                                            <button type="button" class="btn btn-danger" onclick="confirmDelete(<?php echo $id; ?>)">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="no-content">
                                <p>No hay contenido disponible. Crea el primer registro.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para seleccionar imagen -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-images"></i> Seleccionar Imagen</h3>
                <span class="close" onclick="closeImageSelector()">&times;</span>
            </div>
            <div class="modal-body">
                <div class="image-gallery" id="imageGallery">
                    <!-- Las imágenes se cargarán aquí -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación para eliminar -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-exclamation-triangle"></i> Confirmar Eliminación</h3>
                <span class="close" onclick="closeDeleteModal()">&times;</span>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que quieres eliminar este contenido? Esta acción no se puede deshacer.</p>
                <div class="modal-actions">
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="id" id="deleteId">
                        <input type="hidden" name="delete_content" value="1">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">
                            <i class="fas fa-times"></i> Cancelar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentImageField = null;

        // Función para toggle del sidebar en mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.querySelector('.overlay');
            
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // Función para cerrar sidebar
        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.querySelector('.overlay');
            
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }

        // Cerrar sidebar al hacer clic en un enlace (mobile)
        document.querySelectorAll('.admin-nav a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    closeSidebar();
                }
            });
        });

        function showSection(section) {
            // Ocultar todas las secciones
            document.querySelectorAll('.section-content').forEach(sec => {
                sec.style.display = 'none';
            });
            
            // Mostrar la sección seleccionada
            document.getElementById(section + '-section').style.display = 'block';
            
            // Actualizar navegación activa
            document.querySelectorAll('.admin-nav a').forEach(link => {
                link.classList.remove('active');
            });
            event.target.classList.add('active');
        }

        function openImageSelector(id) {
            currentImageField = document.getElementById('img_' + id);
            document.getElementById('imageModal').style.display = 'block';
            loadImages();
        }

        function closeImageSelector() {
            document.getElementById('imageModal').style.display = 'none';
        }

        function loadImages() {
            const gallery = document.getElementById('imageGallery');
            gallery.innerHTML = '<p>Cargando imágenes...</p>';
            
            // Cargar imágenes desde PHP
            fetch('get_images.php')
                .then(response => response.json())
                .then(images => {
                    gallery.innerHTML = '';
                    if (images.length === 0) {
                        gallery.innerHTML = '<p>No hay imágenes disponibles</p>';
                        return;
                    }
                    
                    images.forEach(imgPath => {
                        const imgDiv = document.createElement('div');
                        imgDiv.className = 'gallery-item';
                        imgDiv.innerHTML = `
                            <img src="../${imgPath}" alt="Imagen" onclick="selectImage('${imgPath}')" loading="lazy">
                            <p>${imgPath.split('/').pop()}</p>
                        `;
                        gallery.appendChild(imgDiv);
                    });
                })
                .catch(error => {
                    console.error('Error loading images:', error);
                    gallery.innerHTML = '<p>Error al cargar las imágenes</p>';
                });
        }

        function selectImage(imgPath) {
            if (currentImageField) {
                currentImageField.value = imgPath;
                
                // Actualizar preview si existe
                const card = currentImageField.closest('.content-card');
                if (card) {
                    const preview = card.querySelector('.image-preview img');
                    if (preview) {
                        preview.src = '../' + imgPath;
                    }
                }
            }
            closeImageSelector();
        }

        function resetForm(button) {
            const form = button.closest('form');
            if (confirm('¿Estás seguro de que quieres resetear el formulario?')) {
                form.reset();
                
                // Restaurar imagen original si existe
                const card = form.closest('.content-card');
                if (card) {
                    const preview = card.querySelector('.image-preview img');
                    const imgInput = card.querySelector('input[name="img"]');
                    if (preview && imgInput && imgInput.defaultValue) {
                        preview.src = '../' + imgInput.defaultValue;
                    }
                }
            }
        }

        function confirmDelete(id) {
            document.getElementById('deleteId').value = id;
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Cerrar modal al hacer clic fuera
        window.onclick = function (event) {
            const imageModal = document.getElementById('imageModal');
            const deleteModal = document.getElementById('deleteModal');
            
            if (event.target === imageModal) {
                closeImageSelector();
            }
            if (event.target === deleteModal) {
                closeDeleteModal();
            }
        }

        // Preview de imagen antes de subir
        document.getElementById('image_file').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    console.log('Archivo seleccionado:', file.name);
                    
                    // Opcional: Mostrar preview del archivo seleccionado
                    const fileSize = (file.size / 1024 / 1024).toFixed(2);
                    console.log('Tamaño del archivo:', fileSize + ' MB');
                };
                reader.readAsDataURL(file);
            }
        });

        // Validación del formulario antes de enviar
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const requiredFields = form.querySelectorAll('input[required], textarea[required]');
                let valid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        valid = false;
                        field.style.borderColor = '#dc3545';
                    } else {
                        field.style.borderColor = '#e9ecef';
                    }
                });
                
                if (!valid) {
                    e.preventDefault();
                    alert('Por favor, completa todos los campos obligatorios');
                }
            });
        });

        // Auto-hide alerts after 5 seconds
        document.querySelectorAll('.alert').forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.remove();
                }, 300);
            }, 5000);
        });

        // Responsive handler
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                closeSidebar();
            }
        });

        // Smooth scrolling for better UX
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Escape key to close modals
            if (e.key === 'Escape') {
                closeImageSelector();
                closeDeleteModal();
                closeSidebar();
            }
            
            // Ctrl+S to save (prevent default browser save)
            if (e.ctrlKey && e.key === 's') {
                e.preventDefault();
                const activeForm = document.querySelector('form:focus-within');
                if (activeForm) {
                    activeForm.submit();
                }
            }
        });
    </script>
</body>
</html>
