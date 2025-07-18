<?php require_once 'config/functions.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organización del Programa - Diseño y Programación Web</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.7;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
             margin-top: 90px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .content-section {
            padding: 40px 60px;
        }

        .section-title {
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #2c3e50;
            position: relative;
            text-align: center;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .intro-text {
            font-size: 1.2em;
            line-height: 1.8;
            color: #555;
            margin-bottom: 50px;
            text-align: center;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .organization-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }

        .org-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .org-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .org-icon {
            font-size: 3em;
            margin-bottom: 20px;
            display: block;
            color: #667eea;
        }

        .org-title {
            font-size: 1.5em;
            margin-bottom: 15px;
            font-weight: 600;
            color: #2c3e50;
        }

        .org-description {
            font-size: 1em;
            line-height: 1.6;
            color: #666;
            margin-bottom: 20px;
        }

        .org-details {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            text-align: left;
            border-left: 4px solid #667eea;
        }

        .org-details h4 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .org-details ul {
            list-style: none;
            padding-left: 0;
        }

        .org-details li {
            padding: 5px 0;
            position: relative;
            padding-left: 20px;
        }

        .org-details li::before {
            content: '▶';
            position: absolute;
            left: 0;
            color: #667eea;
            font-size: 0.8em;
        }

        .structure-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 60px;
            margin: 0px 0;
            border-radius: 20px;
        }

        .structure-title {
            font-size: 2.2em;
            margin-bottom: 30px;
            color: #2c3e50;
            text-align: center;
        }

        .hierarchy-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
            margin-top: 40px;
        }

        .hierarchy-level {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            width: 100%;
        }

        .hierarchy-item {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            min-width: 200px;
            transition: all 0.3s ease;
            position: relative;
        }

        .hierarchy-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .level-1 {
            border-top: 5px solid #667eea;
        }

        .level-2 {
            border-top: 5px solid #764ba2;
        }

        .level-3 {
            border-top: 5px solid #28a745;
        }

        .hierarchy-title {
            font-size: 1.2em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .hierarchy-subtitle {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 15px;
        }

        .hierarchy-responsibilities {
            font-size: 0.85em;
            color: #555;
            line-height: 1.4;
     text-align: left;
    display: inline-block;

              
        }

        .connection-line {
            width: 2px;
            height: 20px;
            background: #ddd;
            margin: 0 auto;
        }

        .departments-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .department-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-left: 5px solid #667eea;
        }

        .department-card:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .department-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .department-icon {
            font-size: 2em;
            margin-right: 15px;
            color: #667eea;
        }

        .department-name {
            font-size: 1.3em;
            font-weight: bold;
            color: #2c3e50;
        }

        .department-description {
            font-size: 1em;
            line-height: 1.6;
            color: #555;
            margin-bottom: 15px;
        }

        .department-functions {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
        }

        .department-functions h5 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 1em;
        }

         /* Estilos adicionales para mejorar la responsividad en móviles */
    @media (max-width: 768px) {
      
        .container {
            margin: 5px;
            border-radius: 10px;
        }

        .content-section {
            padding: 30px 15px;
        }

        .section-title {
            font-size: 1.8em;
        }

        .intro-text {
            font-size: 1em;
        }

        .organization-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .org-card {
            padding: 20px;
        }

        .org-title {
            font-size: 1.3em;
        }

        .org-description {
            font-size: 0.9em;
        }

        .structure-section {
            padding: 30px 15px;
        }

        .structure-title {
            font-size: 1.5em;
        }

        .hierarchy-level {
            flex-direction: column;
            align-items: center;
        }

        .hierarchy-item {
            min-width: 100%;
            margin-bottom: 15px;
        }

        .hierarchy-title {
            font-size: 1.1em;
        }

        .hierarchy-subtitle {
            font-size: 0.9em;
        }

        .hierarchy-responsibilities {
            font-size: 0.8em;
        }

        .departments-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .department-card {
            padding: 20px;
        }

        .department-name {
            font-size: 1.1em;
        }

        .department-description {
            font-size: 0.9em;
        }
    }

    /* Estilos para pantallas muy pequeñas */
    @media (max-width: 480px) {
        .section-title {
            font-size: 1.5em;
        }

        .intro-text {
            font-size: 0.9em;
        }

        .org-title {
            font-size: 1.1em;
        }

        .org-description {
            font-size: 0.8em;
        }

        .structure-title {
            font-size: 1.3em;
        }

        .hierarchy-title {
            font-size: 1em;
        }

        .hierarchy-subtitle {
            font-size: 0.8em;
        }

        .department-name {
            font-size: 1em;
        }

        .department-description {
            font-size: 0.8em;
        }
    }

        /* Animations */
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

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        .scroll-animate {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }

        .scroll-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .hero-section {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9));
            color: white;
            padding: 80px 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="0,0 1000,100 1000,0"/></svg>');
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3.5em;
            margin-bottom: 20px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.4em;
            margin-bottom: 30px;
            opacity: 0.9;
            animation: fadeInUp 1s ease-out 0.3s both;
        }
    </style>
</head>
<body>

 <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <div class="container">
         <section class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">Organización del Programa</h1>
                <p class="hero-subtitle">
               El Programa de Estudios de Diseño y Programación Web cuenta con una estructura organizativa sólida y bien definida que garantiza la calidad educativa, el desarrollo profesional de los estudiantes y la gestión eficiente de los recursos académicos y administrativos.
          </p>
            </div>
        </section>
        

        <section class="structure-section scroll-animate">
            <h2 class="structure-title">Estructura Jerárquica</h2>
            
            <div class="hierarchy-container">
                <div class="hierarchy-level">
                    <div class="hierarchy-item level-1">
                     
                        <div class="hierarchy-title">Coordinador Académico</div>
                        <div class="hierarchy-subtitle">Gestión académica</div>
                        <div class="hierarchy-responsibilities">
                            Planificación curricular, supervisión docente y evaluación académica
                       
                    </div>
                    </div>
                </div>

                <div class="connection-line"></div>

                <div class="hierarchy-level">
    <div class="hierarchy-item level-2">
        <div class="hierarchy-title">Profesores del Programa de Estudios de Diseño y Programación Web</div>
        <div class="hierarchy-subtitle">Docentes especializados en tecnología, diseño gráfico y desarrollo web</div>
        <div class="hierarchy-responsibilities">
            <ul>
                <li>Imparten cursos técnicos y prácticos del plan curricular</li>
                <li>Brindan asesoría en proyectos de innovación tecnológica</li>
                <li>Participan en actividades académicas y de actualización profesional</li>
            </ul>
        </div>
    </div>
</div>


            </div>
        </section>

        
    </div>

    <script>
        // Scroll animations
        function animateOnScroll() {
            const elements = document.querySelectorAll('.scroll-animate');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                if (elementTop < windowHeight - 100) {
                    element.classList.add('visible');
                }
            });
        }

        window.addEventListener('scroll', animateOnScroll);
        animateOnScroll(); // Run on page load

        // Intersection Observer for better performance
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.scroll-animate').forEach(el => {
            observer.observe(el);
        });
    </script>

<!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>