<?php require_once 'config/functions.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentación - Programa de estudios de Diseño y Programación Web</title>
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
            font-size: 3em;
            margin-bottom: 20px;
            display: block;
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
        .objectives-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 80px 60px;
            margin: 60px 0;
            border-radius: 20px;
        }
        .objectives-title {
            font-size: 2.2em;
            margin-bottom: 50px;
            color: #2c3e50;
            text-align: center;
        }
        .objectives-list {
            display: flex;
            flex-direction: column;
            gap: 30px;
            max-width: 800px;
            margin: 0 auto;
        }
        .objective-item {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid transparent;
            cursor: pointer;
            opacity: 0;
            transform: translateX(-50px);
            animation: slideInLeft 0.6s ease-out forwards;
        }
        .objective-item:nth-child(1) {
            animation-delay: 0.1s;
        }
        .objective-item:nth-child(2) {
            animation-delay: 0.3s;
        }
        .objective-item:nth-child(3) {
            animation-delay: 0.5s;
        }
        .objective-item:hover {
            transform: translateX(10px) scale(1.02);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            border-color: #667eea;
        }
        .objective-header {
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .objective-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        .objective-item:hover .objective-header::before {
            left: 100%;
        }
        .objective-number {
            font-size: 1.8em;
            font-weight: bold;
            margin-right: 20px;
            background: rgba(255, 255, 255, 0.2);
            padding: 15px 20px;
            border-radius: 50%;
            min-width: 60px;
            text-align: center;
            animation: pulse 2s infinite;
        }
        .objective-module-title {
            font-size: 1.3em;
            font-weight: 600;
            flex-grow: 1;
            text-align: left;
        }
        .objective-toggle {
            font-size: 1.5em;
            transition: transform 0.3s ease;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .objective-item.active .objective-toggle {
            transform: rotate(180deg);
        }
        .objective-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out, padding 0.4s ease-out;
            background: white;
        }
        .objective-item.active .objective-content {
            max-height: 300px;
            padding: 30px;
        }
        .objective-text {
            font-size: 1.1em;
            line-height: 1.7;
            color: #555;
            margin: 0;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease 0.1s;
        }
        .objective-item.active .objective-text {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Nuevos estilos para el plan de estudios */
        .curriculum-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 80px 60px;
            margin: 60px 0;
            border-radius: 20px;
        }
        
        .curriculum-title {
            font-size: 2.5em;
            margin-bottom: 50px;
            color: #2c3e50;
            text-align: center;
            position: relative;
        }
        
        .curriculum-title::after {
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
        
        .semester-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(480px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .semester-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.4s ease;
            border: 2px solid transparent;
            position: relative;
        }
        
        .semester-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
            border-color: #667eea;
        }
        
        .semester-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .semester-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .semester-card:hover .semester-header::before {
            left: 100%;
        }
        
        .semester-number {
            font-size: 1.8em;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .semester-title {
            font-size: 1.1em;
            opacity: 0.9;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        
        .curriculum-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }
        
        .curriculum-table th {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #2c3e50;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.9em;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #667eea;
        }
        
        .curriculum-table td {
            padding: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            font-size: 0.95em;
        }
        
        .curriculum-table tr:hover td {
            background: rgba(102, 126, 234, 0.05);
            transform: translateX(5px);
        }
        
        .credits-cell {
            text-align: center;
            font-weight: 600;
            color: #667eea;
            font-size: 1.1em;
        }
        
        .hours-cell {
            text-align: center;
            font-weight: 600;
            color: #764ba2;
            font-size: 1.1em;
        }
        
        .subject-cell {
            font-weight: 500;
            color: #2c3e50;
            position: relative;
        }
        
        .subject-cell::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 0;
            background: linear-gradient(45deg, #667eea, #764ba2);
            transition: height 0.3s ease;
        }
        
        .curriculum-table tr:hover .subject-cell::before {
            height: 80%;
        }
        
        /* Animaciones para las tarjetas de semestre */
        .semester-card {
            opacity: 0;
            transform: translateY(30px);
            animation: slideInUp 0.8s ease-out forwards;
        }
        
        .semester-card:nth-child(1) { animation-delay: 0.1s; }
        .semester-card:nth-child(2) { animation-delay: 0.2s; }
        .semester-card:nth-child(3) { animation-delay: 0.3s; }
        .semester-card:nth-child(4) { animation-delay: 0.4s; }
        .semester-card:nth-child(5) { animation-delay: 0.5s; }
        .semester-card:nth-child(6) { animation-delay: 0.6s; }
        
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
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes slideInUp {
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
    </style>
</head>
<body>
 
 <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <section class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">Programa de Estudios de Diseño y Programación Web</h1>
                <p class="hero-subtitle">Formando profesionales creativos y técnicamente competentes para el mundo digital.</p>
            </div>
        </section>
        
        <section class="content-section">
            <h2 class="section-title fade-in-up">Presentación del Programa</h2>
            <p class="intro-text fade-in-up">
                Nuestro Programa de Diseño y Programación Web está diseñado para formar profesionales integrales capaces de crear experiencias digitales excepcionales. Combinamos la creatividad del diseño con la solidez técnica de la programación, preparando a nuestros estudiantes para enfrentar los desafíos del mundo digital actual.
            </p>
            <div class="features-grid">
                <div class="feature-card scroll-animate">
                    <span class="feature-icon"><i class="fas fa-paint-brush"></i></span>
                    <h3 class="feature-title">Diseño Creativo</h3>
                    <p class="feature-description">
                        Desarrollamos habilidades en diseño visual, experiencia de usuario (UX) y interfaces intuitivas (UI) utilizando las últimas tendencias y herramientas del mercado.
                    </p>
                </div>
                <div class="feature-card scroll-animate">
                    <span class="feature-icon"><i class="fas fa-laptop-code"></i></span>
                    <h3 class="feature-title">Programación Avanzada</h3>
                    <p class="feature-description">
                        Enseñamos lenguajes de programación modernos como HTML5, CSS3, JavaScript, React, Node.js y tecnologías emergentes del desarrollo web.
                    </p>
                </div>
                <div class="feature-card scroll-animate">
                    <span class="feature-icon"><i class="fas fa-rocket"></i></span>
                    <h3 class="feature-title">Proyectos Reales</h3>
                    <p class="feature-description">
                        Los estudiantes trabajan con empresas, aplicando conocimientos en situaciones profesionales auténticas.
                    </p>
                </div>
            </div>
        </section>
        
        <section class="objectives-section scroll-animate">
            <h2 class="objectives-title">Módulos Profesionales</h2>
            <div class="objectives-list">
                <div class="objective-item" onclick="toggleDescription(this)">
                    <div class="objective-header">
                        <div class="objective-number">01</div>
                        <h3 class="objective-module-title">ANÁLISIS Y DISEÑO DE SISTEMAS WEB</h3>
                        <div class="objective-toggle">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="objective-content">
                        <p class="objective-text">
                            Desarrollar la construcción de programas de los sistemas de información, de acuerdo al diseño funcional, estándares internacionales de TI, buenas prácticas de programación y políticas de seguridad de la organización.
                        </p>
                    </div>
                </div>
                <div class="objective-item" onclick="toggleDescription(this)">
                    <div class="objective-header">
                        <div class="objective-number">02</div>
                        <h3 class="objective-module-title">DESARROLLO DE APLICACIONES WEB</h3>
                        <div class="objective-toggle">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="objective-content">
                        <p class="objective-text">
                            Desarrollar las pruebas integrales de los sistemas de información y servicios de TI en la fase de implantación, de acuerdo al diseño funcional, buenas prácticas de TI y políticas de seguridad de la organización.
                        </p>
                    </div>
                </div>
                <div class="objective-item" onclick="toggleDescription(this)">
                    <div class="objective-header">
                        <div class="objective-number">03</div>
                        <h3 class="objective-module-title">DISEÑO DE SERVICIOS WEB</h3>
                        <div class="objective-toggle">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="objective-content">
                        <p class="objective-text">
                            Diseñar la presentación, animación, organización y navegación de los contenidos y servicios web, de acuerdo a las demandas del negocio, buenas prácticas de diseño, técnicas de diseño web, usabilidad y experiencia del usuario objetivo.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Nueva sección del plan de estudios -->
        <section class="curriculum-section scroll-animate">
            <h2 class="curriculum-title">Plan de Estudios</h2>
            <div class="semester-grid">
                <!-- Semestre I -->
                <div class="semester-card">
                    <div class="semester-header">
                        <div class="semester-number">SEMESTRE I</div>
                        <div class="semester-title">Fundamentos</div>
                    </div>
                    <table class="curriculum-table">
                        <thead>
                            <tr>
                                <th>Unidad Didáctica</th>
                                <th>Créditos</th>
                                <th>Horas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="subject-cell">Fundamentos de programación</td>
                                <td class="credits-cell">4</td>
                                <td class="hours-cell">96</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Redes e internet</td>
                                <td class="credits-cell">3</td>
                                <td class="hours-cell">80</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Análisis y diseño de sistemas</td>
                                <td class="credits-cell">4</td>
                                <td class="hours-cell">96</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Introducción de base de datos</td>
                                <td class="credits-cell">3</td>
                                <td class="hours-cell">64</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Arquitectura de computadoras</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Comunicación oral</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Aplicaciones en internet</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Semestre II -->
                <div class="semester-card">
                    <div class="semester-header">
                        <div class="semester-number">SEMESTRE II</div>
                        <div class="semester-title">Desarrollo</div>
                    </div>
                    <table class="curriculum-table">
                        <thead>
                            <tr>
                                <th>Unidad Didáctica</th>
                                <th>Créditos</th>
                                <th>Horas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="subject-cell">Ofimática</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Interpretación y producción textos</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Metodología de desarrollo de software</td>
                                <td class="credits-cell">3</td>
                                <td class="hours-cell">80</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Programación orientada a objetos</td>
                                <td class="credits-cell">3</td>
                                <td class="hours-cell">96</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Arquitectura de servidores web</td>
                                <td class="credits-cell">3</td>
                                <td class="hours-cell">80</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Aplicaciones sistematizadas</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Taller de base de datos</td>
                                <td class="credits-cell">3</td>
                                <td class="hours-cell">80</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Semestre III -->
                <div class="semester-card">
                    <div class="semester-header">
                        <div class="semester-number">SEMESTRE III</div>
                        <div class="semester-title">Especialización</div>
                    </div>
                    <table class="curriculum-table">
                        <thead>
                            <tr>
                                <th>Unidad Didáctica</th>
                                <th>Créditos</th>
                                <th>Horas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="subject-cell">Administración de base de datos</td>
                                <td class="credits-cell">5</td>
                                <td class="hours-cell">128</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Programación de aplicaciones web</td>
                                <td class="credits-cell">5</td>
                                <td class="hours-cell">128</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Diseño de interfaces web</td>
                                <td class="credits-cell">5</td>
                                <td class="hours-cell">128</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Pruebas de software</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Inglés para la comunicación oral</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Semestre IV -->
                <div class="semester-card">
                    <div class="semester-header">
                        <div class="semester-number">SEMESTRE IV</div>
                        <div class="semester-title">Avanzado</div>
                    </div>
                    <table class="curriculum-table">
                        <thead>
                            <tr>
                                <th>Unidad Didáctica</th>
                                <th>Créditos</th>
                                <th>Horas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="subject-cell">Desarrollo de entornos web</td>
                                <td class="credits-cell">4</td>
                                <td class="hours-cell">112</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Programación de soluciones web</td>
                                <td class="credits-cell">5</td>
                                <td class="hours-cell">128</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Proyectos de software</td>
                                <td class="credits-cell">3</td>
                                <td class="hours-cell">64</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Seguridad en aplicaciones web</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Comprensión y redacción en inglés</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Comportamiento ético</td>
                                <td class="credits-cell">3</td>
                                <td class="hours-cell">80</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Semestre V -->
                <div class="semester-card">
                    <div class="semester-header">
                        <div class="semester-number">SEMESTRE V</div>
                        <div class="semester-title">Aplicaciones</div>
                    </div>
                    <table class="curriculum-table">
                        <thead>
                            <tr>
                                <th>Unidad Didáctica</th>
                                <th>Créditos</th>
                                <th>Horas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="subject-cell">Programación de aplicaciones móviles</td>
                                <td class="credits-cell">5</td>
                                <td class="hours-cell">128</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Marketing digital</td>
                                <td class="credits-cell">3</td>
                                <td class="hours-cell">64</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Diseño de soluciones web</td>
                                <td class="credits-cell">3</td>
                                <td class="hours-cell">64</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Gestión y administración de sitios web</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Diagramación digital</td>
                                <td class="credits-cell">3</td>
                                <td class="hours-cell">80</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Solución de problemas</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Oportunidades de negocios</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Semestre VI -->
                <div class="semester-card">
                    <div class="semester-header">
                        <div class="semester-number">SEMESTRE VI</div>
                        <div class="semester-title">Profesional</div>
                    </div>
                    <table class="curriculum-table">
                        <thead>
                            <tr>
                                <th>Unidad Didáctica</th>
                                <th>Créditos</th>
                                <th>Horas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="subject-cell">Plataforma de servicios web</td>
                                <td class="credits-cell">3</td>
                                <td class="hours-cell">80</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Ilustración y gráfica digital</td>
                                <td class="credits-cell">5</td>
                                <td class="hours-cell">128</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Administración de servidores web</td>
                                <td class="credits-cell">4</td>
                                <td class="hours-cell">96</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Comercio electrónico</td>
                                <td class="credits-cell">5</td>
                                <td class="hours-cell">128</td>
                            </tr>
                            <tr>
                                <td class="subject-cell">Plan de negocios</td>
                                <td class="credits-cell">2</td>
                                <td class="hours-cell">48</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        
        <section class="statistics-section scroll-animate">
            <h2 class="section-title">Nuestros Números</h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">Empleabilidad</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">200+</div>
                    <div class="stat-label">Egresados</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Empresas Aliadas</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Años de Duración</div>
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
        animateOnScroll(); // Ejecutar al cargar la página

        // Función para alternar la descripción de los módulos
        function toggleDescription(element) {
            // Cerrar otros módulos abiertos
            const allItems = document.querySelectorAll('.objective-item');
            allItems.forEach(item => {
                if (item !== element) {
                    item.classList.remove('active');
                }
            });
            
            // Alternar el módulo actual
            element.classList.toggle('active');
        }

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
                        setTimeout(updateCounter, 20);
                    } else {
                        counter.textContent = target + suffix;
                    }
                };

                // Iniciar animación cuando el elemento es visible
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
        // Inicializar animación del contador
        animateCounters();

        // Añadir efectos de partículas al hover de los módulos
        function addParticleEffect(element) {
            const rect = element.getBoundingClientRect();
            const particles = [];
            
            for (let i = 0; i < 5; i++) {
                const particle = document.createElement('div');
                particle.style.position = 'fixed';
                particle.style.width = '4px';
                particle.style.height = '4px';
                particle.style.backgroundColor = '#667eea';
                particle.style.borderRadius = '50%';
                particle.style.pointerEvents = 'none';
                particle.style.zIndex = '1000';
                particle.style.left = (rect.left + Math.random() * rect.width) + 'px';
                particle.style.top = (rect.top + Math.random() * rect.height) + 'px';
                
                document.body.appendChild(particle);
                particles.push(particle);
                
                // Animar partícula
                const animation = particle.animate([
                    { transform: 'translateY(0px)', opacity: 1 },
                    { transform: 'translateY(-50px)', opacity: 0 }
                ], {
                    duration: 1000,
                    easing: 'ease-out'
                });
                
                animation.onfinish = () => {
                    particle.remove();
                };
            }
        }

        // Añadir event listeners para efectos de partículas
        document.querySelectorAll('.objective-item').forEach(item => {
            item.addEventListener('mouseenter', () => {
                addParticleEffect(item);
            });
        });

        // Añadir efectos de hover a las tarjetas de semestre
        document.querySelectorAll('.semester-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-15px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Efecto de resaltado en las filas de las tablas
        document.querySelectorAll('.curriculum-table tr').forEach(row => {
            row.addEventListener('mouseenter', () => {
                row.style.backgroundColor = 'rgba(102, 126, 234, 0.1)';
            });
            
            row.addEventListener('mouseleave', () => {
                row.style.backgroundColor = '';
            });
        });
    </script>
  
<!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>