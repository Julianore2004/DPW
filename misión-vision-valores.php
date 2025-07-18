<?php require_once 'config/functions.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misión, Visión y Valores - Programa de estudios de Diseño y Programación Web</title>
    <!-- Incluyendo Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            padding: 80px 60px;
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
        .navigation-tabs {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 60px;
            flex-wrap: wrap;
        }
        .nav-tab {
            padding: 15px 30px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: none;
            border-radius: 15px;
            font-size: 1.1em;
            font-weight: 600;
            color: #2c3e50;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            min-width: 150px;
        }
        .nav-tab:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .nav-tab.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-color: #667eea;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .content-panel {
            display: none;
            animation: fadeInUp 0.8s ease-out;
        }
        .content-panel.active {
            display: block;
        }
        .mvv-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 60px;
            border-radius: 25px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(102, 126, 234, 0.1);
            margin-bottom: 40px;
        }
        .mvv-icon i {
            font-size: 2.5em;
            margin-bottom: 20px;
            display: block;
        }
        .mvv-title {
            font-size: 2.5em;
            margin-bottom: 25px;
            color: #2c3e50;
            font-weight: 700;
        }
        .mvv-description {
            font-size: 1.3em;
            line-height: 1.8;
            color: #555;
            max-width: 800px;
            margin: 0 auto;
        }
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        .value-item {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
        }
        .value-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .value-icon i {
            font-size: 3em;
            margin-bottom: 20px;
            display: block;
        }
        .value-title {
            font-size: 1.5em;
            margin-bottom: 15px;
            font-weight: 600;
            color: #2c3e50;
        }
        .value-item:hover .value-title {
            color: white;
        }
        .value-description {
            font-size: 1em;
            line-height: 1.6;
            color: #666;
        }
        .value-item:hover .value-description {
            color: rgba(255, 255, 255, 0.9);
        }
        .highlight-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px;
            border-radius: 25px;
            text-align: center;
            margin-top: 60px;
        }
        .highlight-title {
            font-size: 2.2em;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .highlight-text {
            font-size: 1.3em;
            line-height: 1.8;
            opacity: 0.9;
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

        /* Responsive Design Mejorado */
        @media (max-width: 1024px) {
            .container {
                margin: 0 20px;
                border-radius: 15px;
            }
            .hero-section {
                padding: 60px 40px;
            }
            .hero-title {
                font-size: 2.8em;
            }
            .hero-subtitle {
                font-size: 1.2em;
            }
            .content-section {
                padding: 60px 40px;
            }
            .values-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 25px;
            }
        }

        @media (max-width: 768px) {
         
            .container {
                margin: 0 10px;
                border-radius: 10px;
            }
            .hero-section {
                padding: 40px 20px;
            }
            .hero-title {
                font-size: 2.2em;
                line-height: 1.2;
            }
            .hero-subtitle {
                font-size: 1.1em;
                line-height: 1.5;
            }
            .content-section {
                padding: 40px 20px;
            }
            .section-title {
                font-size: 2em;
            }
            .intro-text {
                font-size: 1.1em;
                margin-bottom: 30px;
            }
            .navigation-tabs {
                flex-direction: column;
                align-items: center;
                gap: 15px;
                margin-bottom: 40px;
            }
            .nav-tab {
                width: 100%;
                max-width: 300px;
                min-width: auto;
                padding: 12px 20px;
                font-size: 1em;
            }
            .mvv-card {
                padding: 30px 20px;
                border-radius: 15px;
            }
            .mvv-icon i {
                font-size: 2em;
            }
            .mvv-title {
                font-size: 1.8em;
                margin-bottom: 20px;
            }
            .mvv-description {
                font-size: 1.1em;
                line-height: 1.6;
            }
            .values-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                margin-top: 30px;
            }
            .value-item {
                padding: 30px 20px;
                border-radius: 15px;
            }
            .value-icon i {
                font-size: 2.5em;
            }
            .value-title {
                font-size: 1.3em;
            }
            .value-description {
                font-size: 0.95em;
            }
            .highlight-section {
                padding: 40px 20px;
                border-radius: 15px;
                margin-top: 40px;
            }
            .highlight-title {
                font-size: 1.8em;
            }
            .highlight-text {
                font-size: 1.1em;
            }
        }

        @media (max-width: 480px) {
            .container {
                margin: 0 5px;
                border-radius: 8px;
            }
            .hero-section {
                padding: 30px 15px;
            }
            .hero-title {
                font-size: 1.8em;
            }
            .hero-subtitle {
                font-size: 1em;
            }
            .content-section {
                padding: 30px 15px;
            }
            .section-title {
                font-size: 1.6em;
            }
            .section-title::after {
                width: 60px;
                height: 3px;
            }
            .navigation-tabs {
                gap: 10px;
            }
            .nav-tab {
                max-width: 280px;
                padding: 10px 15px;
                font-size: 0.9em;
                border-radius: 10px;
            }
            .mvv-card {
                padding: 25px 15px;
                border-radius: 12px;
            }
            .mvv-icon i {
                font-size: 1.8em;
            }
            .mvv-title {
                font-size: 1.5em;
            }
            .mvv-description {
                font-size: 1em;
            }
            .value-item {
                padding: 25px 15px;
                border-radius: 12px;
            }
            .value-icon i {
                font-size: 2.2em;
            }
            .value-title {
                font-size: 1.2em;
            }
            .value-description {
                font-size: 0.9em;
            }
            .highlight-section {
                padding: 30px 15px;
                border-radius: 12px;
            }
            .highlight-title {
                font-size: 1.5em;
            }
            .highlight-text {
                font-size: 1em;
            }
        }

        /* Mejoras adicionales para touch devices */
        @media (hover: none) and (pointer: coarse) {
            .nav-tab:hover {
                transform: none;
            }
            .value-item:hover {
                transform: none;
            }
            .nav-tab:active {
                transform: scale(0.98);
            }
            .value-item:active {
                transform: scale(0.98);
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

        /* Optimizaciones de rendimiento para móviles */
        @media (max-width: 768px) {
            .scroll-animate {
                transform: translateY(20px);
            }
            .container {
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }
            .value-item {
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }
            .mvv-card {
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <section class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">Misión, Visión y Valores</h1>
                <p class="hero-subtitle">Conoce los pilares fundamentales que guían nuestro Programa de Estudios de Diseño y Programación Web. Nuestros principios definen quiénes somos, hacia dónde vamos y cómo trabajamos para formar profesionales excepcionales.</p>
            </div>
        </section>
        
        <section class="content-section">
            <div class="navigation-tabs">
                <button class="nav-tab active" onclick="showPanel('mision')">Misión</button>
                <button class="nav-tab" onclick="showPanel('vision')">Visión</button>
                <button class="nav-tab" onclick="showPanel('valores')">Valores</button>
            </div>
            
            <div id="mision" class="content-panel active">
                <div class="mvv-card scroll-animate">
                    <div class="mvv-icon"><i class="fas fa-bullseye"></i></div>
                    <h2 class="mvv-title">Nuestra Misión</h2>
                    <p class="mvv-description">
                        Formar profesionales integrales en diseño y programación web, combinando creatividad, innovación tecnológica y excelencia académica. Nos comprometemos a desarrollar competencias técnicas y habilidades blandas que permitan a nuestros estudiantes crear soluciones digitales innovadoras y contribuir al crecimiento del sector tecnológico, preparándolos para ser líderes en la transformación digital de las organizaciones.
                    </p>
                </div>
            </div>
            
            <div id="vision" class="content-panel">
                <div class="mvv-card scroll-animate">
                    <div class="mvv-icon"><i class="fas fa-rocket"></i></div>
                    <h2 class="mvv-title">Nuestra Visión</h2>
                    <p class="mvv-description">
                        Ser el programa de referencia en formación de diseñadores y programadores web a nivel nacional, reconocido por la calidad de sus egresados y su contribución a la innovación tecnológica. Aspiramos a liderar la educación digital mediante metodologías pedagógicas innovadoras, alianzas estratégicas con la industria y la generación de talento altamente competitivo que impulse el desarrollo tecnológico del país.
                    </p>
                </div>
            </div>
            
            <div id="valores" class="content-panel">
                <div class="mvv-card scroll-animate">
                    <div class="mvv-icon"><i class="fas fa-gem"></i></div>
                    <h2 class="mvv-title">Nuestros Valores</h2>
                    <p class="mvv-description">
                        Los valores que nos definen y guían cada acción en nuestro programa educativo:
                    </p>
                </div>
                
                <div class="values-grid">
                    <div class="value-item scroll-animate">
                        <span class="value-icon"><i class="fas fa-fire"></i></span>
                        <h3 class="value-title">Excelencia</h3>
                        <p class="value-description">
                            Buscamos la máxima calidad en todos nuestros procesos educativos, desde la enseñanza hasta el desarrollo profesional de nuestros estudiantes.
                        </p>
                    </div>
                    <div class="value-item scroll-animate">
                        <span class="value-icon"><i class="fas fa-lightbulb"></i></span>
                        <h3 class="value-title">Innovación</h3>
                        <p class="value-description">
                            Fomentamos la creatividad y el pensamiento disruptivo para crear soluciones originales y tecnológicamente avanzadas.
                        </p>
                    </div>
                    <div class="value-item scroll-animate">
                        <span class="value-icon"><i class="fas fa-handshake"></i></span>
                        <h3 class="value-title">Colaboración</h3>
                        <p class="value-description">
                            Promovemos el trabajo en equipo y la construcción colectiva del conocimiento como base del aprendizaje efectivo.
                        </p>
                    </div>
                    <div class="value-item scroll-animate">
                        <span class="value-icon"><i class="fas fa-bullseye"></i></span>
                        <h3 class="value-title">Compromiso</h3>
                        <p class="value-description">
                            Mantenemos una dedicación constante hacia el crecimiento académico y profesional de cada estudiante.
                        </p>
                    </div>
                    <div class="value-item scroll-animate">
                        <span class="value-icon"><i class="fas fa-star"></i></span>
                        <h3 class="value-title">Integridad</h3>
                        <p class="value-description">
                            Actuamos con honestidad, transparencia y ética en todas nuestras actividades académicas y profesionales.
                        </p>
                    </div>
                    <div class="value-item scroll-animate">
                        <span class="value-icon"><i class="fas fa-globe"></i></span>
                        <h3 class="value-title">Inclusión</h3>
                        <p class="value-description">
                            Valoramos la diversidad y creamos un ambiente educativo accesible para todos los estudiantes.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="highlight-section scroll-animate">
                <h3 class="highlight-title">Comprometidos con tu Futuro</h3>
                <p class="highlight-text">
                    Nuestros valores no son solo palabras, son la base sobre la cual construimos una experiencia educativa transformadora que prepara a nuestros estudiantes para liderar la revolución digital.
                </p>
            </div>
        </section>
    </div>

    <script>
        function showPanel(panelId) {
            // Hide all panels
            const panels = document.querySelectorAll('.content-panel');
            panels.forEach(panel => {
                panel.classList.remove('active');
            });
            
            // Remove active class from all tabs
            const tabs = document.querySelectorAll('.nav-tab');
            tabs.forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Show selected panel
            document.getElementById(panelId).classList.add('active');
            
            // Add active class to clicked tab
            event.target.classList.add('active');
        }

        // Scroll animations optimized for mobile
        function animateOnScroll() {
            const elements = document.querySelectorAll('.scroll-animate');
            const windowHeight = window.innerHeight;
            
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const triggerPoint = window.innerWidth <= 768 ? windowHeight - 50 : windowHeight - 100;
                
                if (elementTop < triggerPoint) {
                    element.classList.add('visible');
                }
            });
        }

        // Throttle scroll events for better performance on mobile
        let ticking = false;
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(animateOnScroll);
                ticking = true;
            }
        }

        window.addEventListener('scroll', () => {
            requestTick();
            ticking = false;
        });

        // Run animation on page load
        document.addEventListener('DOMContentLoaded', animateOnScroll);
    </script>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>