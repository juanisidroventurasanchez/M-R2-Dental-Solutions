<!DOCTYPE html>
<html lang="es" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita - M&R² Dental Solutions</title>
    
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

        /* Clase para difuminar el contenido del formulario al mostrar la alerta */
        .blur-content {
            filter: blur(8px);
            pointer-events: none;
            user-select: none;
            transition: filter 0.3s ease;
        }

        /* Animación de zoom para la tarjeta central */
        @keyframes zoomModal {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .modal-animate { animation: zoomModal 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        /* Estilización moderna para inputs de fecha y hora */
        input[type="date"]::-webkit-calendar-picker-indicator,
        input[type="time"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            filter: invert(0.5);
            transition: transform 0.2s ease;
        }
        .dark input[type="date"]::-webkit-calendar-picker-indicator,
        .dark input[type="time"]::-webkit-calendar-picker-indicator {
            filter: invert(0.9);
        }
        input[type="date"]::-webkit-calendar-picker-indicator:hover,
        input[type="time"]::-webkit-calendar-picker-indicator:hover {
            transform: scale(1.15);
        }
    </style>
</head>
<body class="text-slate-800 dark:text-slate-100 font-sans antialiased min-h-screen flex flex-col relative">

    <!-- MODAL / TARJETA CENTRAL FLOTANTE -->
    <div id="modalOverlay" class="fixed inset-0 z-50 bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-300">
        <div id="modalCard" class="bg-white dark:bg-slate-900 border border-dental-300/50 dark:border-slate-800 rounded-3xl p-8 max-w-md w-full shadow-2xl text-center transform scale-90 transition-all duration-300">
            <div id="modalIconContainer" class="w-16 h-16 mx-auto mb-5 rounded-2xl flex items-center justify-center text-3xl shadow-inner">
                <!-- El ícono se inyecta dinámicamente -->
            </div>
            <h3 id="modalTitle" class="font-serif text-2xl font-bold text-slate-900 dark:text-white mb-2">Título</h3>
            <p id="modalMessage" class="text-slate-600 dark:text-slate-300 text-sm mb-8 leading-relaxed">Mensaje de notificación...</p>
            <button onclick="cerrarModal()" class="w-full py-3.5 rounded-xl bg-dental-500 hover:bg-dental-600 text-white font-bold text-sm tracking-wide transition-all shadow-lg shadow-dental-500/30">
                Entendido
            </button>
        </div>
    </div>

    <!-- CONTENEDOR PRINCIPAL QUE SE DIFUMINA -->
    <div id="appContainer" class="flex flex-col min-h-screen transition-all duration-300">

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

        <!-- FORMULARIO DE CITAS -->
        <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl w-full bg-white dark:bg-slate-900 rounded-3xl shadow-2xl border border-dental-300/40 dark:border-slate-800 p-8 sm:p-10">
                
                <div class="text-center mb-8">
                    <span class="px-4 py-1.5 rounded-full bg-dental-500/10 text-dental-600 dark:text-dental-400 text-xs font-bold uppercase tracking-widest border border-dental-500/20">
                        Sistema de Reservas
                    </span>
                    <h1 class="font-serif text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-3">Agendar Cita Odontológica</h1>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Complete los datos para programar su atención especializada.</p>
                </div>

                <form action="procesar_cita.php" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Nombre del Paciente -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">Nombre Completo del Paciente</label>
                            <input type="text" id="nombre_paciente" name="nombre_paciente" required placeholder="Ej. Ana Pérez" class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-dental-500 outline-none">
                        </div>
                        <!-- Teléfono del Tutor / Paciente -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">Teléfono de Contacto / Tutor</label>
                            <input type="tel" id="telefono_tutor" name="telefono_tutor" required placeholder="(829) 000-0000" maxlength="14" class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-dental-500 outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Servicio / Especialidad -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">Servicio o Especialidad</label>
                            <select name="servicio" required class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-dental-500 outline-none">
                                <option value="">Seleccione un servicio...</option>
                                <option value="Odontología General">Odontología General</option>
                                <option value="Rehabilitación Bucal">Rehabilitación Bucal</option>
                                <option value="Ortodoncia">Ortodoncia y Brackets</option>
                                <option value="Odontopediatría">Odontopediatría</option>
                                <option value="Endodoncia">Endodoncia (Tratamiento de Canal)</option>
                                <option value="Cirugía Maxilofacial">Cirugía Maxilofacial</option>
                                <option value="Implantología">Implantes Dentales</option>
                                <option value="Periodoncia">Periodoncia</option>
                            </select>
                        </div>
                        <!-- Odontólogo Asignado -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">Odontólogo Especialista</label>
                            <select name="odontologo" required class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-dental-500 outline-none">
                                <option value="">Seleccione especialista...</option>
                                <option value="Dr. Roelvi Sánchez">Dr. Roelvi Sánchez - Ortodoncia</option>
                                <option value="Dra. Manssffiel Rodríguez">Dra. Manssffiel Rodríguez - Endodoncia</option>
                                <option value="Dr. Ratzel Cruz">Dr. Ratzel Cruz - Rehabilitación Bucal</option>
                                <option value="Dra. Liliana Díaz">Dra. Liliana Díaz - Periodoncia e Implantes</option>
                                <option value="Dr. Luis Rojas">Dr. Luis Rojas - Cirugía Maxilofacial</option>
                                <option value="Dra. Alba Rosario">Dra. Alba Rosario - Odontopediatra</option>
                                <option value="Dra. Franneisy Arias">Dra. Franneisy Arias - Odontóloga General</option>
                            </select> 
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Fecha con restricción de días anteriores y estilo mejorado -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">Fecha Preferida</label>
                            <div class="relative">
                                <input type="date" id="fecha_cita" name="fecha_cita" required class="w-full pl-11 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-semibold text-slate-800 dark:text-slate-100 focus:ring-2 focus:ring-dental-500 focus:border-dental-500 outline-none cursor-pointer transition-all shadow-sm">
                                <i class="fa-regular fa-calendar-days absolute left-4 top-1/2 -translate-y-1/2 text-dental-500 text-base pointer-events-none"></i>
                            </div>
                        </div>
                        <!-- Hora con estilo mejorado -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">Hora de la Cita</label>
                            <div class="relative">
                                <input type="time" id="hora_cita" name="hora_cita" required class="w-full pl-11 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-semibold text-slate-800 dark:text-slate-100 focus:ring-2 focus:ring-dental-500 focus:border-dental-500 outline-none cursor-pointer transition-all shadow-sm">
                                <i class="fa-regular fa-clock absolute left-4 top-1/2 -translate-y-1/2 text-dental-500 text-base pointer-events-none"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Historial Básico / Motivo -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">Motivo de Consulta / Historial Básico</label>
                        <textarea name="motivo" rows="3" placeholder="Describa brevemente molestias, síntomas o si padece alguna condición..." class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-dental-500 outline-none resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-dental-500 to-dental-700 hover:from-dental-600 hover:to-dental-800 text-white font-bold shadow-lg shadow-dental-500/30 transition-all text-sm tracking-wide">
                        <i class="fa-solid fa-calendar-check mr-2"></i> Confirmar y Reservar Cita
                    </button>
                </form>
            </div>
        </main>

        <!-- FOOTER -->
        <footer class="bg-slate-950/95 text-slate-400 py-6 text-center text-xs border-t border-slate-800">
            &copy; 2026 M&R² Dental Solutions. Todos los derechos reservados. Juan Isidro Ventura.
        </footer>
    </div>

    <!-- SCRIPT DE VALIDACIÓN, FORMATO, DÍAS MÍNIMOS Y TARJETA CENTRAL CON DIFUMINADO -->
    <script>
        // Establecer fecha mínima dinámicamente para bloquear días anteriores
        document.addEventListener('DOMContentLoaded', function () {
            const inputFecha = document.getElementById('fecha_cita');
            const hoy = new Date();
            const yyyy = hoy.getFullYear();
            const mm = String(hoy.getMonth() + 1).padStart(2, '0');
            const dd = String(hoy.getDate()).padStart(2, '0');
            
            const fechaMinima = `${yyyy}-${mm}-${dd}`;
            inputFecha.min = fechaMinima;
        });

        // Función para mostrar la tarjeta central y difuminar el fondo
        function mostrarModal(titulo, mensaje, tipo = 'error') {
            const overlay = document.getElementById('modalOverlay');
            const card = document.getElementById('modalCard');
            const appContainer = document.getElementById('appContainer');
            
            document.getElementById('modalTitle').textContent = titulo;
            document.getElementById('modalMessage').textContent = mensaje;

            const iconContainer = document.getElementById('modalIconContainer');
            if (tipo === 'error') {
                iconContainer.className = "w-16 h-16 mx-auto mb-5 rounded-2xl bg-rose-500/10 text-rose-500 flex items-center justify-center text-3xl shadow-inner";
                iconContainer.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i>';
            } else {
                iconContainer.className = "w-16 h-16 mx-auto mb-5 rounded-2xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center text-3xl shadow-inner";
                iconContainer.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
            }

            // Aplicar difuminado al fondo
            appContainer.classList.add('blur-content');

            // Mostrar modal
            overlay.style.opacity = '1';
            overlay.style.pointerEvents = 'auto';
            card.style.transform = 'scale(1)';
        }

        // Función para cerrar el modal y quitar el difuminado
        function cerrarModal() {
            const overlay = document.getElementById('modalOverlay');
            const card = document.getElementById('modalCard');
            const appContainer = document.getElementById('appContainer');

            overlay.style.opacity = '0';
            overlay.style.pointerEvents = 'none';
            card.style.transform = 'scale(0.9)';

            // Quitar difuminado
            appContainer.classList.remove('blur-content');
        }

        // Validación y formato del Teléfono
        const inputTelefono = document.getElementById('telefono_tutor');

        inputTelefono.addEventListener('input', function (e) {
            let valor = e.target.value;
            
            // Verificar si contiene letras o símbolos no permitidos
            if (/[^0-9\s\-\(\)]/.test(valor) || /[a-zA-ZáéíóúÁÉÍÓÚñÑ]/.test(valor)) {
                mostrarModal("Carácter Inválido", "En el campo teléfono solo se aceptan números.", "error");
                e.target.value = valor.replace(/[^0-9\s\-\(\)]|[a-zA-ZáéíóúÁÉÍÓÚñÑ]/g, '');
                return;
            }

            // Aplicar formato automático (829) 838-9692
            let numeros = valor.replace(/\D/g, '');
            if (numeros.length > 10) numeros = numeros.slice(0, 10);
            
            let formateado = '';
            if (numeros.length > 0) {
                formateado = '(' + numeros.substring(0, 3);
            }
            if (numeros.length >= 4) {
                formateado += ') ' + numeros.substring(3, 6);
            }
            if (numeros.length >= 7) {
                formateado += '-' + numeros.substring(6, 10);
            }
            e.target.value = formateado;
        });

        // Validación del Nombre (Solo letras y espacios)
        const inputNombre = document.getElementById('nombre_paciente');

        inputNombre.addEventListener('input', function (e) {
            let valor = e.target.value;
            
            // Verificar si contiene números
            if (/[0-9]/.test(valor)) {
                mostrarModal("Carácter Inválido", "En el campo nombre solo se aceptan letras.", "error");
                e.target.value = valor.replace(/[0-9]/g, '');
                return;
            }
        });
    </script>
</body>
</html>