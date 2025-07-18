<?php require_once 'config/functions.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUPA - Programa de Diseño y Programación Web</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

        .intro-text {
            font-size: 1.2em;
            line-height: 1.8;
            color: #555;
            margin-bottom: 50px;
            text-align: center;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .tupa-info-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 60px;
            margin: 60px 0;
            border-radius: 20px;
            text-align: center;
        }

        .tupa-logo {
            font-size: 4em;
            margin-bottom: 30px;
            color: #667eea;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .tupa-title {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #2c3e50;
            font-weight: 700;
        }

        .tupa-subtitle {
            font-size: 1.1em;
            color: #666;
            margin-bottom: 30px;
            font-style: italic;
        }

        .tupa-description {
            font-size: 1.2em;
            line-height: 1.8;
            color: #555;
            margin-bottom: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 60px 0;
        }

        .feature-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            font-size: 3em;
            margin-bottom: 20px;
            display: block;
            color: #667eea;
        }

        .feature-title {
            font-size: 1.5em;
            margin-bottom: 15px;
            font-weight: 600;
            color: #2c3e50;
        }

        .feature-description {
            font-size: 1em;
            line-height: 1.6;
            color: #666;
        }

        .benefits-section {
            padding: 60px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            border-radius: 20px;
            margin: 60px 0;
        }

        .benefits-title {
            font-size: 2.2em;
            margin-bottom: 30px;
            color: #2c3e50;
            text-align: center;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .benefit-item {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-align: center;
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .benefit-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .benefit-icon {
            font-size: 2.5em;
            margin-bottom: 15px;
            color: #667eea;
        }

        .benefit-text {
            font-size: 1.1em;
            color: #555;
            font-weight: 500;
        }

        .cta-section {
            padding: 80px 60px;
            text-align: center;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-radius: 20px;
            margin: 60px 0;
        }

        .cta-title {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #2c3e50;
            font-weight: 700;
        }

        .cta-text {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.8;
        }

        .tupa-button {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 20px 50px;
            font-size: 1.3em;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 1px;
            border: none;
            cursor: pointer;
        }

        .tupa-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            background: linear-gradient(45deg, #5a67d8, #6b46c1);
        }

        .tupa-button:active {
            transform: translateY(-2px);
        }

        .button-icon {
            font-size: 1.2em;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .info-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin: 60px 0;
        }

        .info-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
        }

        .info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .info-card-title {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #2c3e50;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-card-icon {
            color: #667eea;
            font-size: 1.2em;
        }

        .info-card-text {
            font-size: 1.1em;
            line-height: 1.6;
            color: #555;
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

        .intro-text {
            font-size: 1em;
        }

        .tupa-info-section {
            padding: 20px;
        }

        .tupa-title {
            font-size: 1.5em;
        }

        .tupa-subtitle {
            font-size: 1em;
        }

        .tupa-description {
            font-size: 0.9em;
        }

        .features-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .feature-card {
            padding: 20px;
        }

        .feature-title {
            font-size: 1.1em;
        }

        .feature-description {
            font-size: 0.9em;
        }

        .benefits-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .benefit-item {
            padding: 20px;
        }

        .benefit-text {
            font-size: 0.9em;
        }

        .cta-section {
            padding: 30px 15px;
        }

        .cta-title {
            font-size: 1.5em;
        }

        .cta-text {
            font-size: 1em;
        }

        .tupa-button {
            padding: 10px 25px;
            font-size: 1em;
        }

        .info-cards {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .info-card {
            padding: 20px;
        }

        .info-card-title {
            font-size: 1.1em;
        }

        .info-card-text {
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

        .intro-text {
            font-size: 0.9em;
        }

        .tupa-title {
            font-size: 1.3em;
        }

        .tupa-subtitle {
            font-size: 0.9em;
        }

        .tupa-description {
            font-size: 0.8em;
        }

        .feature-title {
            font-size: 1em;
        }

        .feature-description {
            font-size: 0.8em;
        }

        .benefit-text {
            font-size: 0.8em;
        }

        .cta-title {
            font-size: 1.3em;
        }

        .cta-text {
            font-size: 0.9em;
        }

        .tupa-button {
            padding: 8px 20px;
            font-size: 0.9em;
        }

        .info-card-title {
            font-size: 1em;
        }

        .info-card-text {
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
            animation: fadeInUp 0.1s ease-out;
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
    </style>
</head>
<body>

 <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <section class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">TUPA</h1>
                <p class="hero-subtitle">Texto Único de Procedimientos Administrativos</p>
            </div>
        </section>
        
        <section class="content-section">
            <h2 class="section-title fade-in-up">TUPA</h2>
            <p class="intro-text fade-in-up">
                En el programa de estudios de diseño y programación web, nos esforzamos por brindar transparencia y eficiencia en nuestros procesos administrativos. Por eso, te invitamos a conocer nuestro TUPA, un documento que detalla los procedimientos que seguimos para ofrecerte un servicio de calidad.
            </p>
        </section>
        
        <section class="cta-section scroll-animate">
            <h2 class="cta-title">Consulta Nuestro TUPA</h2>
            <p class="cta-text">
                Accede al documento completo del TUPA para conocer todos los procedimientos administrativos disponibles. Mantente informado sobre requisitos, plazos y costos de cada trámite.
            </p>
            <button class="tupa-button" onclick="openExternalLink('https://iestphuanta.edu.pe/wp-content/uploads/2025/04/TUPA.pdf')">
                <i class="fas fa-file-alt button-icon"></i>
                Ver TUPA Completo
            </button>
        </section>
        
        <section class="benefits-section scroll-animate">
            <h2 class="benefits-title">Beneficios del TUPA</h2>
            <div class="benefits-grid">
                <div class="benefit-item">
                    <i class="fas fa-check-circle benefit-icon"></i>
                    <p class="benefit-text">Procedimientos claros y definidos</p>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-clock benefit-icon"></i>
                    <p class="benefit-text">Plazos específicos de atención</p>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-dollar-sign benefit-icon"></i>
                    <p class="benefit-text">Costos transparentes</p>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-list-check benefit-icon"></i>
                    <p class="benefit-text">Requisitos detallados</p>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-bullseye benefit-icon"></i>
                    <p class="benefit-text">Procesos estandarizados</p>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-sync-alt benefit-icon"></i>
                    <p class="benefit-text">Actualizaciones constantes</p>
                </div>
            </div>
        </section>

        <section class="info-cards scroll-animate">
            <div class="info-card">
                <h3 class="info-card-title">
                    <i class="fas fa-book-open info-card-icon"></i>
                    ¿Qué encontrarás en el TUPA?
                </h3>
                <p class="info-card-text">
                    El TUPA contiene información detallada sobre todos los procedimientos administrativos del programa, incluyendo matrículas, certificaciones, constancias, y otros trámites estudiantiles.
                </p>
            </div>

            <div class="info-card">
                <h3 class="info-card-title">
                    <i class="fas fa-graduation-cap info-card-icon"></i>
                    Para Estudiantes
                </h3>
                <p class="info-card-text">
                    Encuentra información sobre todos los trámites que puedes realizar como estudiante, desde inscripciones hasta certificaciones de estudios y constancias académicas.
                </p>
            </div>

            <div class="info-card">
                <h3 class="info-card-title">
                    <i class="fas fa-users info-card-icon"></i>
                    Transparencia Institucional
                </h3>
                <p class="info-card-text">
                    Nuestro compromiso con la transparencia se refleja en la publicación de todos nuestros procedimientos administrativos de manera clara y accesible.
                </p>
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

        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.feature-card, .info-card, .benefit-item');
            
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });

        // Function to open external links
        function openExternalLink(url) {
            if (url === '#') {
                alert('Este enlace estará disponible próximamente. Por favor, contacta a la administración para más información.');
                return;
            }
            window.open(url, '_blank', 'noopener,noreferrer');
        }
    </script>
    
<!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>