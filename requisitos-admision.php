<?php require_once 'config/functions.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisitos de Admisión - Programa de Diseño y Programación Web</title>
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

        .intro-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 40px;
            border-radius: 20px;
            margin-bottom: 40px;
        }

        .intro-text {
            font-size: 1.1em;
            line-height: 1.8;
            color: #555;
            text-align: center;
        }

        .documents-section {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .documents-title {
            font-size: 1.8em;
            color: #2c3e50;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }

        .documents-title i {
            margin-right: 15px;
            font-size: 1.2em;
            color: #667eea;
        }

        .documents-list {
            list-style: none;
            padding: 0;
        }

        .documents-list li {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            font-size: 1.1em;
        }

        .documents-list li:last-child {
            border-bottom: none;
        }

        .documents-list li i {
            color: #667eea;
            margin-right: 15px;
            width: 20px;
            height: 20px;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9em;
        }

        .fees-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            border-radius: 20px;
            margin-bottom: 40px;
        }

        .fees-title {
            font-size: 1.8em;
            margin-bottom: 25px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fees-title i {
            margin-right: 15px;
            font-size: 1.2em;
        }

        .fees-table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }

        .fees-table th,
        .fees-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .fees-table th {
            background: rgba(255, 255, 255, 0.1);
            font-weight: 600;
            font-size: 1.1em;
        }

        .fees-table td {
            font-size: 1em;
        }

        .fees-table tr:last-child td {
            border-bottom: none;
        }

        .accordion-section {
            margin-bottom: 40px;
        }

        .accordion-title {
            font-size: 1.8em;
            color: #2c3e50;
            margin-bottom: 25px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .accordion-title i {
            margin-right: 15px;
            font-size: 1.2em;
            color: #667eea;
        }

        .accordion-item {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .accordion-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 1.1em;
            transition: all 0.3s ease;
        }

        .accordion-header:hover {
            background: linear-gradient(135deg, #5a6fd8, #6a4190);
        }

        .accordion-header i {
            font-size: 1.2em;
            transition: transform 0.3s ease;
        }

        .accordion-header.active i {
            transform: rotate(45deg);
        }

        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .accordion-content.active {
            max-height: 500px;
        }

        .accordion-body {
            padding: 25px;
            font-size: 1.05em;
            line-height: 1.7;
            color: #555;
        }

        .accordion-body ul {
            padding-left: 20px;
            margin-top: 15px;
        }

        .accordion-body li {
            margin-bottom: 10px;
            display: flex;
            align-items: flex-start;
        }

        .accordion-body li i {
            color: #667eea;
            margin-right: 10px;
            margin-top: 5px;
            font-size: 0.8em;
        }

        .vacancies-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 40px;
            border-radius: 20px;
            margin-bottom: 40px;
        }

        .vacancies-title {
            font-size: 1.8em;
            color: #2c3e50;
            margin-bottom: 25px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .vacancies-title i {
            margin-right: 15px;
            font-size: 1.2em;
            color: #667eea;
        }

        .vacancies-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .vacancies-table th,
        .vacancies-table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        .vacancies-table th {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-weight: 600;
            font-size: 0.9em;
        }

        .vacancies-table td {
            font-size: 1em;
            font-weight: 600;
        }

        .vacancies-table tr:last-child td {
            border-bottom: none;
        }

        .program-name {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-weight: 600;
        }

        .schedule-section {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .schedule-title {
            font-size: 1.8em;
            color: #2c3e50;
            margin-bottom: 25px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .schedule-title i {
            margin-right: 15px;
            font-size: 1.2em;
            color: #667eea;
        }

        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 15px;
            overflow: hidden;
        }

        .schedule-table th,
        .schedule-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .schedule-table th {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-weight: 600;
            font-size: 1em;
        }

        .schedule-table td {
            font-size: 0.95em;
        }

        .schedule-table tr:last-child td {
            border-bottom: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                padding: 40px 20px;
            }

            .header-title {
                font-size: 2.2em;
            }

            .content-section {
                padding: 40px 20px;
            }

            .fees-table,
            .vacancies-table,
            .schedule-table {
                font-size: 0.9em;
            }

            .fees-table th,
            .fees-table td,
            .vacancies-table th,
            .vacancies-table td,
            .schedule-table th,
            .schedule-table td {
                padding: 10px;
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
            padding: 20px 10px;
        }

        .intro-section {
            padding: 20px;
        }

        .intro-text {
            font-size: 0.9em;
        }

        .documents-section, .fees-section, .accordion-section, .vacancies-section, .schedule-section {
            padding: 20px;
        }

        .documents-title, .fees-title, .accordion-title, .vacancies-title, .schedule-title {
            font-size: 1.2em;
        }

        .documents-list li {
            font-size: 0.9em;
            padding: 10px 0;
        }

        .fees-table, .vacancies-table, .schedule-table {
            font-size: 0.8em;
        }

        .fees-table th, .fees-table td, .vacancies-table th, .vacancies-table td, .schedule-table th, .schedule-table td {
            padding: 8px;
        }

        .accordion-header {
            font-size: 1em;
            padding: 15px;
        }

        .accordion-body {
            font-size: 0.9em;
            padding: 15px;
        }

        .accordion-body li {
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

        .intro-text {
            font-size: 0.8em;
        }

        .documents-title, .fees-title, .accordion-title, .vacancies-title, .schedule-title {
            font-size: 1em;
        }

        .documents-list li {
            font-size: 0.8em;
        }

        .fees-table, .vacancies-table, .schedule-table {
            font-size: 0.7em;
        }

        .accordion-header {
            font-size: 0.9em;
        }

        .accordion-body {
            font-size: 0.8em;
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
                <h1 class="hero-title">Requisitos de Admisión</h1>
                <p class="hero-subtitle">Programa de Estudios de Diseño y Programación Web</p>
            </div>
        </section>
       

        <section class="content-section">
            <div class="intro-section fade-in-up">
                <p class="intro-text">
                    Para la inscripción, los postulantes deben presentar los siguientes documentos. En caso de que el postulante solicite exoneración, deberá presentar el documento que acredite la condición de exonerado.
                </p>
            </div>

            <div class="documents-section scroll-animate">
                <h3 class="documents-title">
                    <i class="fas fa-file-alt"></i>
                    Documentos Requeridos
                </h3>
                <ul class="documents-list">
                    <li>
                        <i class="fas fa-check-circle"></i>
                        Copia simple del DNI
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        Certificado de estudios secundarios
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        Recibo de pago por derecho de inscripción
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        Documento que acredite condición de exonerado (si aplica)
                    </li>
                </ul>
            </div>

            <div class="fees-section scroll-animate">
                <h3 class="fees-title">
                    <i class="fas fa-money-bill-wave"></i>
                    Derechos de Inscripción
                </h3>
                <table class="fees-table">
                    <thead>
                        <tr>
                            <th>Concepto</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Derecho de Inscripción para examen de Postulantes Ordinarios</td>
                            <td>S/. 200.00</td>
                        </tr>
                        <tr>
                            <td>Postulantes de Ley del Servicio Militar (activo)</td>
                            <td>S/. 100.00</td>
                        </tr>
                        <tr>
                            <td>Exonerados por primer puesto de educación secundaria</td>
                            <td>S/. 230.00</td>
                        </tr>
                        <tr>
                            <td>Exonerados por poseer Títulos y/o grados de nivel Universitario y Superior</td>
                            <td>S/. 280.00</td>
                        </tr>
                        <tr>
                            <td>Exonerados por deportista calificado que hayan representado a nivel regional</td>
                            <td>S/. 250.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="accordion-section scroll-animate">
                <h3 class="accordion-title">
                    <i class="fas fa-list-alt"></i>
                    Modalidades de Admisión
                </h3>
                
                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        <span>Modalidad Ordinario</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Se realiza periódicamente a través de una evaluación considerando condiciones de calidad para cubrir el número de vacantes de acuerdo al orden de mérito. La nota mínima aprobatoria para alcanzar una vacante es <strong>(11) Once</strong>.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        <span>Por Exoneración</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Contempla la admisión a deportistas calificados, a estudiantes talentosos y a aquellos que están cumpliendo servicio militar voluntario, de conformidad con la normativa vigente.</p>
                            <p><strong>El ingreso por Exoneración será para los egresados de la Educación Básica que acrediten:</strong></p>
                            <ul>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    <span>Los Primeros puestos de la educación básica en cualquiera de sus modalidades</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    <span>Deportistas calificados, acreditados por el Instituto Peruano del Deporte</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    <span>Las personas víctimas del terrorismo, con acreditación comprobada</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    <span>Convenios con Instituciones de educación secundaria y/o entidades estatales o privadas en los cuales se haya acordado brindar dicho beneficio</span>
                                </li>
                            </ul>
                            <p><strong>Nota:</strong> En caso de que los postulantes por exoneración sean mayores al de las vacantes ofertadas, se irá cubriendo por evaluación de expedientes.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        <span>Por Ingreso Extraordinario</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>Este proceso de admisión se autoriza por el MINEDU y se implementa para becas y programas conforme a la normativa de la materia.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        <span>Del Examen de Admisión</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>El examen de admisión será de tipo objetivo y prevé la calificación anónima, teniendo en cuenta los siguientes criterios:</p>
                            <ul>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    <span><strong>Tipo de prueba:</strong> objetiva y de alternativa múltiple (a, b, c, d, e)</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    <span><strong>La prueba consta de:</strong> 60 preguntas</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    <span><strong>Duración de la prueba:</strong> 120 minutos</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        <span>Ejecución de la Prueba de Admisión</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            <p>El examen de admisión está a cargo de la Comisión Institucional de Admisión del INSTITUTO y, de ser posible, tiene como veedor del examen el representante de la DREA.</p>
                            <p><strong>El examen de admisión considerará los siguientes aspectos:</strong></p>
                            <ul>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    <span>Comprensión lectora</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    <span>Razonamiento lógico matemático</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    <span>Conocimientos, que pueden incluir conocimientos de secundaria, necesarios para el desarrollo de la especialidad a la cual se postula</span>
                                </li>
                                <li>
                                    <i class="fas fa-chevron-right"></i>
                                    <span>Cultura general</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="vacancies-section scroll-animate">
                <h3 class="vacancies-title">
                    <i class="fas fa-users"></i>
                    Cuadro de Vacantes
                </h3>
                <table class="vacancies-table">
                    <thead>
                        <tr>
                            <th>Programas de Estudio</th>
                            <th>Total de Metas</th>
                            <th>Primeros Puestos</th>
                            <th>Grado y/o Título</th>
                            <th>Deportista Calificado</th>
                            <th>Estudiantes Reincorporación</th>
                            <th>Víctima de Violencia Política</th>
                            <th>Discapacitados</th>
                            <th>Convenio Academia</th>
                            <th>Por Examen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="program-name">DISEÑO Y PROGRAMACIÓN WEB</td>
                            <td>30</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>7</td>
                            <td>1</td>
                            <td>1</td>
                            <td>2</td>
                            <td>16</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="schedule-section scroll-animate">
                <h3 class="schedule-title">
                    <i class="fas fa-calendar-alt"></i>
                    Cronograma del Proceso de Admisión 2026
                </h3>
                <table class="schedule-table">
                    <thead>
                        <tr>
                            <th>Actividad</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Convocatoria Examen de Admisión 2026, en todos los Programas de Estudios</td>
                            <td>Del 20 de Enero al 4 de Abril del 2026</td>
                        </tr>
                        <tr>
                            <td>Inscripción de postulantes Examen de Admisión Ordinario 2026</td>
                            <td>Del 20 de Enero al 4 de Abril del 2026</td>
                        </tr>
                        <tr>
                            <td>Inscripción de postulantes Exonerados por diferentes modalidades al Examen de Admisión 2026</td>
                            <td>Del 20 de Enero al 14 de Marzo del 2026</td>
                        </tr>
                        <tr>
                            <td>Evaluación de expedientes exonerados por diferentes modalidades Examen de Admisión 2026</td>
                            <td>20 de Marzo del 2026</td>
                        </tr>
                        <tr>
                            <td>Publicación resultados exonerados por diferentes modalidades Examen de Admisión 2026</td>
                            <td>20 de Marzo del 2026</td>
                        </tr>
                        <tr>
                            <td>Publicación de Postulantes Aptos Examen de Admisión 2026</td>
                            <td>4 de Abril del 2026</td>
                        </tr>
                        <tr>
                            <td>Examen de Admisión 2026</td>
                            <td>6 de Abril del 2026</td>
                        </tr>
                        <tr>
                            <td>Publicación de resultados Examen de Admisión 2026, orden de méritos por programas de estudios</td>
                            <td>6 de Abril del 2026</td>
                        </tr>
                        <tr>
                            <td>Matrícula de Estudiantes Ingresantes 2026</td>
                            <td>Del 17 de Marzo al 24 de Abril del 2026</td>
                        </tr>
                        <tr>
                            <td>Inicio de Clases del Periodo Lectivo 2026-I</td>
                            <td>7 de Abril del 2026</td>
                        </tr>
                        <tr>
                            <td>Finalización del Periodo Lectivo 2026-I</td>
                            <td>25 Julio del 2026</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <script>
        function toggleAccordion(element) {
            const content = element.nextElementSibling;
            const isActive = content.classList.contains('active');
            
            // Close all accordion items
            document.querySelectorAll('.accordion-content').forEach(content => {
                content.classList.remove('active');
            });
            document.querySelectorAll('.accordion-header').forEach(header => {
                header.classList.remove('active');
            });
            
            // Open clicked item if it wasn't already active
            if (!isActive) {
                content.classList.add('active');
                element.classList.add('active');
            }
        }

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
    </script>
      
<!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>