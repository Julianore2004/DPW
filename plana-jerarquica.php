<?php require_once 'config/functions.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plana Jerárquica - Programa de Diseño y Programación Web</title>
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
            margin-top: 90PX;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 20px;
            margin-bottom: 20px;
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

        .hierarchy-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 40px;
            margin-top: 60px;
        }

        .hierarchy-level {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            width: 100%;
            position: relative;
        }

        .person-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
            min-width: 320px;
            max-width: 380px;
            position: relative;
            overflow: hidden;
        }

        .person-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .person-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(45deg, #667eea, #764ba2);
        }

        .person-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8em;
            color: white;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .person-card:hover .person-avatar {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .person-name {
            font-size: 1.3em;
            margin-bottom: 10px;
            font-weight: 700;
            color: #2c3e50;
            line-height: 1.3;
        }

        .person-card:hover .person-name {
            color: white;
        }

        .person-position {
            font-size: 1em;
            margin-bottom: 20px;
            color: #667eea;
            font-weight: 600;
        }

        .person-card:hover .person-position {
            color: rgba(255, 255, 255, 0.9);
        }

        .person-details {
            text-align: left;
            margin-top: 20px;
        }

        .contact-info {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            padding: 8px 0;
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
        }

        .person-card:hover .contact-info {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .contact-icon {
            font-size: 1.2em;
            margin-right: 15px;
            color: #667eea;
            min-width: 20px;
        }

        .person-card:hover .contact-icon {
            color: white;
        }

        .contact-text {
            font-size: 0.9em;
            color: #555;
            font-weight: 500;
        }

        .person-card:hover .contact-text {
            color: rgba(255, 255, 255, 0.9);
        }

        .level-coordinator {
            border-left: 5px solid #667eea;
            min-width: 400px;
        }

        .level-professor {
            border-left: 5px solid #764ba2;
        }

        .connection-line {
            width: 2px;
            height: 30px;
            background: linear-gradient(to bottom, #667eea, #764ba2);
            margin: 0 auto;
            border-radius: 1px;
        }

        .organizational-chart {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 60px;
            margin: 60px 0;
            border-radius: 20px;
        }

        .chart-title {
            font-size: 2.2em;
            margin-bottom: 30px;
            color: #2c3e50;
            text-align: center;
        }

        .chart-description {
            font-size: 1.1em;
            line-height: 1.6;
            color: #555;
            text-align: center;
            margin-bottom: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .roles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .role-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-left: 5px solid #667eea;
        }

        .role-card:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .role-title {
            font-size: 1.3em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .role-description {
            font-size: 1em;
            line-height: 1.6;
            color: #555;
            margin-bottom: 15px;
        }

        .role-responsibilities {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
        }

        .role-responsibilities h5 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 1em;
        }

        .role-responsibilities ul {
            list-style: none;
            padding-left: 0;
        }

        .role-responsibilities li {
            padding: 3px 0;
            position: relative;
            padding-left: 20px;
        }

        .role-responsibilities li::before {
            content: '▶';
            position: absolute;
            left: 0;
            color: #667eea;
            font-size: 0.8em;
        }

         /* Estilos adicionales para mejorar la responsividad en móviles */
    @media (max-width: 768px) {
        

        .container {
            margin: 5px;
            border-radius: 10px;
        }

        .hero-section {
            padding: 40px 20px;
        }

        .hero-title {
            font-size: 2em;
        }

        .hero-subtitle {
            font-size: 1em;
        }

        .content-section {
            padding: 30px 15px;
        }

        .section-title {
            font-size: 1.8em;
        }

        .hierarchy-container {
            gap: 20px;
        }

        .hierarchy-level {
            flex-direction: column;
            align-items: center;
        }

        .person-card {
            min-width: 100%;
            max-width: 100%;
            margin-bottom: 15px;
        }

        .person-avatar {
            width: 70px;
            height: 70px;
            font-size: 1.5em;
        }

        .person-name {
            font-size: 1.1em;
        }

        .person-position {
            font-size: 0.9em;
        }

        .organizational-chart {
            padding: 30px 15px;
        }

        .chart-title {
            font-size: 1.5em;
        }

        .chart-description {
            font-size: 1em;
        }

        .roles-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .role-card {
            padding: 20px;
        }

        .role-title {
            font-size: 1.1em;
        }

        .role-description {
            font-size: 0.9em;
        }
    }

    /* Estilos para pantallas muy pequeñas */
    @media (max-width: 480px) {
        .hero-title {
            font-size: 1.5em;
        }

        .hero-subtitle {
            font-size: 0.9em;
        }

        .section-title {
            font-size: 1.5em;
        }

        .person-name {
            font-size: 1em;
        }

        .person-position {
            font-size: 0.8em;
        }

        .chart-title {
            font-size: 1.3em;
        }

        .chart-description {
            font-size: 0.9em;
        }

        .role-title {
            font-size: 1em;
        }

        .role-description {
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

        .stagger-animation {
            animation-delay: 0.2s;
        }

        .stagger-animation:nth-child(2) {
            animation-delay: 0.4s;
        }

        .stagger-animation:nth-child(3) {
            animation-delay: 0.6s;
        }

        .stagger-animation:nth-child(4) {
            animation-delay: 0.8s;
        }

        .stagger-animation:nth-child(5) {
            animation-delay: 1s;
        }
    </style>
</head>
<body>

 <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <section class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">Plana Jerárquica</h1>
                <p class="hero-subtitle">Conoce al equipo directivo del Programa de Estudios de Diseño y Programación Web, profesionales comprometidos con la excelencia académica y el desarrollo integral de nuestros estudiantes.</p>
            </div>
        </section>

        <section class="content-section">
            <h2 class="section-title">Estructura Organizacional</h2>
            
            <div class="hierarchy-container">
                <!-- Nivel 1: Coordinador del Programa -->
                <div class="hierarchy-level">
                    <div class="person-card level-coordinator scroll-animate fade-in-up">
                        <div class="person-avatar">JT</div>
                        <h2 class="person-name">Ing. Juan Carlos Torres Lozano</h2>
                        <h3 class="person-position">Coordinador del Área Académica de Diseño y Programación Web</h3>
                        
                        <div class="person-details">
                            <div class="contact-info">
                                <span class="contact-icon">📧</span>
                                <span class="contact-text">jctorreslozano@gmail.com</span>
                            </div>
                            <div class="contact-info">
                                <span class="contact-icon">📱</span>
                                <span class="contact-text">935 627 200</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="connection-line"></div>

                <!-- Nivel 2: Equipo Docente -->
                <div class="hierarchy-level">
                    <div class="person-card level-professor scroll-animate stagger-animation">
                        <div class="person-avatar">AM</div>
                        <h2 class="person-name">Lic. Alfonso Álvaro Moreno Márquez</h2>
                        <h3 class="person-position">Profesor del Programa</h3>
                        
                    
                    </div>

                    <div class="person-card level-professor scroll-animate stagger-animation">
                        <div class="person-avatar">KB</div>
                        <h2 class="person-name">Tec. Kevin Vlaes Bando Gómez</h2>
                        <h3 class="person-position">Profesor del Programa</h3>
                        
                        
                    </div>

                    <div class="person-card level-professor scroll-animate stagger-animation">
                        <div class="person-avatar">AY</div>
                        <h2 class="person-name">Tec. Aníbal Yucra Curo</h2>
                        <h3 class="person-position">Profesor del Programa</h3>
                        
                     
                    </div>

                    <div class="person-card level-professor scroll-animate stagger-animation">
                        <div class="person-avatar">JL</div>
                        <h2 class="person-name">Lic. Jorge Luis Jara Díaz</h2>
                        <h3 class="person-position">Profesor del Programa</h3>
                        
                        
                    </div>
                     <div class="person-card level-professor scroll-animate stagger-animation">
                        <div class="person-avatar">CA</div>
                        <h2 class="person-name">Ing. Cristhian Alegría Ñaccha</h2>
                        <h3 class="person-position">Profesor del Programa</h3>
                        
                        
                    </div>
                </div>
            </div>
        </section>

        <section class="organizational-chart scroll-animate">
            <h2 class="chart-title">Roles y Responsabilidades</h2>
            <p class="chart-description">
                La estructura jerárquica del programa está diseñada para garantizar una gestión eficiente y un acompañamiento integral a los estudiantes a lo largo de su formación académica y profesional.
            </p>

            <div class="roles-grid">
                <div class="role-card">
                    <div class="role-title">Coordinador del Programa</div>
                    <div class="role-description">
                        Responsable de la dirección académica, planificación curricular y supervisión general del programa de estudios.
                    </div>
                    <div class="role-responsibilities">
                        <h5>Responsabilidades principales:</h5>
                        <ul>
                            <li>Planificación y supervisión académica</li>
                            <li>Coordinación con el equipo docente</li>
                            <li>Evaluación y mejora continua del programa</li>
                            <li>Gestión de recursos académicos</li>
                            <li>Seguimiento del desempeño estudiantil</li>
                        </ul>
                    </div>
                </div>

                <div class="role-card">
                    <div class="role-title">Equipo Docente</div>
                    <div class="role-description">
                        Profesionales especializados en las diferentes áreas del diseño y programación web, comprometidos con la excelencia educativa.
                    </div>
                    <div class="role-responsibilities">
                        <h5>Funciones principales:</h5>
                        <ul>
                            <li>Impartir clases teóricas y prácticas</li>
                            <li>Evaluación del aprendizaje estudiantil</li>
                            <li>Tutoría académica personalizada</li>
                            <li>Desarrollo de proyectos estudiantiles</li>
                            <li>Actualización continua de conocimientos</li>
                        </ul>
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
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.scroll-animate').forEach(el => {
            observer.observe(el);
        });

        // Add smooth hover effects
        document.querySelectorAll('.person-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add click animation for person cards
        document.querySelectorAll('.person-card').forEach(card => {
            card.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.background = 'rgba(255,255,255,0.6)';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'ripple 0.6s linear';
                ripple.style.left = (e.clientX - e.target.getBoundingClientRect().left) + 'px';
                ripple.style.top = (e.clientY - e.target.getBoundingClientRect().top) + 'px';
                ripple.style.width = '20px';
                ripple.style.height = '20px';
                ripple.style.pointerEvents = 'none';
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add ripple animation keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
<!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>