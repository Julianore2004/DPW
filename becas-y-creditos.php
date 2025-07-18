<?php require_once 'config/functions.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Becas y Créditos - Programa de Diseño y Programación Web</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .program-info {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 50px;
            border-radius: 20px;
            margin: 40px 0;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .program-title {
            font-size: 2.2em;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .program-subtitle {
            font-size: 1.4em;
            color: #667eea;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .description-text {
            font-size: 1.1em;
            line-height: 1.8;
            color: #555;
            margin-bottom: 40px;
            text-align: justify;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .students-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
            margin-top: 60px;
        }

        .students-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            width: 100%;
            max-width: 1200px;
        }

        .student-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
            position: relative;
            overflow: hidden;
        }

        .student-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .student-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(45deg, #667eea, #764ba2);
        }

        .student-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2em;
            color: white;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .student-card:hover .student-avatar {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .student-name {
            font-size: 1.4em;
            margin-bottom: 15px;
            font-weight: 700;
            color: #2c3e50;
            line-height: 1.3;
        }

        .student-card:hover .student-name {
            color: white;
        }

        .student-semester {
            font-size: 1.2em;
            margin-bottom: 15px;
            color: #667eea;
            font-weight: 600;
        }

        .student-card:hover .student-semester {
            color: rgba(255, 255, 255, 0.9);
        }

        .achievement-badge {
            background: linear-gradient(45deg, #ffd700, #ffed4e);
            color: #2c3e50;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 1em;
            margin-top: 20px;
            display: inline-block;
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }

        .student-card:hover .achievement-badge {
            background: linear-gradient(45deg, #fff, #f0f0f0);
            color: #2c3e50;
        }

        .period-badge {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            padding: 8px 20px;
            border-radius: 15px;
            font-weight: 600;
            font-size: 0.9em;
            margin-top: 10px;
            display: inline-block;
        }

        .student-card:hover .period-badge {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .scholarship-info {
            background: linear-gradient(135deg, #e8f5e8 0%, #f0f8f0 100%);
            padding: 40px;
            border-radius: 20px;
            margin: 40px 0;
            border-left: 5px solid #48bb78;
        }

        .scholarship-title {
            font-size: 1.8em;
            color: #2d5a2d;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }

        .scholarship-details {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .scholarship-item {
            text-align: center;
            flex: 1;
            min-width: 200px;
        }

        .scholarship-icon {
            font-size: 3em;
            margin-bottom: 15px;
            color: #48bb78;
        }

        .scholarship-label {
            font-size: 1.2em;
            font-weight: 600;
            color: #2d5a2d;
            margin-bottom: 10px;
        }

        .scholarship-value {
            font-size: 2em;
            font-weight: 700;
            color: #48bb78;
        }

        .requirements-section {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            padding: 40px;
            border-radius: 20px;
            margin: 40px 0;
            border-left: 5px solid #f39c12;
        }

        .requirements-title {
            font-size: 1.8em;
            color: #8b4513;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }

        .requirements-list {
            list-style: none;
            padding: 0;
            max-width: 700px;
            margin: 0 auto;
        }

        .requirements-list li {
            padding: 15px 0;
            position: relative;
            padding-left: 40px;
            font-size: 1.1em;
            color: #5a4a2a;
            border-bottom: 1px solid rgba(139, 69, 19, 0.1);
        }

        .requirements-list li::before {
            content: '\f00c';
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            color: #f39c12;
            font-size: 1.3em;
            top: 10px;
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
            font-size: 1.5em;
        }

        .program-info {
            padding: 20px;
        }

        .program-title {
            font-size: 1.5em;
        }

        .program-subtitle {
            font-size: 1.1em;
        }

        .description-text {
            font-size: 0.9em;
        }

        .students-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .student-card {
            padding: 20px;
        }

        .student-name {
            font-size: 1.1em;
        }

        .student-semester {
            font-size: 1em;
        }

        .scholarship-details {
            flex-direction: column;
            gap: 15px;
        }

        .scholarship-item {
            margin-bottom: 15px;
        }

        .scholarship-icon {
            font-size: 2em;
        }

        .scholarship-label {
            font-size: 1em;
        }

        .scholarship-value {
            font-size: 1.5em;
        }

        .requirements-list li {
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
            font-size: 1.3em;
        }

        .program-title {
            font-size: 1.3em;
        }

        .program-subtitle {
            font-size: 1em;
        }

        .description-text {
            font-size: 0.8em;
        }

        .student-name {
            font-size: 1em;
        }

        .student-semester {
            font-size: 0.9em;
        }

        .scholarship-label {
            font-size: 0.9em;
        }

        .scholarship-value {
            font-size: 1.3em;
        }

        .requirements-list li {
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
    </style>
</head>
<body>

 <!-- Header -->
    <?php include 'includes/header.php'; ?>

  </div>
    <div class="container">
        <section class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">Becas y Créditos</h1>
                <p class="hero-subtitle">Reconocimiento a la excelencia académica y compromiso con el desarrollo estudiantil</p>
            </div>
        </section>

        <section class="content-section">
            <div class="program-info scroll-animate fade-in-up">
                <h2 class="program-title">DISEÑO Y PROGRAMACIÓN WEB</h2>
                <h3 class="program-subtitle">Estudiantes becados por primeros puestos</h3>
                
                <p class="description-text">
                    En reconocimiento al esfuerzo, dedicación y sobresaliente desempeño académico, tenemos el placer de anunciar una iniciativa especial dirigida a nuestros estudiantes más destacados. Para aquellos que han alcanzado el primer puesto en los semestres II, IV y VI, durante el periodo lectivo 2024-II, se otorga becas del 50% de descuento en la matrícula para el próximo periodo académico.
                </p>
                
                <p class="description-text">
                    Esta beca es una muestra de nuestro compromiso con la excelencia educativa y nuestro deseo de apoyar a los estudiantes que, con su esfuerzo y dedicación, se han distinguido académicamente. Queremos que este reconocimiento sirva como un impulso para continuar persiguiendo sus metas con el mismo ímpetu y dedicación.
                </p>
            </div>

            <div class="scholarship-info scroll-animate">
                <h3 class="scholarship-title">Beneficios de la Beca</h3>
                <div class="scholarship-details">
                    <div class="scholarship-item">
                        <div class="scholarship-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="scholarship-label">Descuento en Matrícula</div>
                        <div class="scholarship-value">50%</div>
                    </div>
                    <div class="scholarship-item">
                        <div class="scholarship-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="scholarship-label">Periodo Académico</div>
                        <div class="scholarship-value">2025-I</div>
                    </div>
                    <div class="scholarship-item">
                        <div class="scholarship-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="scholarship-label">Estudiantes Beneficiados</div>
                        <div class="scholarship-value">3</div>
                    </div>
                </div>
            </div>

            <div class="students-container">
                <h2 class="section-title">Estudiantes Destacados</h2>
                
                <div class="students-grid">
                    <div class="student-card scroll-animate stagger-animation">
                        <div class="student-avatar">RP</div>
                        <h2 class="student-name">Roy Antony Lamilla Pariona</h2>
                        <h3 class="student-semester">Semestre II</h3>
                        <div class="period-badge">Periodo 2024-II</div>
                        <div class="achievement-badge">
                            <i class="fas fa-medal"></i> Primer Puesto
                        </div>
                    </div>

                    <div class="student-card scroll-animate stagger-animation">
                        <div class="student-avatar">AV</div>
                        <h2 class="student-name">Alexis Gabriel Valdivia Trucios</h2>
                        <h3 class="student-semester">Semestre IV</h3>
                        <div class="period-badge">Periodo 2024-II</div>
                        <div class="achievement-badge">
                            <i class="fas fa-medal"></i> Primer Puesto
                        </div>
                    </div>

                    <div class="student-card scroll-animate stagger-animation">
                        <div class="student-avatar">LI</div>
                        <h2 class="student-name">Luis Fernando Ignacio Quispe</h2>
                        <h3 class="student-semester">Semestre VI</h3>
                        <div class="period-badge">Periodo 2024-II</div>
                        <div class="achievement-badge">
                            <i class="fas fa-medal"></i> Primer Puesto
                        </div>
                    </div>
                </div>
            </div>

            <div class="requirements-section scroll-animate">
                <h3 class="requirements-title">Requisitos para Mantener la Beca</h3>
                <ul class="requirements-list">
                    <li>Mantener un promedio académico superior a 16.0 puntos</li>
                    <li>No tener ningún curso desaprobado durante el semestre</li>
                    <li>Participar activamente en las actividades académicas del programa</li>
                    <li>Cumplir con las normas y reglamentos institucionales</li>
                    <li>Presentar la documentación requerida en los plazos establecidos</li>
                </ul>
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
        document.querySelectorAll('.student-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add click animation for student cards
        document.querySelectorAll('.student-card').forEach(card => {
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

        // Add floating animation to achievement badges
        document.querySelectorAll('.achievement-badge').forEach(badge => {
            badge.addEventListener('mouseenter', function() {
                this.style.animation = 'float 1s ease-in-out infinite';
            });
            
            badge.addEventListener('mouseleave', function() {
                this.style.animation = 'none';
            });
        });

        // Add float animation keyframes
        const floatStyle = document.createElement('style');
        floatStyle.textContent = `
            @keyframes float {
                0%, 100% {
                    transform: translateY(0);
                }
                50% {
                    transform: translateY(-10px);
                }
            }
        `;
        document.head.appendChild(floatStyle);
    </script>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>