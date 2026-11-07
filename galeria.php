<!DOCTYPE html>
<html lang="es" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería Multimedia - M&R² Dental Solutions</title>
    
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
                    fontFamily: { sans: ['Inter', 'sans-serif'], serif: ['Playfair Display', 'Georgia', 'serif'] }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;800&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(135deg, rgba(3, 105, 161, 0.55), rgba(2, 6, 23, 0.92)), url('Archivos Multimedia/Foto-Clinica.jpg');
            background-size: cover; background-position: center 42%; background-attachment: fixed;
        }
        .glass-premium {
            background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(24px);
            border: 1px solid rgba(56, 189, 248, 0.35); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
        }
        .light .glass-premium {
            background: rgba(255, 255, 255, 0.92); backdrop-filter: blur(24px);
            border: 1px solid rgba(14, 165, 233, 0.3); box-shadow: 0 25px 50px -12px rgba(14, 165, 233, 0.2);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.90); backdrop-filter: blur(20px);
            border: 1px solid rgba(14, 165, 233, 0.3); box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .dark .glass-card {
            background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(20px);
            border: 1px solid rgba(56, 189, 248, 0.2); box-shadow: 0 20px 40px rgba(0,0,0,0.5);
        }
    </style>
</head>
<body class="text-slate-800 dark:text-slate-100 font-sans antialiased min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <header class="sticky top-4 z-40 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-premium rounded-2xl px-6 h-20 flex items-center justify-between">
            <a href="index.php" class="flex items-center gap-3 group">
                <img src="Archivos Multimedia/M&R2 Logo.png" alt="Logo" class="h-11 w-auto object-contain transform group-hover:scale-105 transition-transform">
            </a>
            <div class="flex items-center gap-3">
                <a href="index.php" class="px-5 py-2.5 rounded-xl bg-dental-500 hover:bg-dental-600 text-white text-xs font-bold tracking-widest transition-all shadow-md">
                    <i class="fa-solid fa-house mr-1"></i> INICIO
                </a>
            </div>
        </div>
    </header>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Encabezado -->
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="px-4 py-1.5 rounded-full bg-dental-500/10 text-dental-600 dark:text-dental-400 text-xs font-bold uppercase tracking-widest border border-dental-500/20 inline-block mb-3">
                Experiencia Visual
            </span>
            <h1 class="font-serif text-3xl sm:text-5xl font-extrabold text-white">Galería de Casos e <span class="text-transparent bg-clip-text bg-gradient-to-r from-dental-200 via-dental-300 to-dental-400">Instalaciones</span></h1>
            <p class="text-slate-200 text-sm sm:text-base mt-2">Conozca nuestros resultados clínicos y el espacio especializado donde transformamos sonrisas.</p>
        </div>

        <!-- SECCIÓN DESTACADA: VIDEO PROMOCIONAL EN FORMATO CUADRADO -->
        <section class="mb-16">
            <div class="glass-card rounded-3xl p-6 sm:p-10 border border-dental-500/40 relative overflow-hidden shadow-2xl">
                <div class="absolute -right-16 -top-16 w-64 h-64 bg-dental-500/10 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="flex flex-col lg:flex-row items-center gap-8">
                    <div class="w-full lg:w-1/2">
                        <span class="px-3.5 py-1 rounded-full bg-dental-500 text-white text-[10px] font-bold uppercase tracking-widest inline-block mb-3 shadow-md">
                            Spot Institucional — M&R² Dental Solutions. 
                        </span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white leading-tight">Video Promocional: Excelencia y Vanguardia Odontológica</h2>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 mt-3 leading-relaxed">
                            Un recorrido visual por nuestra clínica donde mostramos el compromiso con tu salud bucal, tecnología de vanguardia y atención personalizada en ortodoncia, implantes y estética dental para transformar tu sonrisa con expertos.
                        </p>
                        <div class="mt-6 flex items-center gap-4 text-xs font-semibold text-dental-600 dark:text-dental-400">
                            <span><i class="fa-solid fa-circle-check mr-1 text-emerald-500"></i> Tecnología de Punta</span>
                            <span><i class="fa-solid fa-circle-check mr-1 text-emerald-500"></i> Especialistas Certificados</span>
                        </div>
                    </div>
                    
                    <!-- Contenedor cuadrado (aspect-square) y centrado -->
                    <div class="w-full lg:w-1/2 flex justify-center">
                        <div class="w-full max-w-md relative rounded-2xl overflow-hidden shadow-xl aspect-square bg-slate-950 border border-dental-300/30">
                            <video controls class="w-full h-full object-cover">
                                <source src="Archivos Multimedia/Video-promocional.mp4" type="video/mp4">
                                Tu navegador no soporta videos HTML5.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Botones de Filtro por Categorías -->
        <div class="flex justify-center gap-3 mb-10 flex-wrap">
            <button onclick="filtrarGaleria('todos')" id="btn-todos" class="px-6 py-2.5 rounded-xl bg-dental-500 text-white text-xs font-bold tracking-wide shadow-md transition-all">
                Ver Todo
            </button>
            <button onclick="filtrarGaleria('pacientes')" id="btn-pacientes" class="px-6 py-2.5 rounded-xl bg-white/80 dark:bg-slate-900/80 text-slate-700 dark:text-slate-300 hover:bg-dental-500 hover:text-white text-xs font-bold tracking-wide transition-all border border-slate-200 dark:border-slate-800">
                Pacientes & Sonrisas
            </button>
            <button onclick="filtrarGaleria('clinica')" id="btn-clinica" class="px-6 py-2.5 rounded-xl bg-white/80 dark:bg-slate-900/80 text-slate-700 dark:text-slate-300 hover:bg-dental-500 hover:text-white text-xs font-bold tracking-wide transition-all border border-slate-200 dark:border-slate-800">
                Instalaciones de la Clínica
            </button>
        </div>

        <!-- Contenedor Grid Multimedia -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Elemento: Tratamiento Principal de Ortodoncia -->
            <div class="galeria-item pacientes glass-card rounded-3xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative h-64 overflow-hidden bg-slate-200 dark:bg-slate-800">
                    <img src="Archivos Multimedia/Tratamiento de ortodoncia.jpeg" alt="Tratamiento de Ortodoncia" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-dental-600 text-white text-[10px] font-bold uppercase tracking-wider shadow-md">
                        Ortodoncia
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="font-serif font-bold text-lg text-slate-900 dark:text-white">Evolución y Alineación Dental</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Corrección estructural y estética bajo la supervisión experta en ortodoncia y ortopedia maxilofacial.</p>
                </div>
            </div>

            <!-- Elemento: Brackets (Vista frontal) -->
            <div class="galeria-item pacientes glass-card rounded-3xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative h-64 overflow-hidden bg-slate-200 dark:bg-slate-800">
                    <img src="Archivos Multimedia/Brackets.jpeg" alt="Instalación de Brackets Vista Frontal" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-dental-600 text-white text-[10px] font-bold uppercase tracking-wider shadow-md">
                        Ortodoncia
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="font-serif font-bold text-lg text-slate-900 dark:text-white">Aparatología Fija Multibrackets</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Colocación precisa de arcos y ligaduras estéticas para el alineamiento óptimo de las arcadas dentarias.</p>
                </div>
            </div>

            <!-- Elemento: Brackets 2 (Vista lateral derecha) -->
            <div class="galeria-item pacientes glass-card rounded-3xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative h-64 overflow-hidden bg-slate-200 dark:bg-slate-800">
                    <img src="Archivos Multimedia/Brackets 2.jpeg" alt="Control de Brackets Lateral" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-dental-600 text-white text-[10px] font-bold uppercase tracking-wider shadow-md">
                        Paciente
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="font-serif font-bold text-lg text-slate-900 dark:text-white">Control Oclusal Lateral</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Monitoreo detallado del acoplamiento intermaxilar y nivelación de los segmentos posteriores.</p>
                </div>
            </div>

            <!-- Elemento: Brackets 3 (Vista lateral izquierda) -->
            <div class="galeria-item pacientes glass-card rounded-3xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative h-64 overflow-hidden bg-slate-200 dark:bg-slate-800">
                    <img src="Archivos Multimedia/Brackets 3.jpeg" alt="Detalle de Brackets y Elásticos" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-dental-600 text-white text-[10px] font-bold uppercase tracking-wider shadow-md">
                        Paciente
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="font-serif font-bold text-lg text-slate-900 dark:text-white">Ajuste de Fuerzas Correctivas</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Seguimiento clínico enfocado en la armonización de la mordida y estabilidad funcional.</p>
                </div>
            </div>

            <!-- Elemento: Caso 1 (Rehabilitación anterior) -->
            <div class="galeria-item pacientes glass-card rounded-3xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative h-64 overflow-hidden bg-slate-200 dark:bg-slate-800">
                    <img src="Archivos Multimedia/Caso 1.jpeg" alt="Caso Clínico Anterior" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-dental-600 text-white text-[10px] font-bold uppercase tracking-wider shadow-md">
                        Caso Clínico
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="font-serif font-bold text-lg text-slate-900 dark:text-white">Rehabilitación Estética Anterior</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Restauración de piezas dentales anteriores logrando naturalidad, forma y simetría perfecta.</p>
                </div>
            </div>

            <!-- Elemento: Caso 2 (Perfil derecho rehabilitado) -->
            <div class="galeria-item pacientes glass-card rounded-3xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative h-64 overflow-hidden bg-slate-200 dark:bg-slate-800">
                    <img src="Archivos Multimedia/Caso 2.jpeg" alt="Caso Clínico Perfil Derecho" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-dental-600 text-white text-[10px] font-bold uppercase tracking-wider shadow-md">
                        Caso Clínico
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="font-serif font-bold text-lg text-slate-900 dark:text-white">Armonía Oclusal Lateral Derecha</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Evaluación de acabados protésicos y contacto armónico en sector posterior derecho.</p>
                </div>
            </div>

            <!-- Elemento: Caso 3 (Perfil izquierdo rehabilitado) -->
            <div class="galeria-item pacientes glass-card rounded-3xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative h-64 overflow-hidden bg-slate-200 dark:bg-slate-800">
                    <img src="Archivos Multimedia/Caso 3.jpeg" alt="Caso Clínico Perfil Izquierdo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-dental-600 text-white text-[10px] font-bold uppercase tracking-wider shadow-md">
                        Caso Clínico
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="font-serif font-bold text-lg text-slate-900 dark:text-white">Integración Funcional Izquierda</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Diseño de restauraciones adaptadas para garantizar salud periodontal y durabilidad.</p>
                </div>
            </div>

            <!-- Elemento: Caso 4 (Vista oclusal superior) -->
            <div class="galeria-item pacientes glass-card rounded-3xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative h-64 overflow-hidden bg-slate-200 dark:bg-slate-800">
                    <img src="Archivos Multimedia/Caso 4.jpeg" alt="Vista Oclusal Superior" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-dental-600 text-white text-[10px] font-bold uppercase tracking-wider shadow-md">
                        Caso Clínico
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="font-serif font-bold text-lg text-slate-900 dark:text-white">Arcada Superior Completamente Restaurada</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Perspectiva oclusal que muestra la precisión en contornos y ajuste de cada pieza dental.</p>
                </div>
            </div>

            <!-- Elemento: Clínica (Foto de Instalaciones) -->
            <div class="galeria-item clinica glass-card rounded-3xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative h-64 overflow-hidden bg-slate-200 dark:bg-slate-800">
                    <img src="Archivos Multimedia/Foto-Clinica.jpg" alt="Instalaciones de la Clínica" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-emerald-600 text-white text-[10px] font-bold uppercase tracking-wider shadow-md">
                        Clínica / Consulta
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="font-serif font-bold text-lg text-slate-900 dark:text-white">Área de Consulta y Equipamiento</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Espacios modernos y esterilizados diseñados para garantizar su máxima comodidad y seguridad.</p>
                </div>
            </div>

            <!-- Elemento: Video de Paciente o Servicios -->
            <div class="galeria-item pacientes glass-card rounded-3xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative h-64 overflow-hidden bg-slate-900 flex items-center justify-center">
                    <video controls class="w-full h-full object-cover">
                        <source src="Archivos Multimedia/video-clinica.mp4" type="video/mp4">
                        Tu navegador no soporta videos HTML5.
                    </video>
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-dental-600 text-white text-[10px] font-bold uppercase tracking-wider shadow-md z-10">
                        Video / Servicios
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="font-serif font-bold text-lg text-slate-900 dark:text-white">Nuestros servicios</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Conozca de viva voz la opinión sobre nuestros tratamientos de implantes y rehabilitación.</p>
                </div>
            </div>

            <!-- Elemento: Clínica (Tour Virtual) -->
            <div class="galeria-item clinica glass-card rounded-3xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative h-64 overflow-hidden bg-slate-900 flex items-center justify-center">
                    <video controls class="w-full h-full object-cover">
                        <source src="Archivos Multimedia/video-clinica2.mp4" type="video/mp4">
                        Tu navegador no soporta videos HTML5.
                    </video>
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-emerald-600 text-white text-[10px] font-bold uppercase tracking-wider shadow-md z-10">
                        Video / Tour Clínica
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="font-serif font-bold text-lg text-slate-900 dark:text-white">Tour por M&R² Dental Solutions</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Recorrido rápido por nuestras salas de espera, quirófano y gabinetes odontológicos.</p>
                </div>
            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950/95 backdrop-blur-md text-slate-400 py-6 text-center text-xs border-t border-slate-800 mt-auto">
        &copy; 2026 M&R² Dental Solutions. Todos los derechos reservados. Juan Isidro Ventura.
    </footer>

    <!-- SCRIPT DE FILTRADO DE GALERÍA -->
    <script>
        function filtrarGaleria(categoria) {
            const items = document.querySelectorAll('.galeria-item');
            const btnTodos = document.getElementById('btn-todos');
            const btnPacientes = document.getElementById('btn-pacientes');
            const btnClinica = document.getElementById('btn-clinica');

            // Resetear estilos de botones
            [btnTodos, btnPacientes, btnClinica].forEach(btn => {
                btn.className = "px-6 py-2.5 rounded-xl bg-white/80 dark:bg-slate-900/80 text-slate-700 dark:text-slate-300 hover:bg-dental-500 hover:text-white text-xs font-bold tracking-wide transition-all border border-slate-200 dark:border-slate-800";
            });

            // Activar botón seleccionado
            if(categoria === 'todos') {
                btnTodos.className = "px-6 py-2.5 rounded-xl bg-dental-500 text-white text-xs font-bold tracking-wide shadow-md transition-all";
            } else if(categoria === 'pacientes') {
                btnPacientes.className = "px-6 py-2.5 rounded-xl bg-dental-500 text-white text-xs font-bold tracking-wide shadow-md transition-all";
            } else if(categoria === 'clinica') {
                btnClinica.className = "px-6 py-2.5 rounded-xl bg-dental-500 text-white text-xs font-bold tracking-wide shadow-md transition-all";
            }

            // Mostrar u ocultar elementos según la categoría
            items.forEach(item => {
                if(categoria === 'todos' || item.classList.contains(categoria)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>