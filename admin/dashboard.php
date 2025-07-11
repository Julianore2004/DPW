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
        }
        else {
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

// Obtener lista de imágenes disponibles
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

$datos = obtenerDatos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" href="admin_styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .upload-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            border: 2px dashed #dee2e6;
        }
        
        .upload-form {
            display: flex;
            gap: 15px;
            align-items: end;
            flex-wrap: wrap;
        }
        
        .file-input-group {
            flex: 1;
            min-width: 250px;
        }
        
        .file-input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #495057;
        }
        
        .file-input-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        
        .file-input-wrapper input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #dee2e6;
            border-radius: 4px;
            background: white;
            cursor: pointer;
        }
        
        .file-input-wrapper input[type="file"]:focus {
            border-color: #007bff;
            outline: none;
        }
        
        .btn-upload {
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: background 0.3s;
        }
        
        .btn-upload:hover {
            background: #218838;
        }
        
        .upload-info {
            width: 100%;
            margin-top: 10px;
            font-size: 12px;
            color: #6c757d;
        }
        
        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            max-height: 400px;
            overflow-y: auto;
            padding: 10px;
        }
        
        .gallery-item {
            border: 2px solid #dee2e6;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
        }
        
        .gallery-item:hover {
            border-color: #007bff;
            box-shadow: 0 2px 10px rgba(0,123,255,0.1);
        }
        
        .gallery-item img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 5px;
        }
        
        .gallery-item p {
            margin: 0;
            font-size: 11px;
            color: #6c757d;
            word-break: break-all;
        }
        
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 0;
            border-radius: 8px;
            width: 80%;
            max-width: 800px;
            max-height: 80vh;
            overflow: hidden;
        }
        
        .modal-header {
            padding: 20px;
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .modal-header h3 {
            margin: 0;
            color: #495057;
        }
        
        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            line-height: 1;
        }
        
        .close:hover {
            color: #000;
        }
        
        .modal-body {
            padding: 20px;
        }
        
        .image-preview {
            width: 100%;
            height: 120px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 15px;
        }
        
        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-sidebar">
            <div class="admin-logo">
                <i class="fas fa-shield-alt"></i>
                <h3>Panel Admin</h3>
            </div>
            <nav class="admin-nav">
                <ul>
                    <li><a href="#" class="active" onclick="showSection('content')"><i class="fas fa-edit"></i> Contenido</a></li>
                    <li><a href="#" onclick="showSection('images')"><i class="fas fa-images"></i> Imágenes</a></li>
                    <li><a href="#" onclick="showSection('users')"><i class="fas fa-users"></i> Usuarios</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="admin-main">
            <div class="admin-header">
                <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
                <div class="admin-user">
                    <span><i class="fas fa-user"></i> <?php echo $_SESSION['admin_usuario']; ?></span>
                    <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Salir</a>
                </div>
            </div>
        
            <?php if (isset($mensaje)): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo $mensaje; ?>
                </div>
            <?php endif; ?>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-triangle"></i> <?php echo $error; ?>
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
                
                <div class="section-header">
                    <h2><i class="fas fa-edit"></i> Gestión de Contenido</h2>
                    <p>Edita los textos e imágenes de tu sitio web</p>
                </div>
                
                <div class="content-grid">
                    <?php foreach ($datos as $item): ?>
                        <div class="content-card">
                            <div class="card-header">
                                <h3><i class="fas fa-file-alt"></i> <?php echo ucfirst($item['titulo']); ?></h3>
                                <span class="card-id">#<?php echo $item['id']; ?></span>
                            </div>
                            
                            <div class="card-preview">
                                <div class="image-preview">
                                    <img src="../<?php echo $item['img']; ?>" alt="Preview" onerror="this.src='../img/default.jpg'">
                                </div>
                            </div>
                            
                            <form method="POST" class="edit-form">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <input type="hidden" name="update_content" value="1">
                                
                                <div class="form-group">
                                    <label><i class="fas fa-heading"></i> Título:</label>
                                    <input type="text" name="titulo" value="<?php echo $item['titulo']; ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label><i class="fas fa-align-left"></i> Texto:</label>
                                    <textarea name="textos" rows="4" placeholder="Escribe el contenido aquí..."><?php echo $item['textos']; ?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label><i class="fas fa-image"></i> Imagen:</label>
                                    <div class="image-input-group">
                                        <input type="text" name="img" id="img_<?php echo $item['id']; ?>" value="<?php echo $item['img']; ?>" required readonly>
                                        <button type="button" class="btn-browse" onclick="openImageSelector(<?php echo $item['id']; ?>)">
                                            <i class="fas fa-folder-open"></i> Seleccionar
                                        </button>
                                    </div>
                                    <small><i class="fas fa-info-circle"></i> Selecciona una imagen de la galería o sube una nueva</small>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Guardar Cambios
                                    </button>
                                    <button type="button" class="btn btn-secondary" onclick="resetForm(this)">
                                        <i class="fas fa-undo"></i> Resetear
                                    </button>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
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
    
    <script>
        let currentImageField = null;
        
        function showSection(section) {
            // Función para cambiar secciones (para futuras expansiones)
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
            
            // Cargar imágenes desde PHP
            fetch('get_images.php')
                .then(response => response.json())
                .then(images => {
                    gallery.innerHTML = '';
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
                // Actualizar preview
                const preview = currentImageField.closest('.content-card').querySelector('.image-preview img');
                preview.src = '../' + imgPath;
            }
            closeImageSelector();
        }
        
        function resetForm(button) {
            const form = button.closest('form');
            form.reset();
        }
        
        // Cerrar modal al hacer clic fuera
        window.onclick = function(event) {
            const modal = document.getElementById('imageModal');
            if (event.target === modal) {
                closeImageSelector();
            }
        }
        
        // Preview de imagen antes de subir
        document.getElementById('image_file').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Podrías mostrar un preview aquí si quieres
                    console.log('Archivo seleccionado:', file.name);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>