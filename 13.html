<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Instituto Tecnológico</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #2c3e50;
            min-height: 100vh;
            
        }

        .admin-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .admin-header {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .admin-title {
            font-size: 2.2em;
            color: #2c3e50;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-title::before {
            content: '⚙️';
            font-size: 1.2em;
        }

        .admin-subtitle {
            color: #7f8c8d;
            font-size: 1.1em;
        }

        .admin-nav {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .nav-tab {
            background: white;
            padding: 15px 25px;
            border-radius: 10px;
            border: none;
            font-size: 1em;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .nav-tab:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-tab.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .admin-section {
            display: none;
            animation: fadeIn 0.5s ease-in-out;
        }

        .admin-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 1.8em;
            color: #2c3e50;
            margin: 0;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .data-grid {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            background: #f8f9fa;
            padding: 20px;
            text-align: left;
            font-weight: 600;
            color: #2c3e50;
            border-bottom: 2px solid #e9ecef;
        }

        .data-table td {
            padding: 18px 20px;
            border-bottom: 1px solid #e9ecef;
            vertical-align: middle;
        }

        .data-table tr:hover {
            background: #f8f9fa;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 500;
            text-transform: uppercase;
        }

        .status-published {
            background: #d1f2d1;
            color: #2d5a2d;
        }

        .status-draft {
            background: #fff3cd;
            color: #856404;
        }

        .status-active {
            background: #d1f2d1;
            color: #2d5a2d;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9em;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: #3498db;
            color: white;
        }

        .btn-edit:hover {
            background: #2980b9;
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
        }

        .btn-delete:hover {
            background: #c0392b;
        }

        .btn-view {
            background: #95a5a6;
            color: white;
        }

        .btn-view:hover {
            background: #7f8c8d;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 2.5em;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 2.2em;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #7f8c8d;
            font-size: 1em;
            font-weight: 500;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            backdrop-filter: blur(5px);
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .modal-title {
            font-size: 1.5em;
            color: #2c3e50;
            margin: 0;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5em;
            cursor: pointer;
            color: #7f8c8d;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2c3e50;
        }

        .form-input, .form-textarea, .form-select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-buttons {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 25px;
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
        }

        .image-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #e9ecef;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #7f8c8d;
        }

        .empty-state-icon {
            font-size: 4em;
            margin-bottom: 20px;
        }

        .empty-state-text {
            font-size: 1.2em;
            margin-bottom: 25px;
        }

        @media (max-width: 768px) {
            .admin-nav {
                flex-direction: column;
                gap: 10px;
            }

            .nav-tab {
                padding: 12px 20px;
            }

            .section-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .data-table {
                font-size: 0.9em;
            }

            .data-table th,
            .data-table td {
                padding: 12px 15px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="admin-title">Panel Administrativo</h1>
            <p class="admin-subtitle">Gestión de contenido del portal institucional</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📝</div>
                <div class="stat-number">12</div>
                <div class="stat-label">Publicaciones</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🖼️</div>
                <div class="stat-number">45</div>
                <div class="stat-label">Imágenes</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-number">3</div>
                <div class="stat-label">Usuarios Admin</div>
            </div>
        </div>

        <nav class="admin-nav">
            <button class="nav-tab active" onclick="showSection('publications')">📝 Publicaciones</button>
            <button class="nav-tab" onclick="showSection('images')">🖼️ Imágenes</button>
            <button class="nav-tab" onclick="showSection('users')">👥 Usuarios</button>
        </nav>

        <!-- Publicaciones Section -->
        <div id="publications" class="admin-section active">
            <div class="section-header">
                <h2 class="section-title">Gestión de Publicaciones</h2>
                <button class="btn-primary" onclick="openModal('publicationModal')">
                    ➕ Nueva Publicación
                </button>
            </div>
            <div class="data-grid">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nuevas Oportunidades de Becas 2025</td>
                            <td>15/06/2025</td>
                            <td><span class="status-badge status-published">Publicado</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-view" onclick="viewPublication(1)">👁️</button>
                                    <button class="btn-action btn-edit" onclick="editPublication(1)">✏️</button>
                                    <button class="btn-action btn-delete" onclick="deletePublication(1)">🗑️</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Convenio con Empresas Tecnológicas</td>
                            <td>10/06/2025</td>
                            <td><span class="status-badge status-published">Publicado</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-view" onclick="viewPublication(2)">👁️</button>
                                    <button class="btn-action btn-edit" onclick="editPublication(2)">✏️</button>
                                    <button class="btn-action btn-delete" onclick="deletePublication(2)">🗑️</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Evento de Innovación Tecnológica</td>
                            <td>05/06/2025</td>
                            <td><span class="status-badge status-draft">Borrador</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-view" onclick="viewPublication(3)">👁️</button>
                                    <button class="btn-action btn-edit" onclick="editPublication(3)">✏️</button>
                                    <button class="btn-action btn-delete" onclick="deletePublication(3)">🗑️</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Imágenes Section -->
        <div id="images" class="admin-section">
            <div class="section-header">
                <h2 class="section-title">Gestión de Imágenes</h2>
                <button class="btn-primary" onclick="openModal('imageModal')">
                    ➕ Subir Imagen
                </button>
            </div>
            <div class="data-grid">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Vista Previa</th>
                            <th>Nombre</th>
                            <th>Ubicación</th>
                            <th>Tamaño</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgZmlsbD0iIzY2N2VlYSIvPjx0ZXh0IHg9IjUwIiB5PSI1NSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE0IiBmaWxsPSJ3aGl0ZSIgdGV4dC1hbmNob3I9Im1pZGRsZSI+SW1hZ2VuPC90ZXh0Pjwvc3ZnPg==" alt="Preview" class="image-preview"></td>
                            <td>hero-banner.jpg</td>
                            <td>Página Principal - Banner</td>
                            <td>256 KB</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-view" onclick="viewImage(1)">👁️</button>
                                    <button class="btn-action btn-edit" onclick="editImage(1)">✏️</button>
                                    <button class="btn-action btn-delete" onclick="deleteImage(1)">🗑️</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgZmlsbD0iIzc2NGJhMiIvPjx0ZXh0IHg9IjUwIiB5PSI1NSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE0IiBmaWxsPSJ3aGl0ZSIgdGV4dC1hbmNob3I9Im1pZGRsZSI+SW1hZ2VuPC90ZXh0Pjwvc3ZnPg==" alt="Preview" class="image-preview"></td>
                            <td>blog-card-1.jpg</td>
                            <td>Blog - Tarjeta 1</td>
                            <td>182 KB</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-view" onclick="viewImage(2)">👁️</button>
                                    <button class="btn-action btn-edit" onclick="editImage(2)">✏️</button>
                                    <button class="btn-action btn-delete" onclick="deleteImage(2)">🗑️</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgZmlsbD0iIzM0OThkYiIvPjx0ZXh0IHg9IjUwIiB5PSI1NSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE0IiBmaWxsPSJ3aGl0ZSIgdGV4dC1hbmNob3I9Im1pZGRsZSI+SW1hZ2VuPC90ZXh0Pjwvc3ZnPg==" alt="Preview" class="image-preview"></td>
                            <td>logo-instituto.png</td>
                            <td>Header - Logo</td>
                            <td>45 KB</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-view" onclick="viewImage(3)">👁️</button>
                                    <button class="btn-action btn-edit" onclick="editImage(3)">✏️</button>
                                    <button class="btn-action btn-delete" onclick="deleteImage(3)">🗑️</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Usuarios Section -->
        <div id="users" class="admin-section">
            <div class="section-header">
                <h2 class="section-title">Gestión de Usuarios</h2>
                <button class="btn-primary" onclick="openModal('userModal')">
                    ➕ Nuevo Usuario
                </button>
            </div>
            <div class="data-grid">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Juan Pérez</td>
                            <td>juan.perez@instituto.edu.pe</td>
                            <td>Super Admin</td>
                            <td><span class="status-badge status-active">Activo</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-edit" onclick="editUser(1)">✏️</button>
                                    <button class="btn-action btn-delete" onclick="deleteUser(1)">🗑️</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>María González</td>
                            <td>maria.gonzalez@instituto.edu.pe</td>
                            <td>Administrador</td>
                            <td><span class="status-badge status-active">Activo</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-edit" onclick="editUser(2)">✏️</button>
                                    <button class="btn-action btn-delete" onclick="deleteUser(2)">🗑️</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Carlos Rodríguez</td>
                            <td>carlos.rodriguez@instituto.edu.pe</td>
                            <td>Editor</td>
                            <td><span class="status-badge status-inactive">Inactivo</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-action btn-edit" onclick="editUser(3)">✏️</button>
                                    <button class="btn-action btn-delete" onclick="deleteUser(3)">🗑️</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal para Publicaciones -->
    <div id="publicationModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nueva Publicación</h3>
                <button class="modal-close" onclick="closeModal('publicationModal')">✖️</button>
            </div>
            <form>
                <div class="form-group">
                    <label class="form-label">Título</label>
                    <input type="text" class="form-input" placeholder="Título de la publicación">
                </div>
                <div class="form-group">
                    <label class="form-label">Contenido</label>
                    <textarea class="form-textarea" placeholder="Contenido de la publicación"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Estado</label>
                    <select class="form-select">
                        <option value="draft">Borrador</option>
                        <option value="published">Publicado</option>
                    </select>
                </div>
                <div class="form-buttons">
                    <button type="button" class="btn-secondary" onclick="closeModal('publicationModal')">Cancelar</button>
                    <button type="submit" class="btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal para Imágenes -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Subir Imagen</h3>
                <button class="modal-close" onclick="closeModal('imageModal')">✖️</button>
            </div>
            <form>
                <div class="form-group">
                    <label class="form-label">Archivo</label>
                    <input type="file" class="form-input" accept="image/*">
                </div>
                <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-input" placeholder="Nombre de la imagen">
                </div>
                <div class="form-group">
                    <label class="form-label">Ubicación</label>
                    <select class="form-select">
                        <option value="hero">Página Principal - Banner</option>
                        <option value="blog">Blog - Tarjeta</option>
                        <option value="slider">Slider</option>
                        <option value="logo">Header - Logo</option>
                    </select>
                </div>
                <div class="form-buttons">
                    <button type="button" class="btn-secondary" onclick="closeModal('imageModal')">Cancelar</button>
                    <button type="submit" class="btn-primary">Subir</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal para Usuarios -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nuevo Usuario</h3>
                <button class="modal-close" onclick="closeModal('userModal')">✖️</button>
            </div>
            <form>
                <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-input" placeholder="Nombre completo">
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-input" placeholder="correo@instituto.edu.pe">
                </div>
                <div class="form-group">
                    <label class="form-label">Rol</label>
                    <select class="form-select">
                        <option value="admin">Administrador</option>
                        <option value="editor">Editor</option>
                        <option value="super">Super Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-input" placeholder="Contraseña">
                </div>
                <div class="form-buttons">
                    <button type="button" class="btn-secondary" onclick="closeModal('userModal')">Cancelar</button>
                    <button type="submit" class="btn-primary">Crear Usuario</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Gestión de pestañas
        function showSection(sectionId) {
            // Ocultar todas las secciones
            const sections = document.querySelectorAll('.admin-section');
            sections.forEach(section => section.classList.remove('active'));
            
            // Remover active de todas las pestañas
            const tabs = document.querySelectorAll('.nav-tab');
            tabs.forEach(tab => tab.classList.remove('active'));
            
            // Mostrar la sección seleccionada
            document.getElementById(sectionId).classList.add('active');
            
            // Activar la pestaña correspondiente
            event.target.classList.add('active');
        }

        // Gestión de modales
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        // Cerrar modal al hacer clic fuera
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.remove('active');
                }
            });
        });

        // Funciones de publicaciones