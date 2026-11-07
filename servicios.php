<!DOCTYPE html>
<html lang="es" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especialidades y Servicios - M&R² Dental Solutions</title>
    
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
        body {
            background-image: linear-gradient(135deg, rgba(3, 105, 161, 0.55), rgba(2, 6, 23, 0.92)), url('Archivos Multimedia/Foto-Clinica.jpg');
            background-size: cover;
            background-position: center 42%;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.90);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(14, 165, 233, 0.3);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .dark .glass-card {
            background: rgba(15, 23, 42, 0.85);
            border: 1px solid rgba(56, 189, 248, 0.3);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
        }
        .glass-card:hover {
            border-color: rgba(14, 165, 233, 0.8);
            box-shadow: 0 25px 60px rgba(14, 165, 233, 0.25);
        }
    </style>
</head>
<body class="text-slate-800 dark:text-slate-100 transition-colors duration-300 font-sans antialiased min-h-screen flex flex-col">

    <!-- HEADER -->
    <?php include 'includes/header.php'; ?>

    <!-- MODAL DINÁMICO DE DETALLES -->
    <div id="serviceModal" class="fixed inset-0 z-50 bg-slate-950/70 backdrop-blur-md flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-300">
        <div id="modalBox" class="bg-white dark:bg-slate-900 border border-dental-400/50 rounded-3xl p-8 max-w-lg w-full shadow-2xl transform scale-95 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div id="modalIcon" class="w-14 h-14 rounded-2xl bg-dental-500/10 text-dental-600 dark:text-dental-400 flex items-center justify-center text-2xl shadow-inner"></div>
                <button onclick="cerrarModal()" class="text-slate-400 hover:text-slate-700 dark:hover:text-white text-lg transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <h3 id="modalTitle" class="text-2xl font-serif font-bold text-slate-900 dark:text-white mb-2"></h3>
            <p id="modalDesc" class="text-sm text-slate-600 dark:text-slate-300 mb-6 leading-relaxed"></p>
            <div class="flex items-center gap-3">
                <a id="modalAgendarBtn" href="agendar.php" class="flex-grow py-3 rounded-xl bg-dental-500 hover:bg-dental-600 text-white font-bold text-xs uppercase tracking-wider text-center transition-all shadow-lg shadow-dental-500/30">
                    Agendar esta especialidad
                </a>
                <button onclick="cerrarModal()" class="px-5 py-3 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs uppercase tracking-wider transition-all">
                    Cerrar
                </button>
            </div>
        </div>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-grow relative z-10 py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Encabezado -->
            <div class="text-center max-w-3xl mx-auto mb-12">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-dental-500/20 border border-dental-400/40 text-dental-200 text-xs font-semibold uppercase tracking-widest backdrop-blur-md shadow-xl mb-4">
                    <span class="w-2 h-2 rounded-full bg-dental-400 animate-ping"></span>
                    Servicios y Especialidades
                </div>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-4">
                    Tratamientos Odontológicos <span class="text-transparent bg-clip-text bg-gradient-to-r from-dental-200 via-dental-300 to-dental-400">Integrales</span>
                </h1>
                <p class="text-base sm:text-lg text-slate-200 font-normal leading-relaxed">
                    Soluciones avanzadas para devolverle la salud y estética perfecta a tu sonrisa.
                </p>
            </div>

            <!-- Barra de Búsqueda Dinámica -->
            <div class="max-w-xl mx-auto mb-16">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="text" id="buscadorServicios" onkeyup="filtrarServicios()" placeholder="Busca una especialidad (Ej. Ortodoncia, Implantes...)" 
                           class="w-full pl-11 pr-4 py-4 rounded-2xl bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl border border-dental-400/30 text-sm text-slate-800 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-dental-400 shadow-xl transition-all">
                </div>
            </div>

            <!-- Cuadrícula de Servicios -->
            <div id="gridServicios" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $servicios = [
                    ["Rehabilitación Bucal", "Restauración integral de la función y estética oral.", "fa-tooth", "Incluye coronas, puentes y prótesis fijas o removibles de alta durabilidad."],
                    ["Ortodoncia", "Alineación mediante brackets y sistemas estéticos avanzados.", "fa-face-smile-beam", "Corrección de maloclusiones con alineadores invisibles y brackets metálicos o estéticos."],
                    ["Endodoncia", "Tratamientos de conducto indoloros con tecnología moderna.", "fa-syringe", "Eliminación del tejido pulpar dañado preservando la pieza dental con total confort."],
                    ["Odontopediatría", "Cuidado dental preventivo especializado para niños.", "fa-child-reaching", "Atención amigable y especializada para fomentar una salud bucal temprana y sin miedo."],
                    ["Cirugía Maxilofacial", "Procedimientos quirúrgicos complejos con máxima seguridad.", "fa-user-doctor", "Extracciones complejas, cirugía ortognática y patologías de los maxilares."],
                    ["Implantología", "Implantes de titanio de alta integración y durabilidad.", "fa-gem", "Sustitución de dientes perdidos mediante raíces artificiales de titanio de última generación."],
                    ["Periodoncia", "Cuidado y salud de encías y soporte dental profesional.", "fa-shield-halved", "Prevención, diagnóstico y tratamiento de enfermedades periodontales y gingivitis."],
                    ["Odontología General", "Profilaxis, revisiones periódicas y operatoria dental.", "fa-stethoscope", "Limpiezas profundas, resinas estéticas y control preventivo para toda la familia."]
                ];
                foreach($servicios as $s):
                ?>
                <div class="servicio-card glass-card p-8 rounded-3xl flex flex-col justify-between transform hover:-translate-y-2 hover:scale-[1.02] group" data-titulo="<?= strtolower($s[0]) ?>" data-desc="<?= strtolower($s[1]) ?>">
                    <div>
                        <!-- Icono temático distintivo por especialidad -->
                        <div class="w-14 h-14 rounded-2xl bg-dental-500/10 dark:bg-dental-500/20 text-dental-600 dark:text-dental-400 flex items-center justify-center text-2xl mb-6 group-hover:bg-dental-500 group-hover:text-white transition-all duration-300 shadow-inner">
                            <i class="fa-solid <?= $s[2] ?>"></i>
                        </div>
                        
                        <h3 class="text-xl font-serif font-bold mb-3 text-slate-900 dark:text-white group-hover:text-dental-600 dark:group-hover:text-dental-400 transition-colors">
                            <?= $s[0] ?>
                        </h3>
                        <p class="text-sm text-slate-600 dark:text-slate-300 mb-6 leading-relaxed">
                            <?= $s[1] ?>
                        </p>
                    </div>

                    <div class="pt-4 border-t border-slate-200/50 dark:border-slate-800 flex items-center justify-between">
                        <button onclick="abrirModal('<?= $s[0] ?>', '<?= $s[3] ?>', '<?= $s[2] ?>')" class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 hover:text-dental-600 dark:hover:text-dental-400 transition-colors">
                            <span>Ver detalles</span>
                            <i class="fa-solid fa-plus text-[10px]"></i>
                        </button>
                        <a href="agendar.php" onclick="preselectSpecialty('<?= $s[0] ?>')" class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-dental-600 dark:text-dental-400 hover:text-dental-700 dark:hover:text-dental-300 transition-colors">
                            <span>Agendar</span>
                            <i class="fa-solid fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Mensaje de No Encontrado -->
            <div id="noResults" class="hidden text-center py-16">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-dental-500/10 text-dental-500 flex items-center justify-center text-2xl">
                    <i class="fa-solid fa-face-frown"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-1">No se encontraron resultados</h3>
                <p class="text-slate-300 text-sm">Intente buscando con otra palabra o especialidad.</p>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <?php include 'includes/footer.php'; ?>

    <!-- SCRIPT DE DINAMISMO (BÚSQUEDA Y MODAL) -->
    <script>
        // Filtrado dinámico de servicios
        function filtrarServicios() {
            let input = document.getElementById('buscadorServicios').value.toLowerCase();
            let tarjetas = document.querySelectorAll('.servicio-card');
            let noResults = document.getElementById('noResults');
            let contadorVisibles = 0;

            tarjetas.forEach(tarjeta => {
                let titulo = tarjeta.getAttribute('data-titulo');
                let desc = tarjeta.getAttribute('data-desc');

                if (titulo.includes(input) || desc.includes(input)) {
                    tarjeta.style.display = "flex";
                    contadorVisibles++;
                } else {
                    tarjeta.style.display = "none";
                }
            });

            if (contadorVisibles === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        }

        // Abrir Modal Dinámico con ícono personalizado de la especialidad
        function abrirModal(titulo, descripcion, iconoClass) {
            const modal = document.getElementById('serviceModal');
            const box = document.getElementById('modalBox');

            document.getElementById('modalTitle').textContent = titulo;
            document.getElementById('modalDesc').textContent = descripcion;
            document.getElementById('modalIcon').innerHTML = `<i class="fa-solid ${iconoClass}"></i>`;
            
            document.getElementById('modalAgendarBtn').setAttribute('onclick', `preselectSpecialty('${titulo}')`);

            modal.style.opacity = '1';
            modal.style.pointerEvents = 'auto';
            box.style.transform = 'scale(1)';
        }

        // Cerrar Modal Dinámico
        function cerrarModal() {
            const modal = document.getElementById('serviceModal');
            const box = document.getElementById('modalBox');

            modal.style.opacity = '0';
            modal.style.pointerEvents = 'none';
            box.style.transform = 'scale(0.95)';
        }

        // Preselección para agendar
        function preselectSpecialty(especialidad) {
            localStorage.setItem('especialidadPreseleccionada', especialidad);
        }
    </script>
</body>
</html>