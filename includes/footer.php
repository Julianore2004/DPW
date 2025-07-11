<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer - Instituto Tecnológico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
        }
        /* Footer */
        footer {
            background: #2c3e50;
            color: white;
            padding: 60px 0 20px;
            margin-top: 50px;
        }
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }
        .footer-section h3 {
            font-size: 1.4em;
            margin-bottom: 20px;
            color: #ecf0f1;
        }
        .footer-section p,
        .footer-section a {
            color: #bdc3c7;
            text-decoration: none;
            line-height: 1.8;
            transition: color 0.3s ease;
        }
        .footer-section a:hover {
            color: #667eea;
        }
        .footer-links {
            list-style: none;
        }
        .footer-links li {
            margin-bottom: 10px;
        }
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }
        .social-link {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            color: white;
            transition: all 0.3s ease;
            font-size: 20px;
        }
        .social-link:hover {
            background: #667eea;
            transform: translateY(-3px);
        }
        .footer-bottom {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid #34495e;
            color: #95a5a6;
        }
        .logo {
            max-width: 200px;
            height: auto;
        }
        .face{
            max-width: 100px;
            height: auto;
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <footer>
    <div class="footer-content">
        <div class="footer-section">
            <img src="img/LOGODPW.jpg" alt="Logo" class="logo">
            <h3>Diseño y Programación Web</h3>
            <div class="social-links">
                <a href="https://www.facebook.com/profile.php?id=61577626055678" class="social-link" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </div>
        </div>

        <div class="footer-section">
            <h3>Accesos Rápidos</h3>
            <ul class="footer-links">
                <li><a href="presentacion"><i class="fas fa-info-circle"></i> Nosotros</a></li>
                <li><a href="requisitos-admision"><i class="fas fa-file-signature"></i> Admisión y Matrícula</a></li>
                <li><a href="tupa"><i class="fas fa-file-alt"></i> Trámites (TUPA)</a></li>
                <li><a href="servicios-complementarios"><i class="fas fa-tools"></i> Servicios</a></li>
                <li><a href="biblioteca"><i class="fas fa-book"></i> Biblioteca</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3><i class="fas fa-map-marker-alt"></i> Ubicación</h3>
            <p>Jr. Córdova N° 650<br>Teléfono: (066) 322296</p>
        </div>

        <div class="footer-section">
            <h3><i class="fas fa-clock"></i> Horarios de Atención</h3>
            <p>Lunes a Viernes:<br>7:30 AM - 1:15 PM</p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; Diseño y Programación Web | Todos los derechos reservados.</p>
    </div>
</footer>

</body>
</html>
