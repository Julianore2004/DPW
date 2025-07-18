<?php require_once 'config/functions.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual - Instituto de Educación Superior Tecnológico Público Huanta</title>
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
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .library-info {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 50px;
            border-radius: 20px;
            margin-bottom: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .library-info h3 {
            font-size: 2.2em;
            margin-bottom: 25px;
            color: #2c3e50;
            text-align: center;
        }

        .library-description {
            font-size: 1.1em;
            line-height: 1.8;
            color: #555;
            text-align: justify;
            margin-bottom: 30px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }

        .feature-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .feature-icon {
            font-size: 3.5em;
            margin-bottom: 20px;
            display: block;
            color: #667eea;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            color: white;
        }

        .feature-title {
            font-size: 1.5em;
            margin-bottom: 15px;
            font-weight: 600;
            color: #2c3e50;
        }

        .feature-card:hover .feature-title {
            color: white;
        }

        .feature-description {
            font-size: 1em;
            line-height: 1.6;
            color: #666;
        }

        .feature-card:hover .feature-description {
            color: rgba(255, 255, 255, 0.9);
        }

        .services-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 60px;
            margin: 60px 0;
            border-radius: 20px;
        }

        .services-title {
            font-size: 2.2em;
            margin-bottom: 30px;
            color: #2c3e50;
            text-align: center;
        }

        .services-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .service-item {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #667eea;
            transition: all 0.3s ease;
        }

        .service-item:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .service-icon {
            font-size: 2.5em;
            color: #667eea;
            margin-bottom: 15px;
        }

        .service-title {
            font-size: 1.3em;
            margin-bottom: 10px;
            color: #2c3e50;
            font-weight: 600;
        }

        .service-text {
            font-size: 1em;
            line-height: 1.6;
            color: #555;
        }

        .cta-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 60px;
            text-align: center;
            margin-top: 60px;
        }

        .cta-title {
            font-size: 2.5em;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .cta-subtitle {
            font-size: 1.3em;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .cta-button {
            display: inline-block;
            padding: 18px 40px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-size: 1.2em;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .cta-button:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .statistics-section {
            padding: 60px;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-top: 40px;
        }

        .stat-item {
            padding: 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .stat-number {
            font-size: 3em;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .stat-label {
            font-size: 1.1em;
            opacity: 0.9;
        }

        .hours-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 40px;
            border-radius: 20px;
            margin-top: 60px;
        }

        .hours-title {
            font-size: 2em;
            margin-bottom: 30px;
            color: #2c3e50;
            text-align: center;
        }

        .hours-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .hours-item {
            background: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .hours-day {
            font-size: 1.2em;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .hours-time {
            font-size: 1.1em;
            color: #667eea;
            font-weight: 500;
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

        .content-section, .objectives-section, .curriculum-section {
            padding: 30px 15px;
        }

        .section-title, .objectives-title, .curriculum-title {
            font-size: 1.5em;
        }

        .intro-text {
            font-size: 1em;
        }

        .features-grid, .semester-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .feature-card, .semester-card {
            padding: 20px;
        }

        .objective-header {
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .objective-number {
            margin-bottom: 10px;
        }

        .stats-grid {
            grid-template-columns: 1fr 1fr;
            gap: 15px;
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

        .curriculum-table th, .curriculum-table td {
            padding: 8px;
            font-size: 0.8em;
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

        .section-title, .objectives-title, .curriculum-title {
            font-size: 1.3em;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .stat-number {
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

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
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
                <h1 class="hero-title">Biblioteca Virtual</h1>
                <p class="hero-subtitle">
        Tu puerta de acceso al conocimiento y la información académica   </p>
            </div>
        </section>

        <section class="content-section">
            <h2 class="section-title fade-in-up">Información de la Biblioteca</h2>
            
            <div class="library-info scroll-animate">
                <h3>Biblioteca Virtual</h3>
                <p class="library-description">
                    La Biblioteca del Instituto de Educación Superior Tecnológico Público Huanta es un espacio destinado a facilitar el acceso a recursos y conocimientos que enriquecen la formación académica y profesional de sus estudiantes y egresados. Esta biblioteca desempeña un papel esencial en el aprendizaje y desarrollo de los alumnos, brindando recursos para investigaciones, estudios y proyectos, y contribuyendo a la difusión de la información y el conocimiento. Además, colabora con la comunidad educativa al ofrecer servicios y asesoramiento en la búsqueda de materiales bibliográficos relevantes para su crecimiento académico.
                </p>
            </div>

            <div class="features-grid">
                <div class="feature-card scroll-animate float-animation">
                    <i class="fas fa-book-open feature-icon"></i>
                    <h3 class="feature-title">Recursos Digitales</h3>
                    <p class="feature-description">
                        Accede a una amplia colección de libros digitales, revistas académicas, tesis y documentos especializados en tu área de estudio.
                    </p>
                </div>

                <div class="feature-card scroll-animate float-animation">
                    <i class="fas fa-search feature-icon"></i>
                    <h3 class="feature-title">Búsqueda Avanzada</h3>
                    <p class="feature-description">
                        Utiliza nuestro sistema de búsqueda avanzada para encontrar exactamente los recursos que necesitas para tus proyectos e investigaciones.
                    </p>
                </div>

                <div class="feature-card scroll-animate float-animation">
                    <i class="fas fa-clock feature-icon"></i>
                    <h3 class="feature-title">Acceso 24/7</h3>
                    <p class="feature-description">
                        Disponible las 24 horas del día, los 7 días de la semana. Estudia y consulta recursos desde cualquier lugar y en cualquier momento.
                    </p>
                </div>
            </div>
        </section>

<section class="cta-section scroll-animate">
            <h2 class="cta-title">¡Explora Nuestra Biblioteca!</h2>
            <p class="cta-subtitle">Accede a miles de recursos académicos y enriquece tu formación profesional</p>
            <a href="https://biblioteca.iestphuanta.edu.pe/login/" class="cta-button pulse" onclick="accessLibrary()">
                Acceder a la Biblioteca Virtual
            </a>
        </section>
        <section class="statistics-section scroll-animate">
            <h2 class="section-title">Recursos Disponibles</h2>
            <div class="stats-grid">
                <div class="stat-item pulse">
                    <div class="stat-number">3,000+</div>
                    <div class="stat-label">Libros Digitales</div>
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
                const target = parseInt(counter.textContent.replace(/[^0-9]/g, ''));
                const suffix = counter.textContent.replace(/[0-9]/g, '');
                let count = 0;
                const increment = target / 100;
                
                const updateCounter = () => {
                    if (count < target) {
                        count += increment;
                        counter.textContent = Math.ceil(count) + suffix;
                        setTimeout(updateCounter, 30);
                    } else {
                        counter.textContent = target + suffix;
                    }
                };
                
                // Start animation when element is visible
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            updateCounter();
                            observer.unobserve(entry.target);
                        }
                    });
                });
                observer.observe(counter);
            });
        }

        // Initialize counter animation
        animateCounters();

        // Library access function
        function accessLibrary() {
            // Show loading animation
            const button = document.querySelector('.cta-button');
            const originalText = button.textContent;
            button.textContent = 'Cargando...';
            button.style.pointerEvents = 'none';
            
            setTimeout(() => {
                // Simulate library access
                alert('¡Bienvenido a la Biblioteca Virtual!\n\nEn breve serás redirigido al portal de la biblioteca donde podrás acceder a todos nuestros recursos digitales.\n\nRecuerda usar tus credenciales de estudiante para acceder.');
                
                // Here you would typically redirect to the actual library system
                // window.location.href = 'https://biblioteca.iestphuanta.edu.pe';
                
                button.textContent = originalText;
                button.style.pointerEvents = 'auto';
            }, 2000);
        }

        // Add floating animation delay to cards
        document.querySelectorAll('.float-animation').forEach((card, index) => {
            card.style.animationDelay = `${index * 0.5}s`;
        });

        // Add pulse animation delay to stats
        document.querySelectorAll('.stat-item.pulse').forEach((stat, index) => {
            stat.style.animationDelay = `${index * 0.3}s`;
        });

        // Service items hover effect
        document.querySelectorAll('.service-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(10px) scale(1.02)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(10px)';
            });
        });

        // Feature cards click interaction
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('click', function() {
                const title = this.querySelector('.feature-title').textContent;
                const description = this.querySelector('.feature-description').textContent;
                
                alert(`${title}\n\n${description}\n\n¡Accede a la biblioteca virtual para explorar estos recursos!`);
            });
        });
    </script>
       <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
 
</body>
</html>