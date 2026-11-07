<!DOCTYPE html>
<html lang="es" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto y Ubicación - M&R² Dental Solutions</title>
    
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
        }
        .dark .glass-card {
            background: rgba(15, 23, 42, 0.85);
            border: 1px solid rgba(56, 189, 248, 0.3);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
        }
    </style>
</head>
<body class="text-slate-800 dark:text-slate-100 transition-colors duration-300 font-sans antialiased min-h-screen flex flex-col">

    <!-- HEADER -->
    <?php include 'includes/header.php'; ?>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-grow relative z-10 py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Encabezado de la Sección -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-dental-500/20 border border-dental-400/40 text-dental-200 text-xs font-semibold uppercase tracking-widest backdrop-blur-md shadow-xl mb-4">
                    <span class="w-2 h-2 rounded-full bg-dental-400 animate-ping"></span>
                    Canales Oficiales
                </div>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-4">
                    Contacto y <span class="text-transparent bg-clip-text bg-gradient-to-r from-dental-200 via-dental-300 to-dental-400">Ubicación</span>
                </h1>
                <p class="text-base sm:text-lg text-slate-200 font-normal leading-relaxed">
                    Estamos listos para atenderte. Visítanos en nuestra clínica o contáctanos de forma directa a través de nuestras redes y mensajería.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Columna de Información y Redes Sociales (5 columnas) -->
                <div class="lg:col-span-5 space-y-6">
                    
                    <!-- Tarjeta de Datos de Contacto -->
                    <div class="glass-card p-8 rounded-3xl space-y-6">
                        <h3 class="text-xl font-serif font-bold text-slate-900 dark:text-white border-b border-slate-200/50 dark:border-slate-800 pb-4">
                            Información de Contacto
                        </h3>

                        <div class="space-y-4 text-sm">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-dental-500/10 text-dental-600 dark:text-dental-400 flex items-center justify-center text-lg flex-shrink-0 mt-1">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 dark:text-white">Dirección de la Clínica</h4>
                                    <p class="text-slate-600 dark:text-slate-300">Cotuí, Sánchez Ramírez, República Dominicana.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-dental-500/10 text-dental-600 dark:text-dental-400 flex items-center justify-center text-lg flex-shrink-0 mt-1">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 dark:text-white">Asistencia Directa</h4>
                                    <p class="text-slate-600 dark:text-slate-300">829-813-9976</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-dental-500/10 text-dental-600 dark:text-dental-400 flex items-center justify-center text-lg flex-shrink-0 mt-1">
                                    <i class="fa-solid fa-clock"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 dark:text-white">Horarios de Atención</h4>
                                    <p class="text-slate-600 dark:text-slate-300">Lunes a Viernes: 8:00 AM - 6:00 PM <br> Sábados: 8:00 AM - 12:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta de Enlaces Directos (WhatsApp e Instagram) -->
                    <div class="glass-card p-8 rounded-3xl space-y-4">
                        <h3 class="text-xl font-serif font-bold text-slate-900 dark:text-white mb-4">
                            Síguenos y Escríbenos
                        </h3>

                        <!-- Enlace a WhatsApp -->
                        <a href="https://wa.me/18298139976?text=Hola,%20deseo%20más%20información%20sobre%20los%20servicios%20de%20M%26R²%20Dental%20Solutions" target="_blank" class="flex items-center justify-between p-4 rounded-2xl bg-emerald-500/10 hover:bg-emerald-500 text-emerald-600 hover:text-white border border-emerald-500/30 transition-all duration-300 group shadow-sm">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-emerald-500 text-white flex items-center justify-center text-xl shadow-md">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm">Escríbenos por WhatsApp</h4>
                                    <p class="text-xs opacity-80">Respuesta rápida y agendamiento</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                        </a>

                        <!-- Enlace a Instagram -->
                        <a href="https://www.instagram.com/myr_dentalsolution/" target="_blank" class="flex items-center justify-between p-4 rounded-2xl bg-pink-500/10 hover:bg-pink-600 text-pink-600 hover:text-white border border-pink-500/30 transition-all duration-300 group shadow-sm">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-amber-500 via-pink-500 to-purple-600 text-white flex items-center justify-center text-xl shadow-md">
                                    <i class="fa-brands fa-instagram"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm">Síguenos en Instagram</h4>
                                    <p class="text-xs opacity-80">Ver casos clínicos y sonrisas</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                </div>

                <!-- Columna del Mapa de Google Maps (7 columnas) -->
                <div class="lg:col-span-7">
                    <div class="glass-card p-4 rounded-3xl h-full min-h-[500px] flex flex-col">
                        <h3 class="text-xl font-serif font-bold text-slate-900 dark:text-white px-4 py-3">
                            Nuestra Ubicación en el Mapa
                        </h3>
                        <div class="flex-grow w-full h-[450px] rounded-2xl overflow-hidden shadow-inner border border-slate-200 dark:border-slate-800">
                            <!-- Mapa integrado de Google Maps centrado en Cotuí, República Dominicana -->
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.123835659086!2d-70.15469052479511!3d19.058292182142587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eafcfa446385aa3%3A0x57669a6365ccbb05!2sM%26R2%20Dental%20Solutions!5e0!3m2!1ses-419!2sdo!4v1793590553477!5m2!1ses-419!2sdo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <?php include 'includes/footer.php'; ?>

</body>
</html>