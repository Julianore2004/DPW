<?php require_once 'config/functions.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrícula - Programa de Diseño y Programación Web</title>
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

        .requirements-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 60px;
            margin: 0px 0;
            border-radius: 20px;
        }

        .requirements-title {
            font-size: 2.2em;
            margin-bottom: 30px;
            color: #2c3e50;
            text-align: center;
        }

        .requirements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .requirement-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
            position: relative;
            overflow: hidden;
        }

        .requirement-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(45deg, #667eea, #764ba2);
        }

        .requirement-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .requirement-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border-radius: 50%;
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .requirement-title {
            font-size: 1.3em;
            margin-bottom: 15px;
            color: #2c3e50;
            font-weight: 600;
        }

        .requirement-text {
            font-size: 1.1em;
            line-height: 1.6;
            color: #555;
        }

        .pricing-section {
            padding: 60px;
            text-align: center;
        }

        .pricing-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: 0 auto;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
        }

        .pricing-title {
            font-size: 2em;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .pricing-amount {
            font-size: 3.5em;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .pricing-description {
            font-size: 1.2em;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .schedule-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 60px;
            margin: 60px 0;
            border-radius: 20px;
        }

        .schedule-title {
            font-size: 2.2em;
            margin-bottom: 30px;
            color: #2c3e50;
            text-align: center;
        }

        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .schedule-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
            text-align: center;
        }

        .schedule-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .schedule-month {
            font-size: 1.8em;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 15px;
        }

        .schedule-dates {
            font-size: 1.3em;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .schedule-period {
            font-size: 1.1em;
            color: #666;
            font-style: italic;
        }

        .cta-section {
            padding: 60px;
            text-align: center;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-radius: 20px;
            margin: 60px 0;
        }

        .cta-title {
            font-size: 2.2em;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .cta-text {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 15px 40px;
            font-size: 1.2em;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
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

        .requirements-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .requirement-card {
            padding: 20px;
        }

        .requirement-title {
            font-size: 1.1em;
        }

        .requirement-text {
            font-size: 0.9em;
        }

        .pricing-card {
            padding: 25px;
            max-width: 100%;
        }

        .pricing-title {
            font-size: 1.5em;
        }

        .pricing-amount {
            font-size: 2em;
        }

        .pricing-description {
            font-size: 1em;
        }

        .schedule-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .schedule-card {
            padding: 20px;
        }

        .schedule-month {
            font-size: 1.2em;
        }

        .schedule-dates {
            font-size: 1em;
        }

        .schedule-period {
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

        .cta-button {
            padding: 10px 25px;
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

        .requirement-title {
            font-size: 1em;
        }

        .requirement-text {
            font-size: 0.8em;
        }

        .pricing-title {
            font-size: 1.3em;
        }

        .pricing-amount {
            font-size: 1.8em;
        }

        .schedule-month {
            font-size: 1.1em;
        }

        .schedule-dates {
            font-size: 0.9em;
        }

        .cta-title {
            font-size: 1.3em;
        }

        .cta-text {
            font-size: 0.9em;
        }

        .cta-button {
            padding: 8px 20px;
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
                <h1 class="hero-title">Proceso de Matrícula</h1>
                <p class="hero-subtitle">Inicia tu camino hacia el éxito digital con nosotros</p>
            </div>
        </section>

        <section class="content-section">
            <h2 class="section-title fade-in-up">Información de Matrícula</h2>
            <p class="intro-text fade-in-up">
                En el IEST Público "HUANTA", hacemos que el proceso de matrícula sea simple y accesible. A continuación, encontrarás todos los requisitos y procedimientos necesarios para formar parte de nuestro programa.
            </p>
        </section>

        <section class="requirements-section scroll-animate">
            <h2 class="requirements-title">Requisitos de Matrícula</h2>
            <div class="requirements-grid">
                <div class="requirement-card">
                    <div class="requirement-number">1</div>
                    <h3 class="requirement-title">Ingresantes al primer (I) ciclo académico</h3>
                    <p class="requirement-text">
                        Ficha de matrícula completada, establecida por el IEST Público "HUANTA".
                    </p>
                </div>
                <div class="requirement-card">
                    <div class="requirement-number">2</div>
                    <h3 class="requirement-title">Ingresantes al primer (I) ciclo académico</h3>
                    <p class="requirement-text">
                        Certificado de estudios que acredita haber concluido la Educación Básica (certificado por la UGEL), si dicho certificado no fue presentado durante el proceso de admisión.
                    </p>
                </div>
                <div class="requirement-card">
                    <div class="requirement-number">3</div>
                    <h3 class="requirement-title">Para estudiantes del segundo (II) al sexto (VI) ciclo académico</h3>
                    <p class="requirement-text">
                        Es requisito de matrícula haber aprobado como mínimo el setenta y cinco por ciento (75%) de los créditos del ciclo inmediato anterior.
                    </p>
                </div>
            </div>
        </section>

        <section class="pricing-section scroll-animate">
            <h2 class="section-title">Tarifario de Matrícula</h2>
            <div class="pricing-card">
                <h3 class="pricing-title">Derecho de Matrícula</h3>
                <div class="pricing-amount">S/. 80.00</div>
                <p class="pricing-description">Costo único por proceso de matrícula</p>
            </div>
        </section>

        <section class="schedule-section scroll-animate">
            <h2 class="schedule-title">Cronograma de Matrícula</h2>
            <div class="schedule-grid">
                <div class="schedule-card">
                    <div class="schedule-month">MARZO</div>
                    <div class="schedule-dates">17 Marzo - 24 Abril</div>
                    <div class="schedule-period">Inscripción al proceso de matrícula</div>
                </div>
                <div class="schedule-card">
                    <div class="schedule-month">AGOSTO</div>
                    <div class="schedule-dates">12 - 16 Agosto</div>
                    <div class="schedule-period">Inscripción al proceso de matrícula</div>
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

        // Add smooth scrolling for CTA button
        document.querySelector('.cta-button').addEventListener('click', function(e) {
            e.preventDefault();
            // Here you would typically redirect to a contact form or enrollment page
            alert('¡Gracias por tu interés! Te contactaremos pronto para completar tu matrícula.');
        });
    </script>
<!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>