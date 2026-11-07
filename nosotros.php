<!DOCTYPE html>
<html lang="es" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - M&R² Dental Solutions</title>
    
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
            
            <!-- Encabezado de la Página -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-dental-500/20 border border-dental-400/40 text-dental-200 text-xs font-semibold uppercase tracking-widest backdrop-blur-md shadow-xl mb-4">
                    <span class="w-2 h-2 rounded-full bg-dental-400 animate-ping"></span>
                    Nuestra Identidad
                </div>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-4">
                    Conozca <span class="text-transparent bg-clip-text bg-gradient-to-r from-dental-200 via-dental-300 to-dental-400">M&R² Dental Solutions</span>
                </h1>
                <p class="text-base sm:text-lg text-slate-200 font-normal leading-relaxed">
                    Comprometidos con la excelencia odontológica, la salud integral y la confianza de cada una de nuestras familias de pacientes.
                </p>
            </div>

            <!-- CUADRÍCULA: MISIÓN Y VISIÓN -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                
                <!-- MISIÓN -->
                <div class="glass-card p-8 sm:p-10 rounded-3xl relative overflow-hidden group transform hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-dental-500/10 rounded-full blur-2xl group-hover:bg-dental-500/20 transition-all"></div>
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-dental-500 to-dental-600 text-white flex items-center justify-center text-2xl shadow-lg shadow-dental-500/30">
                                <i class="fa-solid fa-bullseye"></i>
                            </div>
                            <div>
                                <span class="text-xs font-bold uppercase tracking-widest text-dental-600 dark:text-dental-400">Propósito Fundamental</span>
                                <h2 class="text-3xl font-script font-bold text-slate-900 dark:text-white">Misión</h2>
                            </div>
                        </div>
                        <p class="text-slate-700 dark:text-slate-200 text-base sm:text-lg leading-relaxed font-normal">
                            Contribuir con el mantenimiento de la salud oral de nuestros pacientes, así como también devolver tanto la funcionalidad como la estética de nuestros pacientes.
                        </p>
                    </div>
                </div>

                <!-- VISIÓN -->
                <div class="glass-card p-8 sm:p-10 rounded-3xl relative overflow-hidden group transform hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-dental-500/10 rounded-full blur-2xl group-hover:bg-dental-500/20 transition-all"></div>
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-dental-500 to-dental-600 text-white flex items-center justify-center text-2xl shadow-lg shadow-dental-500/30">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                            <div>
                                <span class="text-xs font-bold uppercase tracking-widest text-dental-600 dark:text-dental-400">Nuestra Aspiración</span>
                                <h2 class="text-3xl font-script font-bold text-slate-900 dark:text-white">Visión</h2>
                            </div>
                        </div>
                        <p class="text-slate-700 dark:text-slate-200 text-base sm:text-lg leading-relaxed font-normal">
                            Ser uno de los principales centros de la región, con un vasto renombre y sobre todo con la confianza de nuestros pacientes.
                        </p>
                    </div>
                </div>

            </div>

            <!-- SECCIÓN DESTACADA: VALORES -->
            <div class="glass-card p-8 sm:p-12 rounded-3xl relative overflow-hidden">
                <div class="text-center max-w-2xl mx-auto mb-10">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gradient-to-tr from-dental-500 to-dental-600 text-white flex items-center justify-center text-3xl shadow-lg shadow-dental-500/30">
                        <i class="fa-solid fa-gem"></i>
                    </div>
                    <span class="text-xs font-bold uppercase tracking-widest text-dental-600 dark:text-dental-400">Principios Éticos</span>
                    <h2 class="text-4xl font-script font-bold text-slate-900 dark:text-white mt-1">Nuestros Valores</h2>
                    <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-2">Los pilares humanos que guían cada consulta y tratamiento clínico.</p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6">
                    <?php
                    $valores = [
                        ["icono" => "fa-handshake-angle", "nombre" => "Responsabilidad"],
                        ["icono" => "fa-heart-pulse", "nombre" => "Empatía"],
                        ["icono" => "fa-hands-holding-child", "nombre" => "Solidaridad"],
                        ["icono" => "fa-award", "nombre" => "Compromiso"],
                        ["icono" => "fa-user-shield", "nombre" => "Respeto"],
                        ["icono" => "fa-face-smile", "nombre" => "Amabilidad"],
                        ["icono" => "fa-scale-balanced", "nombre" => "Honestidad"],
                        ["icono" => "fa-heart", "nombre" => "Amor"]
                    ];
                    foreach($valores as $v):
                    ?>
                    <div class="p-4 rounded-2xl bg-white/60 dark:bg-slate-800/60 border border-slate-200/60 dark:border-slate-700/60 text-center flex flex-col items-center justify-center transform hover:scale-105 hover:bg-dental-500 hover:text-white group transition-all duration-300 shadow-sm">
                        <i class="fa-solid <?= $v['icono'] ?> text-2xl mb-2 text-dental-500 dark:text-dental-400 group-hover:text-white transition-colors"></i>
                        <span class="font-semibold text-sm sm:text-base text-slate-800 dark:text-slate-100 group-hover:text-white transition-colors">
                            <?= $v['nombre'] ?>
                        </span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <?php include 'includes/footer.php'; ?>

</body>
</html>