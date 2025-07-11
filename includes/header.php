<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header - Instituto Tecnológico</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            padding-top: 80px;
        }
        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
            position: relative;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .logo-img img {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            object-fit: contain;
            transition: all 0.5s ease;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }
        .logo-img:hover img {
            transform: scale(1.1) rotate(5deg);
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
        .logo-img img {
            animation: pulse 4s infinite;
        }
        .logo-text {
            font-size: 18px;
            font-weight: 600;
        }
        .logo-text-light {
            font-weight: 400;
            color: #667eea;
            animation: fadeIn 2s ease-in-out;
        }
        .logo-text-bold {
            font-weight: 700;
            color: #764ba2;
            animation: fadeIn 2s ease-in-out 0.5s both;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        nav {
            display: flex;
            align-items: center;
        }
        .nav-menu {
            display: flex;
            list-style: none;
            gap: 10px;
        }
        .nav-item {
            position: relative;
        }
        .nav-link {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 500;
            padding: 12px 18px;
            border-radius: 30px;
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }
        .nav-link i {
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        .nav-link:hover i {
            transform: scale(1.2);
        }
        .nav-link.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(102, 126, 234, 0.3);
        }
        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 250px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border-radius: 15px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }
        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .dropdown-item {
            padding: 15px 20px;
            color: #2c3e50;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            font-size: 14px;
        }
        .dropdown-item i {
            font-size: 16px;
            color: #667eea;
            transition: all 0.3s ease;
        }
        .dropdown-item:hover {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding-left: 25px;
            color: #667eea;
        }
        .dropdown-item:hover i {
            transform: scale(1.2);
            color: #764ba2;
        }
        .dropdown-item:first-child {
            border-radius: 15px 15px 0 0;
        }
        .dropdown-item:last-child {
            border-radius: 0 0 15px 15px;
        }
        .mobile-menu-toggle {
            display: none;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: white;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .mobile-menu-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        @media (max-width: 768px) {
            .header-content {
                height: 70px;
            }
            .logo-text {
                font-size: 16px;
            }
            .logo-img img {
                width: 50px;
                height: 50px;
            }
            nav {
                flex-direction: column;
                align-items: flex-end;
            }
            .mobile-menu-toggle {
                display: block;
            }
            .nav-menu {
                flex-direction: column;
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                width: 100%;
                position: absolute;
                top: 70px;
                left: 0;
                padding: 20px 0;
                display: none;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }
            .nav-menu.open {
                display: flex;
                animation: slideDown 0.3s ease-out;
            }
            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .nav-item {
                width: 100%;
                text-align: center;
            }
            .nav-link {
                justify-content: center;
                margin: 0 20px;
            }
            .dropdown {
                position: static;
                box-shadow: none;
                border-radius: 0;
                transform: none;
                visibility: visible;
                opacity: 1;
                display: none;
                background: rgba(248, 249, 250, 0.9);
                margin: 0 20px;
                border-radius: 10px;
                margin-top: 10px;
            }
            .nav-item.open .dropdown {
                display: block;
                animation: fadeInUp 0.3s ease-out;
            }
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        }
        /* Efectos adicionales */
        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 30px;
            transition: width 0.3s ease;
            z-index: -1;
        }
        .nav-link:hover::before {
            width: 100%;
        }
        /* Scroll indicator */
        .scroll-indicator {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            z-index: 1001;
            transition: width 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="scroll-indicator"></div>
    <header>
        <div class="header-content">
            <div class="logo">
                <div class="logo-img">
                    <img src="img/LOGODPW.jpg" alt="Logo">
                </div>
                <span class="logo-text">
                    <span class="logo-text-light">DISEÑO Y</span><br>
                    <span class="logo-text-bold">PROGRAMACION WEB</span>
                </span>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="index" class="nav-link active">
                            <i class="fas fa-home"></i>
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#nosotros" class="nav-link">
                            <i class="fas fa-users"></i>
                            Nosotros
                        </a>
                        <div class="dropdown">
                            <a href="presentacion" class="dropdown-item">
                                <i class="fas fa-presentation"></i>
                                Presentación
                            </a>
                            <a href="misión-vision-valores" class="dropdown-item">
                                <i class="fas fa-eye"></i>
                                Misión, Visión y Valores
                            </a>
                            <a href="organizacion" class="dropdown-item">
                                <i class="fas fa-sitemap"></i>
                                Organización
                            </a>
                            <a href="plana-jerarquica" class="dropdown-item">
                                <i class="fas fa-chart-line"></i>
                                Plana Jerárquica
                            </a>
                            <a href="plana-docente" class="dropdown-item">
                                <i class="fas fa-chalkboard-teacher"></i>
                                Plana Docente
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#admision" class="nav-link">
                            <i class="fas fa-user-graduate"></i>
                            Admisión
                        </a>
                        <div class="dropdown">
                            <a href="requisitos-admision" class="dropdown-item">
                                <i class="fas fa-clipboard-list"></i>
                                Requisitos
                            </a>
                            <a href="matricula" class="dropdown-item">
                                <i class="fas fa-edit"></i>
                                Matrícula
                            </a>
                            <a href="becas-y-creditos" class="dropdown-item">
                                <i class="fas fa-hand-holding-usd"></i>
                                Becas y Créditos
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="tupa" class="nav-link">
                            <i class="fas fa-file-alt"></i>
                            TUPA
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#servicios" class="nav-link">
                            <i class="fas fa-cogs"></i>
                            Servicios
                        </a>
                        <div class="dropdown">
                            <a href="biblioteca" class="dropdown-item">
                                <i class="fas fa-book"></i>
                                Biblioteca
                            </a>
                            <a href="servicios-complementarios" class="dropdown-item">
                                <i class="fas fa-plus-circle"></i>
                                Complementarios
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="links" class="nav-link">
                            <i class="fas fa-external-link-alt"></i>
                            Otras Páginas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="contactanos" class="nav-link">
                            <i class="fas fa-envelope"></i>
                            Contáctanos
                        </a>
                    </li>
                </ul>
                <button class="mobile-menu-toggle" aria-label="Abrir menú">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>

   

    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Scroll effect header
        window.addEventListener('scroll', function () {
            const header = document.querySelector('header');
            const scrollIndicator = document.querySelector('.scroll-indicator');
            const scrollPercent = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
            
            scrollIndicator.style.width = scrollPercent + '%';
            
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.98)';
                header.style.backdropFilter = 'blur(20px)';
                header.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.15)';
            } else {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(15px)';
                header.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.1)';
            }
        });

        // Mobile toggle
        const toggleBtn = document.querySelector('.mobile-menu-toggle');
        const navMenu = document.querySelector('.nav-menu');
        const navItems = document.querySelectorAll('.nav-item');

        toggleBtn.addEventListener('click', function () {
            navMenu.classList.toggle('open');
            const icon = this.querySelector('i');
            if (navMenu.classList.contains('open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        navItems.forEach(item => {
            item.addEventListener('click', function (e) {
                if (window.innerWidth <= 768 && item.querySelector('.dropdown')) {
                    e.preventDefault();
                    this.classList.toggle('open');
                }
            });
        });

        // Cerrar menú móvil al hacer clic fuera
        document.addEventListener('click', function(e) {
            if (!e.target.closest('nav') && navMenu.classList.contains('open')) {
                navMenu.classList.remove('open');
                const icon = toggleBtn.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Efecto de typing para el logo
        function typeWriter(element, text, speed) {
            let i = 0;
            element.innerHTML = '';
            function type() {
                if (i < text.length) {
                    element.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                }
            }
            type();
        }

        // Inicializar efectos cuando la página carga
        window.addEventListener('load', function() {
            // Efecto de aparición suave para todos los elementos del nav
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach((link, index) => {
                link.style.opacity = '0';
                link.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    link.style.transition = 'all 0.5s ease';
                    link.style.opacity = '1';
                    link.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>