<?php require_once 'config/functions.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenido Principal - DPW</title>
    
</head>
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
        main {
            margin-top: 80px;
        }
        /* Hero Section */
        .hero {
            background-image: url('img/baner.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        .hero h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .hero p {
            font-size: 1.3em;
            margin-bottom: 15px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .cta-button {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 15px 40px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        .cta-button:hover {
            background: white;
            color: #667eea;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        /* Slider Section */
        .slider-section {
            padding: 80px 0;
            background: white;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .section-title {
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 50px;
            color: #2c3e50;
            position: relative;

        }
        .section-title-WHITE{
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 50px;
            color: #ffffff;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 2px;
        }
        .slider-container {
            position: relative;
            max-width: 100%;
            margin: 0 auto;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        .slide {
            display: none;
            position: relative;
            height: 400px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 60px 40px;
        }
        .slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .slide.active {
            display: flex;
        }
        .slide:nth-child(1) {
            background-image: url('img/IMG_8246.JPG');
        }
        .slide:nth-child(2) {
            background-image: url('img/IMG_6328.JPG');
        }
        .slide:nth-child(3) {
            background-image: url('img/slide3.1.jpg');
        }
        .slide-content {
            position: relative;
            z-index: 1;
        }
        .slide-content h3 {
            font-size: 2.5em;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .slide-content p {
            font-size: 1.2em;
            max-width: 600px;
            margin: 0 auto;
        }
        .slider-nav {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 10;
        }
        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.8s ease;
        }
        .slider-dot.active {
            background: white;
            transform: scale(1.2);
        }
        /* Blog Section */
        .blog-section {
            padding: 80px 0;
            background: #f8f9fa;
        }
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        .blog-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }
        .blog-card-image {
            height: 200px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .blog-card:nth-child(1) .blog-card-image {
            background-image: url('img/LOGODPW.jpg');
        }
        .blog-card:nth-child(2) .blog-card-image {
            background-image: url('url-de-imagen-para-blog-2.jpg');
        }
        .blog-card:nth-child(3) .blog-card-image {
            background-image: url('url-de-imagen-para-blog-3.jpg');
        }
        .blog-card-content {
            padding: 30px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            height: 325px;
        }
        .blog-card h3 {
            font-size: 1.4em;
            margin-bottom: 15px;
            color: white;
        }
        .blog-card p {
            color: #fff;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .blog-card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9em;
            color: #fff;
        }
        .read-more {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .read-more:hover {
            color: #eee;
        }
        /* Perfil Section */
        .perfil-section {
            padding: 80px 0;
            background: white;
        }
        .perfil-intro {
            text-align: center;
            font-size: 1.2em;
            color: #666;
            margin-bottom: 60px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.8;
        }
        .perfil-content {
            background: white;
            padding: 60px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            transition: transform 0.3s ease;
        }
        .perfil-content:hover {
            transform: translateY(-5px);
        }
        .perfil-text {
            font-size: 1.1em;
            line-height: 1.8;
            text-align: justify;
            color: #555;
        }
        /* Competencias Section */
        .competencias-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        .competencias-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        .competencia-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-left: 5px solid #667eea;
        }
        .competencia-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        .competencia-icon {
            font-size: 3em;
            color: #667eea;
            margin-bottom: 20px;
            display: block;
        }
        .competencia-title {
            font-size: 1.4em;
            font-weight: 600;
            margin-bottom: 15px;
            color: #2c3e50;
        }
        .competencia-text {
            color: #666;
            line-height: 1.6;
        }
        /* Empleabilidad Section */
        .empleabilidad-section {
            padding: 80px 0;
            background: white;
        }
        .empleabilidad-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 50px;
        }
        .empleabilidad-item {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .empleabilidad-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .empleabilidad-item:hover::before {
            left: 100%;
        }
        .empleabilidad-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
        }
        .empleabilidad-icon {
            font-size: 2.5em;
            margin-bottom: 15px;
            display: block;
        }
        .empleabilidad-title {
            font-size: 1.2em;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .empleabilidad-text {
            font-size: 0.95em;
            opacity: 0.9;
        }
        /* Ámbitos Section */
        .ambitos-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
        }
        .ambitos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        .ambito-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        .ambito-card:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-5px);
        }
        .ambito-icon {
            font-size: 2.5em;
            margin-bottom: 20px;
            display: block;
            color: #3498db;
        }
        .ambito-title {
            font-size: 1.3em;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .ambito-items {
            list-style: none;
        }
        .ambito-items li {
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            padding-left: 25px;
        }
        .ambito-items li:before {
            content: '\f054';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            color: #3498db;
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
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }
        @keyframes shine {
            0% {
                background-position: -200px 0;
            }
            100% {
                background-position: 200px 0;
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
        /* Estilos adicionales para mejorar la responsividad en móviles */
    @media (max-width: 768px) {
      

        .container {
            padding: 0 10px;
        }

        .hero {
            height: 400px;
        }

        .hero-content {
            text-align: center;
        }

        .hero h1 {
            font-size: 2em;
        }

        .hero p {
            font-size: 1em;
        }

        .cta-button {
            padding: 10px 20px;
            font-size: 1em;
        }

        .section-title {
            font-size: 1.5em;
        }

        .slider-container, .blog-grid, .competencias-grid, .empleabilidad-grid, .ambitos-grid {
            display: flex;
            flex-direction: column;
        }

        .slide, .blog-card, .competencia-card, .empleabilidad-item, .ambito-card {
            margin-bottom: 20px;
        }

        .perfil-text p {
            font-size: 0.9em;
        }

        .blog-card-image {
            height: 200px;
        }

        .blog-card-content {
            padding: 15px;
        }

        .blog-card-content h3 {
            font-size: 1.2em;
        }

        .blog-card-content p {
            font-size: 0.9em;
        }
    }

    /* Estilos para pantallas muy pequeñas */
    @media (max-width: 480px) {
        .hero {
            height: 300px;
        }

        .hero h1 {
            font-size: 1.5em;
        }

        .hero p {
            font-size: 0.9em;
        }

        .cta-button {
            padding: 8px 16px;
            font-size: 0.9em;
        }

        .section-title {
            font-size: 1.2em;
        }

        .perfil-text p {
            font-size: 0.8em;
        }

        .blog-card-content h3 {
            font-size: 1em;
        }

        .blog-card-content p {
            font-size: 0.8em;
        }
    }
        /* Call to Action */
        .cta-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    
    <main>
       <section class="hero" id="home" style="background-image: url('<?php echo obtenerDatoPorId($datos, 1, 'img'); ?>');">
    <div class="hero-content fade-in-up">
        <h1><?php echo obtenerDatoPorId($datos, 1, 'titulo'); ?></h1>
        <p><?php echo obtenerDatoPorId($datos, 1, 'textos'); ?></p>
        <a href="#blog" class="cta-button">Explorar Nuestro Blog</a>
    </div>
</section>

<section class="slider-section">
    <div class="container">
        <h2 class="section-title scroll-animate">Destacados</h2>
        <div class="slider-container">
            <div class="slide active" style="background-image: url('<?php echo obtenerDatoPorId($datos, 2, 'img'); ?>');">
                <div class="slide-content">
                    <h3><?php echo obtenerDatoPorId($datos, 2, 'titulo'); ?></h3>
                    <p><?php echo obtenerDatoPorId($datos, 2, 'textos'); ?></p>
                </div>
            </div>
            <div class="slide" style="background-image: url('<?php echo obtenerDatoPorId($datos, 3, 'img'); ?>');">
                <div class="slide-content">
                    <h3><?php echo obtenerDatoPorId($datos, 3, 'titulo'); ?></h3>
                    <p><?php echo obtenerDatoPorId($datos, 3, 'textos'); ?></p>
                </div>
            </div>
            <div class="slide" style="background-image: url('<?php echo obtenerDatoPorId($datos, 4, 'img'); ?>');">
                <div class="slide-content">
                    <h3><?php echo obtenerDatoPorId($datos, 4, 'titulo'); ?></h3>
                    <p><?php echo obtenerDatoPorId($datos, 4, 'textos'); ?></p>
                </div>
            </div>
            <div class="slider-nav">
                <span class="slider-dot active" onclick="currentSlide(1)"></span>
                <span class="slider-dot" onclick="currentSlide(2)"></span>
                <span class="slider-dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
    </div>
</section>

<section class="blog-section" id="blog">
    <div class="container">
        <h2 class="section-title scroll-animate">Blog Informativo</h2>
        <div class="blog-grid">
            <article class="blog-card scroll-animate">
                <div class="blog-card-image" style="background-image: url('<?php echo obtenerDatoPorId($datos, 5, 'img'); ?>');"></div>
                <div class="blog-card-content">
                    <h3><?php echo obtenerDatoPorId($datos, 5, 'titulo'); ?></h3>
                    <p><?php echo obtenerDatoPorId($datos, 5, 'textos'); ?></p>
                </div>
            </article>
            <article class="blog-card scroll-animate">
                <div class="blog-card-image" style="background-image: url('<?php echo obtenerDatoPorId($datos, 6, 'img'); ?>');"></div>
                <div class="blog-card-content">
                    <h3><?php echo obtenerDatoPorId($datos, 6, 'titulo'); ?></h3>
                    <p><?php echo obtenerDatoPorId($datos, 6, 'textos'); ?></p>
                </div>
            </article>
            <article class="blog-card scroll-animate">
                <div class="blog-card-image" style="background-image: url('<?php echo obtenerDatoPorId($datos, 7, 'img'); ?>');"></div>
                <div class="blog-card-content">
                    <h3><?php echo obtenerDatoPorId($datos, 7, 'titulo'); ?></h3>
                    <p><?php echo obtenerDatoPorId($datos, 7, 'textos'); ?></p>
                </div>
            </article>
        </div>
    </div>
</section>

        <!-- Perfil Principal -->
        <section class="perfil-section">
            <div class="container">
                <h2 class="section-title scroll-animate">
                    <i class="fas fa-graduation-cap"></i> Perfil Profesional
                </h2>
                <p class="perfil-intro scroll-animate">
                    Formamos profesionales técnicos altamente capacitados para el mundo digital actual
                </p>

                <div class="perfil-content scroll-animate">
                    <div class="perfil-text">
                        <p><strong>El Profesional Técnico de Diseño y Programación Web</strong> cuenta con habilidades avanzadas para diseñar y desarrollar proyectos web innovadores en medios digitales y multimedia. Propone soluciones creativas que responden a las necesidades del cliente y las exigencias del mercado laboral actual.</p>

                        <p>Se especializa en la coordinación e implementación de proyectos web y posicionamiento SEO, aplicando los más altos estándares de seguridad digital. Destaca por su capacidad de trabajo colaborativo, efectivo y ético, con un enfoque hacia la mejora continua y la innovación tecnológica.</p>

                        <p>Posee competencias comunicativas avanzadas en español e inglés, utiliza herramientas informáticas de última generación para optimizar procesos individuales y colaborativos, y demuestra habilidades excepcionales para la resolución de problemas complejos en entornos digitales.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Competencias Específicas -->
        <section class="competencias-section">
            <div class="container">
                <h2 class="section-title scroll-animate">
                    <i class="fas fa-cogs"></i> Competencias Específicas
                </h2>

                <div class="competencias-grid">
                    <div class="competencia-card scroll-animate">
                        <i class="fas fa-laptop-code competencia-icon"></i>
                        <h3 class="competencia-title">Desarrollo de Sistemas</h3>
                        <p class="competencia-text">Desarrolla la construcción de programas para sistemas de información de acuerdo al diseño funcional, estándares internacionales de TI, mejores prácticas de programación y políticas de seguridad organizacional.</p>
                    </div>

                    <div class="competencia-card scroll-animate">
                        <i class="fas fa-bug competencia-icon"></i>
                        <h3 class="competencia-title">Pruebas y Testing</h3>
                        <p class="competencia-text">Ejecuta pruebas integrales de sistemas de información y servicios de TI en la fase de implementación, siguiendo el diseño funcional, mejores prácticas de TI y políticas de seguridad.</p>
                    </div>

                    <div class="competencia-card scroll-animate">
                        <i class="fas fa-paint-brush competencia-icon"></i>
                        <h3 class="competencia-title">Diseño Web UX/UI</h3>
                        <p class="competencia-text">Diseña la presentación, animación, organización y navegación de contenidos y servicios web, basándose en demandas del negocio, mejores prácticas de diseño, técnicas de usabilidad y experiencia del usuario.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Competencias para la Empleabilidad -->
        <section class="empleabilidad-section">
            <div class="container">
                <h2 class="section-title scroll-animate">
                    <i class="fas fa-briefcase"></i> Competencias para la Empleabilidad
                </h2>

                <div class="empleabilidad-grid">
                    <div class="empleabilidad-item scroll-animate">
                        <i class="fas fa-comments empleabilidad-icon"></i>
                        <h3 class="empleabilidad-title">Comunicación Efectiva</h3>
                        <p class="empleabilidad-text">Expresa claramente conceptos, ideas y opiniones de forma oral y escrita para interactuar en diversos contextos sociales y laborales.</p>
                    </div>

                    <div class="empleabilidad-item scroll-animate">
                        <i class="fas fa-language empleabilidad-icon"></i>
                        <h3 class="empleabilidad-title">Inglés Profesional</h3>
                        <p class="empleabilidad-text">Comprende y comunica ideas cotidianas a nivel oral y escrito, interactuando en situaciones diversas en contextos sociales y laborales.</p>
                    </div>

                    <div class="empleabilidad-item scroll-animate">
                        <i class="fas fa-desktop empleabilidad-icon"></i>
                        <h3 class="empleabilidad-title">Tecnologías de Información</h3>
                        <p class="empleabilidad-text">Maneja herramientas informáticas TIC para buscar, analizar información y realizar procedimientos vinculados al área profesional.</p>
                    </div>

                    <div class="empleabilidad-item scroll-animate">
                        <i class="fas fa-balance-scale empleabilidad-icon"></i>
                        <h3 class="empleabilidad-title">Ética Profesional</h3>
                        <p class="empleabilidad-text">Establece relaciones con respeto y justicia, contribuyendo a una convivencia democrática orientada al bien común.</p>
                    </div>

                    <div class="empleabilidad-item scroll-animate">
                        <i class="fas fa-lightbulb empleabilidad-icon"></i>
                        <h3 class="empleabilidad-title">Solución de Problemas</h3>
                        <p class="empleabilidad-text">Identifica situaciones complejas y evalúa posibles soluciones aplicando herramientas flexibles para atender necesidades específicas.</p>
                    </div>

                    <div class="empleabilidad-item scroll-animate">
                        <i class="fas fa-rocket empleabilidad-icon"></i>
                        <h3 class="empleabilidad-title">Emprendimiento</h3>
                        <p class="empleabilidad-text">Identifica oportunidades de proyectos sostenibles, gestionando recursos con creatividad y ética para desarrollar innovaciones.</p>
                    </div>

                    <div class="empleabilidad-item scroll-animate">
                        <i class="fas fa-users empleabilidad-icon"></i>
                        <h3 class="empleabilidad-title">Trabajo Colaborativo</h3>
                        <p class="empleabilidad-text">Participa activamente en el logro de objetivos comunes, integrándose con criterio de respeto y justicia.</p>
                    </div>

                    <div class="empleabilidad-item scroll-animate">
                        <i class="fas fa-crown empleabilidad-icon"></i>
                        <h3 class="empleabilidad-title">Liderazgo</h3>
                        <p class="empleabilidad-text">Articula recursos y potencialidades del equipo logrando trabajo colaborativo, creativo y ético orientado al bien común.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ámbitos de Desempeño -->
        <section class="ambitos-section">
            <div class="container">
                <h2 class="section-title-WHITE scroll-animate">
                    <i class="fas fa-building"></i> Ámbitos de Desempeño
                </h2>

                <div class="ambitos-grid">
                    <div class="ambito-card scroll-animate">
                        <i class="fas fa-city ambito-icon"></i>
                        <h3 class="ambito-title">Sector Público</h3>
                        <ul class="ambito-items">
                            <li>Municipalidades - Área de Estadística e Informática</li>
                            <li>Municipalidades - Área de Imagen Institucional</li>
                            <li>UGEL - Área de Informática</li>
                            <li>UGEL - Área de Imagen Institucional</li>
                            <li>Red de Salud - Área de Estadística e Informática</li>
                            <li>Red de Salud - Área de Imagen Institucional</li>
                        </ul>
                    </div>

                    <div class="ambito-card scroll-animate">
                        <i class="fas fa-laptop-code ambito-icon"></i>
                        <h3 class="ambito-title">Desarrollo Técnico</h3>
                        <ul class="ambito-items">
                            <li>Análisis Funcional</li>
                            <li>Diseño de Plataformas Web</li>
                            <li>Implementación y Mantenimiento Web</li>
                            <li>Programación de Aplicaciones Web</li>
                            <li>Programación de Base de Datos</li>
                            <li>Programación de Servicios</li>
                            <li>Seguridad Web</li>
                        </ul>
                    </div>

                    <div class="ambito-card scroll-animate">
                        <i class="fas fa-mobile-alt ambito-icon"></i>
                        <h3 class="ambito-title">Desarrollo Móvil y Multimedia</h3>
                        <ul class="ambito-items">
                            <li>Programación de Aplicaciones Móviles</li>
                            <li>Diseño Gráfico Publicitario</li>
                            <li>Producción Audiovisual y Multimedia</li>
                            <li>Ilustración Digital</li>
                            <li>Marketing Digital</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="cta-section">
            <div class="container">
                <h2 class="section-title">
                    <i class="fas fa-star"></i> ¡Forma Parte del Futuro Digital!
                </h2>
                <p style="font-size: 1.2em; margin-bottom: 20px;">
                    Únete a nuestra comunidad de profesionales técnicos y desarrolla tu carrera en el mundo de la tecnología web
                </p>
                <a href="presentacion" class="cta-button">
                    <i class="fas fa-arrow-right"></i> Más Información
                </a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <script>
        // Animaciones de scroll
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
        // Ejecutar animaciones al cargar y hacer scroll
        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);

        // Smooth scrolling para enlaces internos
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
    <script>
        // Funcionalidad del slider
        let currentSlideIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.slider-dot');
        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            slides[index].classList.add('active');
            dots[index].classList.add('active');
        }
        function currentSlide(index) {
            currentSlideIndex = index - 1;
            showSlide(currentSlideIndex);
        }
        function nextSlide() {
            currentSlideIndex = (currentSlideIndex + 1) % slides.length;
            showSlide(currentSlideIndex);
        }
        // Avance automático de slides
        setInterval(nextSlide, 5000);
        // Animaciones de scroll
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
        animateOnScroll(); // Ejecutar al cargar la página
    </script>
    
    <script src="js/scripts.js"></script>
</body>
</html>
