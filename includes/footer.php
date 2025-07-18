<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Mejorado - Instituto Tecnológico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
      
        
      
        
        /* Footer */
        footer {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: white;
            padding: 50px 0 20px;
            position: relative;
            overflow: hidden;
            margin-top: 20px;
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="0.5" fill="white" opacity="0.05"/><circle cx="75" cy="75" r="0.5" fill="white" opacity="0.05"/><circle cx="50" cy="10" r="0.3" fill="white" opacity="0.03"/><circle cx="10" cy="60" r="0.4" fill="white" opacity="0.04"/><circle cx="90" cy="40" r="0.3" fill="white" opacity="0.03"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            position: relative;
            z-index: 1;
        }
        
        .footer-section {
            background: rgba(255, 255, 255, 0.03);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .footer-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .footer-section:hover::before {
            left: 100%;
        }
        
        .footer-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border-color: rgba(102, 126, 234, 0.3);
        }
        
        .footer-section h3 {
            font-size: 1.3em;
            margin-bottom: 20px;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
        }
        
        .footer-section h3 i {
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 1.2em;
        }
        
        .footer-section p,
        .footer-section a {
            color: #e2e8f0;
            text-decoration: none;
            line-height: 1.7;
            transition: all 0.3s ease;
            font-size: 0.95em;
        }
        
        .footer-section a:hover {
            color: #667eea;
            transform: translateX(5px);
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 12px;
            position: relative;
        }
        
        .footer-links li a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .footer-links li a:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateX(0);
        }
        
        .footer-links li a i {
            color: #667eea;
            width: 16px;
            text-align: center;
        }
        
        .logofooter-section {
            text-align: center;
        }
        
        .logofooter {
            max-width: 120px;
            height: auto;
            margin-bottom: 5px;
            border-radius: 5px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }
        
        .logofooter:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4);
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 50%;
            color: white;
            transition: all 0.3s ease;
            font-size: 18px;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, #764ba2, #667eea);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .social-link:hover::before {
            opacity: 1;
        }
        
        .social-link:hover {
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }
        
        .social-link i {
            position: relative;
            z-index: 1;
        }
        
        .contact-info {
            background: rgba(102, 126, 234, 0.1);
            padding: 20px;
            border-radius: 15px;
            margin-top: 10px;
            border-left: 4px solid #667eea;
        }
        
        .contact-info p {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .contact-info i {
            color: #667eea;
            width: 16px;
            text-align: center;
        }
        
        .hours-info {
            background: rgba(118, 75, 162, 0.1);
            padding: 20px;
            border-radius: 15px;
            margin-top: 10px;
            border-left: 4px solid #764ba2;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #a0aec0;
            font-size: 0.9em;
            position: relative;
            z-index: 1;
        }
        
        .footer-bottom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 1px;
            background: linear-gradient(90deg, transparent, #667eea, transparent);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 0 15px;
            }
            
            .footer-section {
                padding: 25px 20px;
            }
            
            .social-links {
                gap: 12px;
            }
            
            .social-link {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }
        }
        
        @media (max-width: 480px) {
            footer {
                padding: 40px 0 20px;
            }
            
            .footer-section {
                padding: 20px 15px;
            }
            
            .footer-section h3 {
                font-size: 1.1em;
            }
            
            .footer-section p,
            .footer-section a {
                font-size: 0.9em;
            }
            
            .social-link {
                width: 35px;
                height: 35px;
                font-size: 14px;
            }
            
            .logo {
                max-width: 100px;
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
        
        .footer-section {
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .footer-section:nth-child(1) { animation-delay: 0.1s; }
        .footer-section:nth-child(2) { animation-delay: 0.2s; }
        .footer-section:nth-child(3) { animation-delay: 0.3s; }
        .footer-section:nth-child(4) { animation-delay: 0.4s; }
    </style>
</head>
<body>
   
    
    <footer>
        <div class="footer-content">
            <div class="footer-section logo-section">
                <img src="img/LOGODPW.jpg" alt="Logo Diseño y Programación Web" class="logofooter">
                <h3><i class="fas fa-graduation-cap"></i> Diseño y Programación Web</h3>
                <p>Formando profesionales en tecnología para el futuro digital</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/profile.php?id=61577626055678" class="social-link" target="_blank" title="Síguenos en Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                   
                </div>
            </div>
            
        
            
            <div class="footer-section">
                <h3><i class="fas fa-map-marker-alt"></i> Ubicación</h3>
                <div class="contact-info">
                    <p><i class="fas fa-map-pin"></i> Jr. Córdova N° 650</p>
                    <p><i class="fas fa-phone"></i> (066) 322296</p>
                    <p><i class="fas fa-envelope"></i> info@institutotecnologico.edu.pe</p>
                </div>
            </div>
            
            <div class="footer-section">
                <h3><i class="fas fa-clock"></i> Horarios de Atención</h3>
                <div class="hours-info">
                    <p><i class="fas fa-calendar-week"></i> Lunes a Viernes</p>
                    <p><i class="fas fa-clock"></i> 7:30 AM - 1:15 PM</p>
                    <p><i class="fas fa-info-circle"></i> Atención personalizada</p>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 Diseño y Programación Web | Todos los derechos reservados </p>
        </div>
    </footer>
</body>
</html>
