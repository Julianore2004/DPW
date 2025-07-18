<?php require_once 'config/functions.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plana Docente - Programa de Diseño y Programación Web</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
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

        .header {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9));
            color: white;
            padding: 60px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="0,0 1000,100 1000,0"/></svg>');
            background-size: cover;
        }

        .header-content {
            position: relative;
            z-index: 1;
        }

        .header-title {
            font-size: 2.8em;
            margin-bottom: 15px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header-subtitle {
            font-size: 1.2em;
            opacity: 0.9;
        }

        .content-section {
            padding: 60px 40px;
        }

        .section-title {
            font-size: 2.2em;
            margin-bottom: 40px;
            color: #2c3e50;
            text-align: center;
            position: relative;
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

        .faculty-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .faculty-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
            position: relative;
            overflow: hidden;
        }

        .faculty-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .faculty-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }

        .faculty-card:hover::before {
            transform: translateY(0);
        }

        .faculty-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .faculty-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8em;
            color: white;
            font-weight: bold;
            margin-right: 20px;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
            flex-shrink: 0;
        }

        .faculty-info {
            flex: 1;
            min-width: 0;
        }

        .faculty-name {
            font-size: 1.3em;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
            word-wrap: break-word;
        }

        .faculty-period {
            font-size: 0.9em;
            color: #666;
            background: rgba(102, 126, 234, 0.1);
            padding: 5px 12px;
            border-radius: 15px;
            display: inline-block;
        }

        .subjects-section {
            margin-bottom: 25px;
        }

        .subjects-title {
            font-size: 1.1em;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .subjects-title i {
            margin-right: 10px;
            font-size: 1.2em;
            color: #667eea;
        }

        .subjects-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .subject-tag {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 500;
            box-shadow: 0 3px 10px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
            word-break: break-word;
        }

        .subject-tag:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .cv-section {
            text-align: center;
        }

        .cv-button {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 0.9em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
        }

        .cv-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .cv-button i {
            font-size: 1.1em;
        }

        .stats-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 50px 40px;
            margin-top: 60px;
            border-radius: 20px;
            text-align: center;
        }

        .stats-title {
            font-size: 2em;
            margin-bottom: 30px;
            color: #2c3e50;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .stats-title i {
            color: #667eea;
            font-size: 1.2em;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .stat-item {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            font-size: 2em;
            color: #667eea;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 2.5em;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1.1em;
            color: #666;
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .hero-title i {
            font-size: 0.8em;
        }

        .hero-subtitle {
            font-size: 1.4em;
            margin-bottom: 30px;
            opacity: 0.9;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        /* Responsive Design - Tablet */
        @media (max-width: 1024px) {
            .faculty-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 25px;
            }
            
            .hero-title {
                font-size: 3em;
            }
            
            .hero-subtitle {
                font-size: 1.2em;
            }
        }

        /* Responsive Design - Mobile */
        @media (max-width: 768px) {
            
            
            .container {
                margin: 10px;
                border-radius: 15px;
            }
            
            .faculty-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .faculty-card {
                padding: 20px;
                border-radius: 15px;
            }

            .faculty-header {
                flex-direction: column;
                text-align: center;
                margin-bottom: 20px;
            }

            .faculty-avatar {
                margin-right: 0;
                margin-bottom: 15px;
                width: 60px;
                height: 60px;
                font-size: 1.5em;
            }

            .faculty-name {
                font-size: 1.2em;
                text-align: center;
            }

            .faculty-period {
                font-size: 0.8em;
                padding: 4px 10px;
            }

            .subjects-title {
                font-size: 1em;
                justify-content: center;
            }

            .subjects-list {
                justify-content: center;
            }

            .subject-tag {
                font-size: 0.75em;
                padding: 6px 12px;
            }

            .cv-button {
                padding: 10px 20px;
                font-size: 0.8em;
            }

            .hero-section {
                padding: 50px 30px;
            }

            .hero-title {
                font-size: 2.2em;
                flex-direction: column;
                gap: 15px;
            }

            .hero-subtitle {
                font-size: 1em;
            }

            .header {
                padding: 40px 20px;
            }

            .header-title {
                font-size: 2.2em;
            }

            .header-subtitle {
                font-size: 1em;
            }

            .content-section {
                padding: 40px 20px;
            }

            .section-title {
                font-size: 1.8em;
                margin-bottom: 30px;
            }

            .stats-section {
                padding: 40px 20px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .stats-title {
                font-size: 1.6em;
                flex-direction: column;
                gap: 10px;
            }

            .stat-item {
                padding: 20px;
            }

            .stat-number {
                font-size: 2em;
            }

            .stat-label {
                font-size: 0.9em;
            }
        }

        /* Responsive Design - Small Mobile */
        @media (max-width: 480px) {
            .container {
                margin: 5px;
                border-radius: 10px;
            }
            
            .faculty-card {
                padding: 15px;
            }
            
            .hero-section {
                padding: 40px 20px;
            }
            
            .hero-title {
                font-size: 1.8em;
            }
            
            .hero-subtitle {
                font-size: 0.9em;
            }
            
            .section-title {
                font-size: 1.5em;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .faculty-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .subject-tag {
                font-size: 0.7em;
                padding: 5px 10px;
            }
            
            .cv-button {
                padding: 8px 16px;
                font-size: 0.75em;
            }
        }

        /* Responsive Design - Extra Small Mobile */
        @media (max-width: 320px) {
            .hero-title {
                font-size: 1.5em;
            }
            
            .hero-subtitle {
                font-size: 0.8em;
            }
            
            .section-title {
                font-size: 1.3em;
            }
            
            .faculty-name {
                font-size: 1.1em;
            }
            
            .stats-title {
                font-size: 1.4em;
            }
            
            .stat-number {
                font-size: 1.8em;
            }
            
            .stat-label {
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

        /* Touch-friendly improvements */
        @media (hover: none) {
            .faculty-card:hover {
                transform: none;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }
            
            .subject-tag:hover {
                transform: none;
                box-shadow: 0 3px 10px rgba(102, 126, 234, 0.3);
            }
            
            .cv-button:hover {
                transform: none;
                box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
            }
            
            .stat-item:hover {
                transform: none;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
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
                <h1 class="hero-title">
                    <i class="fas fa-chalkboard-teacher"></i>
                    Plana Docente
                </h1>
                <p class="hero-subtitle">Programa de Estudios de Diseño y Programación Web</p>
            </div>
        </section>
       
        <section class="content-section">
            <h2 class="section-title fade-in-up">Nuestros Docentes</h2>
            
            <div class="faculty-grid">
                <div class="faculty-card scroll-animate">
                    <div class="faculty-header">
                        <div class="faculty-avatar">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="faculty-info">
                            <h3 class="faculty-name">Alfonso Álvaro Moreno Márquez</h3>
                            <span class="faculty-period">Período Lectivo 2025-I</span>
                        </div>
                    </div>
                    
                    <div class="subjects-section">
                        <h4 class="subjects-title">
                            <i class="fas fa-book-open"></i>
                            Unidades Didácticas
                        </h4>
                        <div class="subjects-list">
                            <span class="subject-tag">Marketing digital</span>
                        </div>
                    </div>
                    
                    <div class="cv-section">
                        <a href="https://drive.google.com/file/d/1I_gwXck8319NNl5ffXT5QN5Z5kV2DFQt/view" class="cv-button">
                            <i class="fas fa-eye"></i>
                            Ver Hoja de Vida
                        </a>
                    </div>
                </div>

                <div class="faculty-card scroll-animate">
                    <div class="faculty-header">
                        <div class="faculty-avatar">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="faculty-info">
                            <h3 class="faculty-name">Juan Carlos Torres Lozano</h3>
                            <span class="faculty-period">Período Lectivo 2025-I</span>
                        </div>
                    </div>
                    
                    <div class="subjects-section">
                        <h4 class="subjects-title">
                            <i class="fas fa-book-open"></i>
                            Unidades Didácticas
                        </h4>
                        <div class="subjects-list">
                            <span class="subject-tag">Fundamentos de Programación</span>
                            <span class="subject-tag">Pruebas de software</span>
                        </div>
                    </div>
                    
                    <div class="cv-section">
                        <a href="https://drive.google.com/file/d/1t4BfPvBK-Vby01TOQRRiUwLUJlVFreQT/view" class="cv-button">
                            <i class="fas fa-eye"></i>
                            Ver Hoja de Vida
                        </a>
                    </div>
                </div>

                <div class="faculty-card scroll-animate">
                    <div class="faculty-header">
                        <div class="faculty-avatar">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="faculty-info">
                            <h3 class="faculty-name">Kevin Vlaes Bando Gómez</h3>
                            <span class="faculty-period">Período Lectivo 2025-I</span>
                        </div>
                    </div>
                    
                    <div class="subjects-section">
                        <h4 class="subjects-title">
                            <i class="fas fa-book-open"></i>
                            Unidades Didácticas
                        </h4>
                        <div class="subjects-list">
                            <span class="subject-tag">Redes e internet</span>
                            <span class="subject-tag">Gestión y administración de sitios web</span>
                            <span class="subject-tag">Diagramación digital</span>
                        </div>
                    </div>
                    
                    <div class="cv-section">
                        <a href="https://iestphuanta.edu.pe/wp-content/uploads/2025/05/ficha-del-postulante-kvbg-user-bot.pdf" class="cv-button">
                            <i class="fas fa-eye"></i>
                            Ver Hoja de Vida
                        </a>
                    </div>
                </div>

                <div class="faculty-card scroll-animate">
                    <div class="faculty-header">
                        <div class="faculty-avatar">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="faculty-info">
                            <h3 class="faculty-name">Aníbal Yucra Curo</h3>
                            <span class="faculty-period">Período Lectivo 2025-I</span>
                        </div>
                    </div>
                    
                    <div class="subjects-section">
                        <h4 class="subjects-title">
                            <i class="fas fa-book-open"></i>
                            Unidades Didácticas
                        </h4>
                        <div class="subjects-list">
                            <span class="subject-tag">Comunicación Oral</span>
                            <span class="subject-tag">Programación de aplicaciones web</span>
                            <span class="subject-tag">Diseño de soluciones web</span>
                            <span class="subject-tag">Solución de problemas</span>
                        </div>
                    </div>
                    
                    <div class="cv-section">
                        <a href="https://drive.google.com/file/d/16PAZj0sWXq57pleAYKp4UrMt1PRL7bCC/view" class="cv-button">
                            <i class="fas fa-eye"></i>
                            Ver Hoja de Vida
                        </a>
                    </div>
                </div>

                <div class="faculty-card scroll-animate">
                    <div class="faculty-header">
                        <div class="faculty-avatar">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="faculty-info">
                            <h3 class="faculty-name">Cristhian Alegría Ñaccha</h3>
                            <span class="faculty-period">Período Lectivo 2025-I</span>
                        </div>
                    </div>
                    
                    <div class="subjects-section">
                        <h4 class="subjects-title">
                            <i class="fas fa-book-open"></i>
                            Unidades Didácticas
                        </h4>
                        <div class="subjects-list">
                            <span class="subject-tag">Análisis y diseño de sistemas</span>
                            <span class="subject-tag">Introducción de base de datos</span>
                            <span class="subject-tag">Diseño de interfaces web</span>
                        </div>
                    </div>
                    
                    <div class="cv-section">
                        <a href="https://iestphuanta.edu.pe/wp-content/uploads/2025/05/FICHA_DE_POSTULANTE_ALEGRIA_CRISTHIAN.pdf" class="cv-button">
                            <i class="fas fa-eye"></i>
                            Ver Hoja de Vida
                        </a>
                    </div>
                </div>

                <div class="faculty-card scroll-animate">
                    <div class="faculty-header">
                        <div class="faculty-avatar">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="faculty-info">
                            <h3 class="faculty-name">Lic. Jorge Luis Jara Díaz</h3>
                            <span class="faculty-period">Período Lectivo 2025-I</span>
                        </div>
                    </div>
                    
                    <div class="subjects-section">
                        <h4 class="subjects-title">
                            <i class="fas fa-book-open"></i>
                            Unidades Didácticas
                        </h4>
                        <div class="subjects-list">
                            <span class="subject-tag">Arquitectura de computadoras</span>
                            <span class="subject-tag">Administración de base de datos</span>
                            <span class="subject-tag">Programación de aplicaciones móviles</span>
                        </div>
                    </div>
                    
                    <div class="cv-section">
                        <a href="https://iestphuanta.edu.pe/wp-content/uploads/2025/05/FICHA_DE_POSTULANTE_JARA_JORGE.pdf" class="cv-button">
                            <i class="fas fa-eye"></i>
                            Ver Hoja de Vida
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="stats-section scroll-animate">
            <h2 class="stats-title">
                <i class="fas fa-chart-bar"></i>
                Estadísticas de Nuestra Plana Docente
            </h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="stat-number">6</div>
                    <div class="stat-label">Docentes Especializados</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="stat-number">16</div>
                    <div class="stat-label">Materias Impartidas</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Profesionales Activos</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="stat-number">2025-I</div>
                    <div class="stat-label">Período Actual</div>
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

        // Counter animation for statistics
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');
            counters.forEach(counter => {
                const text = counter.textContent;
                const target = parseInt(text.replace(/[^0-9]/g, ''));
                const suffix = text.replace(/[0-9]/g, '');
                
                if (target > 0) {
                    let count = 0;
                    const increment = target / 50;
                    
                    const updateCounter = () => {
                        if (count < target) {
                            count += increment;
                            counter.textContent = Math.ceil(count) + suffix;
                            setTimeout(updateCounter, 30);
                        } else {
                            counter.textContent = target + suffix;
                        }
                    };
                    
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                updateCounter();
                                observer.unobserve(entry.target);
                            }
                        });
                    });
                    observer.observe(counter);
                }
            });
        }

        // Initialize counter animation
        animateCounters();

        // Smooth scrolling for better mobile experience
        document.documentElement.style.scrollBehavior = 'smooth';

        // Add touch event handlers for better mobile interaction
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.faculty-card');
            
            cards.forEach(card => {
                card.addEventListener('touchstart', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('touchend', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
    
    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>