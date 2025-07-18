<?php
// NO debe haber NADA antes de esta línea (ni espacios, ni BOM)
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
    <link rel="stylesheet" href="admin_styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            form.reset();
        }
        
        function confirmDelete(id) {
            document.getElementById('deleteId').value = id;
            document.getElementById('deleteModal').style.display = 'block';
        }
        
        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }
        
        // Cerrar modal al hacer clic fuera
        window.onclick = function(event) {
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
        document.getElementById('image_file').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    console.log('Archivo seleccionado:', file.name);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>