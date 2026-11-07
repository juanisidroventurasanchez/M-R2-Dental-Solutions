<!DOCTYPE html>
<html lang="es" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipo Médico - M&R² Dental Solutions</title>
    
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
                    Staff Médico
                </div>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-4">
                    Nuestro Equipo de <span class="text-transparent bg-clip-text bg-gradient-to-r from-dental-200 via-dental-300 to-dental-400">Especialistas</span>
                </h1>
                <p class="text-base sm:text-lg text-slate-200 font-normal leading-relaxed">
                    Profesionales certificados con amplia trayectoria clínica en M&R² Dental Solutions.
                </p>
            </div>

            <!-- Cuadrícula de Doctores -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $doctores = [
                    ["Roelvis Sánchez Bautista", "Ortodoncia", "Archivos Multimedia/Dr. Sánchez.png"],
                    ["Manssffiel Rodríguez", "Endodoncia", "Archivos Multimedia/Dra. Rodríguez.png"],
                    ["Ratzel Cruz Peralta", "Rehabilitación Bucal", "Archivos Multimedia/Dr. Cruz.png"],
                    ["Liliana Díaz", "Periodoncia e Implante", "Archivos Multimedia/"],
                    ["Luis Rojas", "Cirugía Maxilofacial", "Archivos Multimedia/Dr. Rojas.png"],
                    ["Alba Rosario", "Odontopediatra", "Archivos Multimedia/"],
                    [" Franneisy Arias", "Odontologa General", "Archivos Multimedia/Dra. Arias.png"],
                ];
                foreach($doctores as $doc):
                    $tiene_foto = !empty($doc[2]) && $doc[2] !== 'Archivos Multimedia/';
                ?>
                <div class="glass-card p-8 rounded-3xl text-center flex flex-col items-center transform hover:-translate-y-2 hover:scale-[1.02] transition-all duration-300 group">
                    
                    <!-- Contenedor de la Fotografía o Icono de Usuario -->
                    <div class="relative w-32 h-32 mx-auto mb-6 rounded-full p-1.5 bg-gradient-to-tr from-dental-400 to-dental-600 shadow-xl group-hover:rotate-3 transition-transform duration-300">
                        <?php if ($tiene_foto): ?>
                            <img src="<?= $doc[2] ?>" alt="<?= $doc[0] ?>" 
                                 onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1622253692010-333f2da6031d?q=80&w=300&auto=format&fit=crop';" 
                                 class="w-full h-full object-cover rounded-full border-4 border-white dark:border-slate-900 shadow-inner">
                        <?php else: ?>
                            <div class="w-full h-full rounded-full border-4 border-white dark:border-slate-900 bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-400 dark:text-slate-500 shadow-inner">
                                <i class="fa-solid fa-user text-5xl"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Información del Especialista -->
                    <h3 class="text-xl font-serif font-bold text-slate-900 dark:text-white mb-2 group-hover:text-dental-600 dark:group-hover:text-dental-400 transition-colors">
                        <?= $doc[0] ?>
                    </h3>
                    <p class="text-sm font-semibold text-dental-600 dark:text-dental-400 mb-6 bg-dental-500/10 dark:bg-dental-500/20 px-4 py-1.5 rounded-full inline-block">
                        <?= $doc[1] ?>
                    </p>

                    <!-- Botón de Acción -->
                    <div class="mt-auto w-full pt-4 border-t border-slate-200/50 dark:border-slate-800">
                        <a href="agendar.php" class="inline-flex items-center justify-center gap-2 w-full py-2.5 rounded-xl bg-dental-500/10 hover:bg-dental-500 text-dental-600 dark:text-dental-300 hover:text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm">
                            <i class="fa-solid fa-calendar-check"></i> Agendar con este especialista
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <?php include 'includes/footer.php'; ?>

</body>
</html>