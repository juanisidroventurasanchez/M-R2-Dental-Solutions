<!DOCTYPE html>
<html lang="es" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M&R² Dental Solutions - Clínica Odontológica Especializada</title>
    
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.classList.remove('light', 'dark');
            document.documentElement.classList.add(savedTheme);
        })();
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dental: {
                            50: '#f0f9ff', 100: '#e0f2fe', 200: '#bae6fd', 300: '#7dd3fc',
                            400: '#38bdf8', 500: '#0ea5e9', 600: '#0284c7', 700: '#0369a1',
                            800: '#075985', 900: '#0c4a6e',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'Georgia', 'serif'],
                        script: ['Dancing Script', 'cursive']
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,800;1,600&display=swap" rel="stylesheet">
    <style>
        html { scroll-behavior: smooth; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #0ea5e9; border-radius: 4px; }
        
        body {
            background-image: linear-gradient(135deg, rgba(3, 105, 161, 0.55), rgba(2, 6, 23, 0.92)), url('Archivos Multimedia/Foto-Clinica.jpg');
            background-size: cover;
            background-position: center 42%;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .glass-premium {
            background: rgba(15, 23, 42, 0.80);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(56, 189, 248, 0.35);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7), 0 0 30px rgba(14, 165, 233, 0.15);
        }
        .light .glass-premium {
            background: rgba(255, 255, 255, 0.90);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(14, 165, 233, 0.3);
            box-shadow: 0 25px 50px -12px rgba(14, 165, 233, 0.2), 0 0 30px rgba(14, 165, 233, 0.1);
        }

        #navOverlay, #adminModalOverlay {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        #navDrawer {
            transform: translateX(100%);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        #adminModalContent {
            transform: scale(0.95);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
    </style>
</head>
<body class="text-slate-800 dark:text-slate-100 transition-colors duration-300 font-sans antialiased min-h-screen flex flex-col">

    <!-- BARRA DE NAVEGACIÓN -->
    <header id="mainNav" class="sticky top-4 z-40 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-premium rounded-2xl px-6 h-20 flex items-center justify-between transition-colors">
            
            <a href="index.php" class="flex items-center gap-3 group">
                <img src="Archivos Multimedia/M&R2 Logo.png" alt="M&R² Dental Solutions Logo" class="h-11 w-auto object-contain transform group-hover:scale-105 transition-transform duration-300 filter drop-shadow-[0_4px_8px_rgba(0,0,0,0.3)]">
            </a>

            <div class="flex items-center gap-3">
                <button id="themeToggleBtn" onclick="toggleTheme()" class="p-2.5 rounded-xl bg-slate-200/70 dark:bg-slate-800/80 text-slate-700 dark:text-slate-200 hover:bg-dental-500 hover:text-white dark:hover:bg-dental-600 transition-all shadow-inner border border-slate-300/50 dark:border-slate-700/50" title="Cambiar Tema">
                    <i id="themeIcon" class="fa-solid fa-moon text-base"></i>
                </button>

                <button onclick="toggleNavMenu(true)" class="flex items-center gap-2.5 px-5 py-2.5 rounded-xl bg-gradient-to-r from-dental-500 via-dental-600 to-dental-700 hover:from-dental-600 hover:to-dental-800 text-white transition-all shadow-lg shadow-dental-500/40 transform hover:-translate-y-0.5 border border-dental-400/30">
                    <span class="font-bold text-xs tracking-widest hidden sm:inline">MENÚ</span>
                    <i class="fa-solid fa-bars-staggered text-base"></i>
                </button>

                <button onclick="toggleAdminModal(true)" class="hidden md:flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-100 dark:bg-slate-800 text-dental-700 dark:text-dental-300 hover:bg-dental-500 hover:text-white dark:hover:bg-dental-600 dark:hover:text-white transition-all text-xs font-bold tracking-wide border border-slate-200 dark:border-slate-700 shadow-inner">
                    <i class="fa-solid fa-user-shield text-sm"></i> Admin
                </button>
            </div>
        </div>
    </header>

    <!-- MENÚ LATERAL DRAWER -->
    <div id="navOverlay" class="fixed inset-0 z-50 bg-slate-950/75 backdrop-blur-md flex justify-end">
        <div class="absolute inset-0" onclick="toggleNavMenu(false)"></div>
        <div id="navDrawer" class="relative w-full max-w-md bg-white dark:bg-slate-900 h-full shadow-2xl flex flex-col z-10 border-l border-slate-200 dark:border-slate-800">
            <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between bg-dental-50/50 dark:bg-slate-900/50">
                <div class="flex items-center gap-3">
                    <img src="Archivos Multimedia/M&R2 Logo.png" alt="Logo" class="h-10 w-auto object-contain">
                    <div>
                        <h3 class="font-serif font-bold text-lg text-dental-900 dark:text-white">M&R² Dental</h3>
                        <p class="text-xs text-dental-600 dark:text-dental-400 font-script">Navegación General</p>
                    </div>
                </div>
                <button onclick="toggleNavMenu(false)" class="p-2.5 rounded-full hover:bg-slate-200 dark:hover:bg-slate-800 text-slate-500 transition-colors">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>
            <nav class="flex-1 overflow-y-auto py-6 px-6 space-y-3">
                <a href="index.php" class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-medium text-slate-700 dark:text-slate-200 hover:bg-dental-50 dark:hover:bg-slate-800 transition-colors"><i class="fa-solid fa-house text-dental-500 w-6 text-center"></i> Inicio</a>
                <a href="nosotros.php" class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-medium text-slate-700 dark:text-slate-200 hover:bg-dental-50 dark:hover:bg-slate-800 transition-colors"><i class="fa-solid fa-circle-info text-dental-500 w-6 text-center"></i> Nosotros</a>
                <a href="servicios.php" class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-medium text-slate-700 dark:text-slate-200 hover:bg-dental-50 dark:hover:bg-slate-800 transition-colors"><i class="fa-solid fa-tooth text-dental-500 w-6 text-center"></i> Especialidades & Servicios</a>
                <a href="galeria.php" class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-medium text-slate-700 dark:text-slate-200 hover:bg-dental-50 dark:hover:bg-slate-800 transition-colors"><i class="fa-solid fa-sliders text-dental-500 w-6 text-center"></i> Galería de Imagenes</a>
                <a href="equipo.php" class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-medium text-slate-700 dark:text-slate-200 hover:bg-dental-50 dark:hover:bg-slate-800 transition-colors"><i class="fa-solid fa-user-doctor text-dental-500 w-6 text-center"></i> Equipo Médico</a>
                <a href="agendar.php" class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-medium text-slate-700 dark:text-slate-200 hover:bg-dental-50 dark:hover:bg-slate-800 transition-colors"><i class="fa-solid fa-calendar-plus text-dental-500 w-6 text-center"></i> Agendar Cita en Línea</a>
                <a href="contacto.php" class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-medium text-slate-700 dark:text-slate-200 hover:bg-dental-50 dark:hover:bg-slate-800 transition-colors"><i class="fa-solid fa-location-dot text-dental-500 w-6 text-center"></i> Contacto y Ubicación</a>
                <div class="pt-4 border-t border-slate-100 dark:border-slate-800">
                    <button onclick="toggleNavMenu(false); toggleAdminModal(true);" class="w-full flex items-center gap-4 px-4 py-3.5 rounded-2xl font-semibold text-dental-700 dark:text-dental-300 bg-dental-100/70 dark:bg-slate-800 hover:bg-dental-200 transition-colors text-left">
                        <i class="fa-solid fa-user-shield text-dental-600 dark:text-dental-400 w-6 text-center"></i> Acceder como Administrador
                    </button>
                </div>
            </nav>
        </div>
    </div>

    <!-- MODAL MODO ADMINISTRADOR -->
    <div id="adminModalOverlay" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-md flex items-center justify-center p-4">
        <div class="absolute inset-0" onclick="toggleAdminModal(false)"></div>
        <div id="adminModalContent" class="relative w-full max-w-md bg-white dark:bg-slate-900 rounded-3xl shadow-2xl border border-dental-300/60 dark:border-slate-800 p-8 z-10">
            
            <div class="flex items-center justify-between pb-4 mb-6 border-b border-slate-100 dark:border-slate-800">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-dental-500/10 flex items-center justify-center text-dental-600 dark:text-dental-400 text-xl">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <div>
                        <h3 class="font-serif font-bold text-xl text-slate-900 dark:text-white">Portal Administrador</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Control de gestión del sistema</p>
                    </div>
                </div>
                <button onclick="toggleAdminModal(false)" class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-400 hover:text-slate-600 transition-colors">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <form action="login_admin.php" method="POST" class="space-y-5">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">Usuario Administrador</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="text" name="admin_user" required placeholder="Usuario autorizado" class="w-full pl-11 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-dental-500 text-sm transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">Contraseña</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" name="admin_pass" required placeholder="••••••••" class="w-full pl-11 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-dental-500 text-sm transition-all">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-dental-500 to-dental-700 hover:from-dental-600 hover:to-dental-800 text-white font-bold shadow-lg shadow-dental-500/30 transition-all flex items-center justify-center gap-2 text-sm">
                        <i class="fa-solid fa-right-to-bracket"></i> Activar Modo Administrador
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SECCIÓN HERO -->
    <main class="flex-grow relative flex items-center overflow-hidden min-h-[85vh]">
        <section class="relative z-10 w-full py-16 lg:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    
                    <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-dental-500/20 border border-dental-400/40 text-dental-200 text-xs font-semibold uppercase tracking-widest backdrop-blur-md shadow-xl">
                            <span class="w-2 h-2 rounded-full bg-dental-400 animate-ping"></span>
                            Servicios Odontológicos de Calidad
                        </div>
                        
                        <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-white leading-[1.1]">
                            Tu bienestar es nuestra prioridad. <span class="text-transparent bg-clip-text bg-gradient-to-r from-dental-200 via-dental-300 to-dental-400">En M&R² Dental Solutions, ¡Cuidamos tu Sonrisa!</span>
                        </h1>

                        <p class="text-lg text-slate-200 max-w-2xl mx-auto lg:mx-0 font-normal leading-relaxed">
                            Tu mejor versión empieza con una sonrisa radiante respaldada por especialistas de confianza en <strong class="text-white font-semibold">M&R² Dental Solutions</strong>.
                        </p>

                        <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                            <a href="agendar.php" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-gradient-to-r from-dental-500 via-dental-600 to-dental-700 hover:from-dental-600 hover:to-dental-800 text-white font-bold shadow-2xl shadow-dental-500/40 transition-all transform hover:-translate-y-0.5 text-center flex items-center justify-center gap-3 border border-dental-400/40">
                                <i class="fa-solid fa-calendar-check text-lg"></i> Reservar Mi Cita
                            </a>
                        </div>
                    </div>

                    <div class="lg:col-span-5 flex justify-center">
                        <div class="w-full max-w-sm p-8 rounded-3xl bg-white dark:bg-slate-900 backdrop-blur-2xl border border-dental-300/60 dark:border-dental-500/30 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.8)] flex flex-col items-center text-center transform hover:scale-[1.02] transition-transform duration-500">
                            <div class="w-full flex items-center justify-center p-6 my-2 bg-white dark:bg-slate-800/80 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-md">
                                <img src="Archivos Multimedia/M&R2 Logo.png" alt="M&R² Dental Solutions Logo" class="max-h-44 w-auto object-contain filter drop-shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                            </div>
                            <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800 w-full flex items-center justify-center gap-2 text-sm font-semibold text-slate-700 dark:text-white">
                                <div class="flex text-amber-400 gap-1 drop-shadow-sm">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="bg-slate-950/95 backdrop-blur-md text-slate-300 py-12 border-t border-dental-500/20 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <div>
                <h3 class="font-serif text-xl font-bold text-white mb-2">M&R² Dental Solutions</h3>
                <p class="text-sm text-slate-400">Excelencia odontológica, estética avanzada e implantes dentales en manos de especialistas calificados.</p>
            </div>
            <br>
            <div>
                <h4 class="font-semibold text-dental-400 mb-3">Seguros Médicos (ARS)</h4>
                <p class="text-sm text-slate-400 mb-2">Trabajamos con las principales ARS del mercado dominicano previa validación de cobertura.</p>
                <p class="text-xs text-dental-300 font-semibold"><i class="fa-solid fa-phone mr-1"></i> Asistencia Directa: 829-813-9976</p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pt-8 border-t border-slate-900 text-center text-xs text-slate-500">
            &copy; 2026 M&R² Dental Solutions. Todos los derechos reservados. Juan Isidro Ventura.
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const currentTheme = localStorage.getItem('theme') || 'light';
            const themeIcon = document.getElementById('themeIcon');
            if(themeIcon) {
                themeIcon.className = currentTheme === 'dark' ? 'fa-solid fa-sun text-base' : 'fa-solid fa-moon text-base';
            }
        });

        function toggleTheme() {
            const htmlEl = document.documentElement;
            const themeIcon = document.getElementById('themeIcon');
            if (htmlEl.classList.contains('dark')) {
                htmlEl.classList.remove('dark');
                htmlEl.classList.add('light');
                localStorage.setItem('theme', 'light');
                if(themeIcon) themeIcon.className = 'fa-solid fa-moon text-base';
            } else {
                htmlEl.classList.remove('light');
                htmlEl.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                if(themeIcon) themeIcon.className = 'fa-solid fa-sun text-base';
            }
        }

        function toggleNavMenu(open) {
            const overlay = document.getElementById('navOverlay');
            const drawer = document.getElementById('navDrawer');
            overlay.style.opacity = open ? '1' : '0';
            overlay.style.pointerEvents = open ? 'auto' : 'none';
            drawer.style.transform = open ? 'translateX(0)' : 'translateX(100%)';
        }

        function toggleAdminModal(open) {
            const overlay = document.getElementById('adminModalOverlay');
            const content = document.getElementById('adminModalContent');
            overlay.style.opacity = open ? '1' : '0';
            overlay.style.pointerEvents = open ? 'auto' : 'none';
            content.style.transform = open ? 'scale(1)' : 'scale(0.95)';
        }
    </script>
</body>
</html>