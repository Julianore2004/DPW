<?php require_once 'config/functions.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enlaces - Sistemas MINEDU e Institucionales</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

        .systems-section {
            margin-bottom: 80px;
        }

        .systems-title {
            font-size: 2.2em;
            margin-bottom: 30px;
            color: #2c3e50;
            text-align: center;
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .systems-title::after {
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

        .systems-description {
            font-size: 1.1em;
            line-height: 1.8;
            color: #555;
            margin-bottom: 40px;
            text-align: center;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .minedu-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-top: 40px;
        }

        .link-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
            position: relative;
            overflow: hidden;
        }

        .link-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .link-card:hover::before {
            transform: scaleX(1);
        }

        .link-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-color: #667eea;
        }

        .link-icon {
            font-size: 3em;
            margin-bottom: 20px;
            color: #667eea;
            transition: all 0.3s ease;
        }

        .link-card:hover .link-icon {
            transform: scale(1.1);
            color: #764ba2;
        }

        .link-title {
            font-size: 1.4em;
            margin-bottom: 15px;
            font-weight: 600;
            color: #2c3e50;
            transition: color 0.3s ease;
        }

        .link-card:hover .link-title {
            color: #667eea;
        }

        .link-description {
            font-size: 0.9em;
            color: #666;
            line-height: 1.6;
        }

        .minedu-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 60px;
            border-radius: 20px;
            margin-bottom: 60px;
        }

        .institutional-section {
            background: linear-gradient(135deg, #fff5f5 0%, #fed7d7 100%);
            padding: 60px;
            border-radius: 20px;
        }

        .external-link {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.2em;
            color: #667eea;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .link-card:hover .external-link {
            opacity: 1;
        }

        .highlight {
            color: #667eea;
            font-weight: 600;
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

        .systems-title {
            font-size: 1.5em;
        }

        .systems-description {
            font-size: 0.9em;
        }

        .minedu-grid, .links-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .link-card {
            padding: 20px;
        }

        .link-icon {
            font-size: 2em;
        }

        .link-title {
            font-size: 1.1em;
        }

        .link-description {
            font-size: 0.9em;
        }

        .external-link {
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

        .systems-title {
            font-size: 1.3em;
        }

        .systems-description {
            font-size: 0.8em;
        }

        .link-title {
            font-size: 1em;
        }

        .link-description {
            font-size: 0.8em;
        }

        .link-icon {
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
    </style>
</head>
<body>
 
 <!-- Header -->
    <?php include 'includes/header.php'; ?>

    
    <div class="container">
        <section class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">Enlaces Externos</h1>
                <p class="hero-subtitle">Acceso directo a sistemas MINEDU e institucionales</p>
            </div>
        </section>

        <section class="content-section">
            <h2 class="section-title fade-in-up">Sistemas y Plataformas Educativas</h2>
            <p class="intro-text fade-in-up">
                Facilitamos el acceso a las principales plataformas y sistemas proporcionados por el Ministerio de Educación del Perú (MINEDU) y nuestros sistemas institucionales, garantizando una experiencia educativa integral y de calidad.
            </p>

            <div class="minedu-section scroll-animate">
                <h3 class="systems-title"><i class="fas fa-university"></i> Sistemas del MINEDU</h3>
                <p class="systems-description">
                    Accede a los principales sistemas del Ministerio de Educación del Perú que facilitan la gestión académica y administrativa de tu formación educativa. Estos sistemas están diseñados para garantizar transparencia, eficiencia y calidad en los procesos educativos.
                </p>
                
                <div class="minedu-grid">
                    <a href="#" class="link-card" onclick="openExternalLink('https://titula.minedu.gob.pe/')">
                        <i class="fas fa-external-link-alt external-link"></i>
                        <div class="link-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4 class="link-title">TITULA</h4>
                        <p class="link-description">Sistema de gestión de títulos y certificaciones académicas del MINEDU</p>
                    </a>

                    <a href="#" class="link-card" onclick="openExternalLink('https://registra.minedu.gob.pe/#!/')">
                        <i class="fas fa-external-link-alt external-link"></i>
                        <div class="link-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h4 class="link-title">REGISTRA</h4>
                        <p class="link-description">Plataforma de registro y seguimiento académico estudiantil</p>
                    </a>

                    <a href="#" class="link-card" onclick="openExternalLink('https://avanza.minedu.gob.pe/')">
                        <i class="fas fa-external-link-alt external-link"></i>
                        <div class="link-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4 class="link-title">AVANZA</h4>
                        <p class="link-description">Sistema de seguimiento del progreso académico y competencias</p>
                    </a>

                    <a href="#" class="link-card" onclick="openExternalLink('https://conecta.minedu.gob.pe/')">
                        <i class="fas fa-external-link-alt external-link"></i>
                        <div class="link-icon">
                            <i class="fas fa-network-wired"></i>
                        </div>
                        <h4 class="link-title">CONECTA</h4>
                        <p class="link-description">Plataforma de conexión y comunicación educativa digital</p>
                    </a>
                </div>
            </div>

            <div class="institutional-section scroll-animate">
                <h3 class="systems-title"><i class="fas fa-school"></i> Sistemas Institucionales</h3>
                <p class="systems-description">
                    Nuestros sistemas institucionales están diseñados para facilitar la gestión académica, administrativa y de servicios a nuestra comunidad educativa, brindando eficiencia, transparencia y acceso a la información relevante para estudiantes, docentes y personal administrativo.
                </p>
                
                <div class="links-grid">
                    <a href="#" class="link-card" onclick="openExternalLink('https://sispa.iestphuanta.edu.pe/docente/login/')">
                        <i class="fas fa-external-link-alt external-link"></i>
                        <div class="link-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="link-title">SISPA</h4>
                        <p class="link-description">Sistema Integral de Servicios para Personal Académico</p>
                    </a>

                    <a href="#" class="link-card" onclick="openExternalLink('https://iestphuanta.sistema.edu.pe/login/')">
                        <i class="fas fa-external-link-alt external-link"></i>
                        <div class="link-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h4 class="link-title">SIGAEST</h4>
                        <p class="link-description">Sistema Integral de Gestión Académica Estudiantil</p>
                    </a>

                    <a href="#" class="link-card" onclick="openExternalLink('https://login.live.com/oauth20_authorize.srf?client_id=4765445b-32c6-49b0-83e6-1d93765276ca&scope=openid+profile+https%3a%2f%2fwww.office.com%2fv2%2fOfficeHome.All&redirect_uri=https%3a%2f%2fwww.office.com%2flandingv2&response_type=code+id_token&state=Q2FjogFfX2POhRJQ89ot6AojTgyVDeTpPL2ugN1sQDS8WrqJ37auIfQVwe2jKTYaLesFfwnjstuh-QX1V_h_8WjyqgHbKBtiO5arcwznAOElhZe5D9dTOuOTzIB3NVfnprRQc2yItfyKUY4PVncl-7980oXHTrWzDS0EHkUYLM6JX3hNhJpcuV3zx-7yV0NgBtwFz2IFi4a_O4dLkcSYxEcuie1HrGJ4ra3UfGn5qzm1XHv0p6RRpbwB6NXeiwGTZRctTXvWi5LpP01r9nl8ZA&response_mode=form_post&nonce=638508188791136893.OTk4Y2VjM2YtNmI4ZS00NzAyLTk3MTctNGIyNDRjOTNkMzk1ODUzMzlmYjctNTA5ZC00M2NjLTg1OTQtZDVlZGFiZDJjODIy&x-client-SKU=ID_NET6_0&x-client-Ver=7.3.1.0&uaid=03d293d96b17493db3d73ac036d1a678&msproxy=1&issuer=mso&tenant=common&ui_locales=es-419&epct=PAQABDgEAAAApTwJmzXqdR4BN2miheQMY0zTAvz7t8ZaaPjHvVUinhQvH8l2WwwIYTQXEkMWzTB_FY9DyErdCF3OoNKVkQBtWlVaHx1gr9unL4igk3XkaWm2g3kKnwE9scfWIclKcwWqkRnGbyI_YiZNzXZ2QMU48uVO-v79vgM0-3kXrJyGCfHcqG2HLS9xYhTjW8APimNCEKmNm_WyIyzmk9FPNKNWafFsOOMoNbVb8feXm6gBc_SAA&jshs=-1&jsh=&jshp=')">
                        <i class="fas fa-external-link-alt external-link"></i>
                        <div class="link-icon">
                            <i class="fab fa-microsoft"></i>
                        </div>
                        <h4 class="link-title">OFFICE 365</h4>
                        <p class="link-description">Suite de herramientas de productividad y colaboración</p>
                    </a>
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

        // Function to open external links
        function openExternalLink(url) {
            if (url === '#') {
                alert('Este enlace estará disponible próximamente. Por favor, contacta a la administración para más información.');
                return;
            }
            window.open(url, '_blank', 'noopener,noreferrer');
        }

        // Add click effects to cards
        const linkCards = document.querySelectorAll('.link-card');
        linkCards.forEach(card => {
            card.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Add click animation
                card.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    card.style.transform = 'translateY(-10px)';
                    
                    // Get the onclick attribute and execute it
                    const onclickAttr = card.getAttribute('onclick');
                    if (onclickAttr) {
                        eval(onclickAttr);
                    }
                }, 100);
            });
        });

        // Add ripple effect on click
        linkCards.forEach(card => {
            card.addEventListener('mousedown', function(e) {
                const ripple = document.createElement('span');
                const rect = card.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.backgroundColor = 'rgba(102, 126, 234, 0.3)';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'ripple 0.6s linear';
                ripple.style.pointerEvents = 'none';
                
                card.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
    
  
<!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>