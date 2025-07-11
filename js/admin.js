// Scripts para el panel administrativo

// Función para mostrar secciones
function mostrarSeccion(seccionId) {
    // Ocultar todas las secciones
    const secciones = document.querySelectorAll('.admin-section');
    secciones.forEach(seccion => {
        seccion.style.display = 'none';
    });
    
    // Mostrar la sección seleccionada
    const seccionActiva = document.getElementById(seccionId);
    if (seccionActiva) {
        seccionActiva.style.display = 'block';
    }
    
    // Actualizar enlaces activos
    const enlaces = document.querySelectorAll('.nav-link');
    enlaces.forEach(enlace => {
        enlace.classList.remove('active');
    });
    
    // Marcar el enlace activo
    event.target.classList.add('active');
}

// Función para editar elemento
function editarElemento(id) {
    const formulario = document.getElementById('form-' + id);
    if (formulario) {
        formulario.style.display = formulario.style.display === 'none' ? 'block' : 'none';
    }
}

// Función para cancelar edición
function cancelarEdicion(id) {
    const formulario = document.getElementById('form-' + id);
    if (formulario) {
        formulario.style.display = 'none';
    }
}

// Función para confirmar cambios
function confirmarCambios() {
    return confirm('¿Está seguro de que desea guardar estos cambios?');
}

// Auto-hide alerts después de 5 segundos
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 300);
        }, 5000);
    });
});

// Prevenir envío accidental de formularios
document.addEventListener('DOMContentLoaded', function() {
    const formularios = document.querySelectorAll('form');
    formularios.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirmarCambios()) {
                e.preventDefault();
            }
        });
    });
});