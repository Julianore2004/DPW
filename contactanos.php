
<?php require_once 'config/functions.php'; ?>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos - Instituto de Educación Superior Tecnológico Público Huanta</title>
    <!-- Font Awesome -->
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

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            margin-top: 60px;
        }

        .contact-info {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .contact-info h3 {
            font-size: 2em;
            margin-bottom: 30px;
            color: #2c3e50;
            text-align: center;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .contact-icon {
            font-size: 2.5em;
            margin-right: 20px;
            color: #667eea;
            min-width: 80px;
            text-align: center;
        }

        .contact-details h4 {
            font-size: 1.3em;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 600;
        }

        .contact-details p {
            font-size: 1.1em;
            color: #555;
            line-height: 1.6;
        }

        .contact-details a {
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-details a:hover {
            color: #764ba2;
        }

        .map-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .map-section h3 {
            font-size: 2em;
            margin-bottom: 30px;
            color: #2c3e50;
            text-align: center;
        }

        .map-container {
            position: relative;
            width: 100%;
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .social-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px;
            text-align: center;
            margin-top: 60px;
        }

        .social-title {
            font-size: 2.2em;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .social-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .social-item {
            padding: 25px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
            backdrop-filter: blur(10px);
        }

        .social-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-5px);
        }

        .social-icon {
            font-size: 2.5em;
            margin-bottom: 15px;
            display: block;
        }

        .social-label {
            font-size: 1.1em;
            font-weight: 500;
        }

        .contact-form {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-top: 60px;
        }

        .form-title {
            font-size: 2.2em;
            margin-bottom: 30px;
            color: #2c3e50;
            text-align: center;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
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

        .contact-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .contact-item {
            flex-direction: column;
            text-align: center;
            padding: 15px;
        }

        .contact-icon {
            margin-right: 0;
            margin-bottom: 10px;
        }

        .contact-details h4 {
            font-size: 1.1em;
        }

        .contact-details p {
            font-size: 0.9em;
        }

        .map-container {
            height: 300px;
        }

        .social-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .social-item {
            padding: 15px;
        }

        .social-icon {
            font-size: 2em;
        }

        .social-label {
            font-size: 1em;
        }

        .form-group input,
        .form-group textarea {
            padding: 12px;
            font-size: 0.9em;
        }

        .submit-btn {
            padding: 12px;
            font-size: 1em;
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

        .contact-details h4 {
            font-size: 1em;
        }

        .contact-details p {
            font-size: 0.8em;
        }

        .social-icon {
            font-size: 1.5em;
        }

        .social-label {
            font-size: 0.9em;
        }

        .form-group input,
        .form-group textarea {
            padding: 10px;
            font-size: 0.8em;
        }

        .submit-btn {
            padding: 10px;
            font-size: 0.9em;
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
                <h1 class="hero-title">Contáctanos</h1>
                <p class="hero-subtitle">
                    Para más información contáctanos - Estamos aquí para ayudarte
                </p>
            </div>
        </section>

        <section class="content-section">
            <h2 class="section-title fade-in-up">Canales de Comunicación</h2>
            <p class="intro-text fade-in-up">
                Nos encantaría escuchar de ti. Ponte en contacto con nosotros a través de cualquiera de nuestros canales de comunicación y te responderemos lo antes posible.
            </p>

            <div class="contact-grid">
                <div class="contact-info scroll-animate">
                    <h3>Información de Contacto</h3>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Dirección</h4>
                            <p>Jirón Gral Córdova 650<br>Huanta 05121, Ayacucho, Perú</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Teléfono</h4>
                            <p><a href="tel:+51066322296">(066) 322296</a></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Correo Electrónico</h4>
                            <p><a href="mailto:contactos@iestphuanta.edu.pe">contactos@iestphuanta.edu.pe</a></p>
                        </div>
                    </div>
                </div>

                <div class="map-section scroll-animate">
                    <h3>Nuestra Ubicación</h3>
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3905.8!2d-74.2514!3d-12.9397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x910d71627c1b6b5b%3A0x8a9cce7f6c4b6b9c!2sJir%C3%B3n%20Gral%20C%C3%B3rdova%20650%2C%20Huanta%2005121%2C%20Per%C3%BA!5e0!3m2!1ses!2spe!4v1690000000000!5m2!1ses!2spe"
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
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

        // Form submission
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get form data
                const formData = new FormData(this);
                const name = formData.get('name');
                const email = formData.get('email');
                const phone = formData.get('phone');
                const subject = formData.get('subject');
                const message = formData.get('message');
                
                // Simulate form submission
                const submitBtn = this.querySelector('.submit-btn');
                const originalText = submitBtn.textContent;
                
                submitBtn.textContent = 'Enviando...';
                submitBtn.disabled = true;
                
                setTimeout(() => {
                    alert(`¡Gracias ${name}! Tu mensaje ha sido enviado exitosamente. Nos pondremos en contacto contigo pronto.`);
                    this.reset();
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        }

        // Social media click handlers
        document.querySelectorAll('.social-item').forEach(item => {
            item.addEventListener('click', function() {
                const platform = this.querySelector('.social-label').textContent;
                alert(`Próximamente disponible: ${platform}`);
            });
        });

        // Phone number click to call
        document.querySelectorAll('a[href^="tel:"]').forEach(link => {
            link.addEventListener('click', function(e) {
                if (!navigator.userAgent.match(/Mobile/)) {
                    e.preventDefault();
                    alert('Número de teléfono: ' + this.textContent);
                }
            });
        });

        // Email link enhancement
        document.querySelectorAll('a[href^="mailto:"]').forEach(link => {
            link.addEventListener('click', function(e) {
                // Add subject to email link
                const currentHref = this.href;
                if (!currentHref.includes('subject=')) {
                    this.href = currentHref + '?subject=Consulta desde la página web';
                }
            });
        });
    </script>

<!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>