<?php require_once 'config/functions.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Complementarios - IESTP Huanta</title>
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

        .library-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 60px;
            margin: 60px 0;
            border-radius: 20px;
            text-align: center;
        }

        .library-title {
            font-size: 2.2em;
            margin-bottom: 30px;
            color: #2c3e50;
            position: relative;
            display: inline-block;
        }

        .library-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .library-description {
            font-size: 1.1em;
            line-height: 1.8;
            color: #555;
            max-width: 900px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }

        .service-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: left;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(45deg, #667eea, #764ba2);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .service-number {
            font-size: 3em;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .service-title {
            font-size: 1.8em;
            margin-bottom: 20px;
            font-weight: 600;
            color: #2c3e50;
        }

        .service-description {
            font-size: 1.1em;
            line-height: 1.7;
            color: #666;
        }

        .service-icon {
            font-size: 3em;
            margin-bottom: 20px;
            display: block;
            text-align: center;
            color: #667eea;
        }

        .library-icon {
            font-size: 2em;
            margin-right: 15px;
            color: #667eea;
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

        .library-section {
            padding: 20px;
        }

        .library-title {
            font-size: 1.5em;
        }

        .library-description {
            font-size: 0.9em;
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .service-card {
            padding: 20px;
        }

        .service-number {
            font-size: 2em;
        }

        .service-title {
            font-size: 1.2em;
        }

        .service-description {
            font-size: 0.9em;
        }

        .service-icon {
            font-size: 2em;
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

        .library-title {
            font-size: 1.3em;
        }

        .library-description {
            font-size: 0.8em;
        }

        .service-number {
            font-size: 1.5em;
        }

        .service-title {
            font-size: 1.1em;
        }

        .service-description {
            font-size: 0.8em;
        }

        .service-icon {
            font-size: 1.5em;
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

        .highlight {
            color: #667eea;
            font-weight: 600;
        }
    </style>
</head>
<body>
 <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <div class="container">
         <section class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">Servicios Complementarios</h1>
                <p class="hero-subtitle">Apoyando tu desarrollo integral y bienestar estudiantil</p>
            </div>
        </section>
       

        <section class="content-section">
            <h2 class="section-title fade-in-up">Servicios Educativos Complementarios</h2>
            <p class="intro-text fade-in-up">
               Ofrecemos una amplia gama de servicios complementarios diseñados para enriquecer tu experiencia educativa y garantizar tu bienestar integral durante tu formación académica.
            </p>

            <div class="library-section scroll-animate">
                <h3 class="library-title">
                    <i class="fas fa-book library-icon"></i>
                    Biblioteca Institucional
                </h3>
                <p class="library-description">
                    La Biblioteca del Instituto de Educación Superior Tecnológico Público Huanta es un espacio destinado a facilitar el acceso a recursos y conocimientos que enriquecen la formación académica y profesional de sus estudiantes y egresados. Esta biblioteca desempeña un papel esencial en el aprendizaje y desarrollo de los alumnos, brindando recursos para investigaciones, estudios y proyectos, y contribuyendo a la difusión de la información y el conocimiento. Además, colabora con la comunidad educativa al ofrecer servicios y asesoramiento en la búsqueda de materiales bibliográficos relevantes para su crecimiento académico.
                </p>
            </div>

            <div class="services-grid">
                <div class="service-card scroll-animate">
                    <i class="fas fa-stethoscope service-icon"></i>
                    <div class="service-number">01</div>
                    <h3 class="service-title">Tópico</h3>
                    <p class="service-description">
                        Nuestro servicio de tópico ofrece atención médica básica y primeros auxilios a estudiantes, docentes y personal administrativo. Contamos con un equipo médico capacitado para brindar atención inmediata en caso de emergencias o situaciones de salud.
                    </p>
                </div>

                <div class="service-card scroll-animate">
                    <i class="fas fa-hands-helping service-icon"></i>
                    <div class="service-number">02</div>
                    <h3 class="service-title">Servicio de Bienestar Estudiantil</h3>
                    <p class="service-description">
                        Nuestro servicio de bienestar estudiantil ofrece orientación y apoyo socioemocional a los estudiantes. Promovemos actividades y programas que fomentan el bienestar físico, emocional y social de nuestra comunidad estudiantil.
                    </p>
                </div>

                <div class="service-card scroll-animate">
                    <i class="fas fa-brain service-icon"></i>
                    <div class="service-number">03</div>
                    <h3 class="service-title">Servicio Psicopedagógico</h3>
                    <p class="service-description">
                        Nuestro servicio psicopedagógico brinda orientación y apoyo en aspectos académicos, vocacionales y personales. Ofrecemos asesoramiento individual y grupal, así como talleres y actividades para fortalecer las habilidades de nuestros estudiantes.
                    </p>
                </div>

                <div class="service-card scroll-animate">
                    <i class="fas fa-briefcase service-icon"></i>
                    <div class="service-number">04</div>
                    <h3 class="service-title">Servicio de Empleabilidad</h3>
                    <p class="service-description">
                        Nuestro servicio de empleabilidad ofrece asesoramiento y orientación profesional para facilitar la inserción laboral de nuestros egresados. Organizamos ferias de empleo, charlas informativas y talleres de desarrollo de habilidades para mejorar la empleabilidad de nuestros estudiantes.
                    </p>
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

        // Add hover effects to service cards
        const serviceCards = document.querySelectorAll('.service-card');
        serviceCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                card.style.color = 'white';
                
                const title = card.querySelector('.service-title');
                const description = card.querySelector('.service-description');
                const number = card.querySelector('.service-number');
                const icon = card.querySelector('.service-icon');
                
                if (title) title.style.color = 'white';
                if (description) description.style.color = 'rgba(255, 255, 255, 0.9)';
                if (number) number.style.color = 'white';
                if (icon) icon.style.color = 'white';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.background = 'white';
                card.style.color = '#333';
                
                const title = card.querySelector('.service-title');
                const description = card.querySelector('.service-description');
                const number = card.querySelector('.service-number');
                const icon = card.querySelector('.service-icon');
                
                if (title) title.style.color = '#2c3e50';
                if (description) description.style.color = '#666';
                if (number) number.style.color = '#667eea';
                if (icon) icon.style.color = '#667eea';
            });
        });
    </script>
       
<!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>