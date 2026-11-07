<?php
session_start();

// Verificación de acceso para administradores logueados
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Lógica de Cierre de Sesión hacia el Index
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

// Conexión a la base de datos
$host = 'localhost';
$dbname = 'mr2_dental_solutions';
$username = 'root';
$password = '';

$error_msg = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // AUTO-VERIFICACIÓN: Crea la columna 'atendido' automáticamente si no existe en la BD
    $checkCol = $pdo->query("SHOW COLUMNS FROM citas LIKE 'atendido'");
    if ($checkCol->rowCount() == 0) {
        $pdo->exec("ALTER TABLE citas ADD COLUMN atendido TINYINT(1) DEFAULT 0");
    }

} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}

// Lógica para marcar como atendido / pendiente (Alternar estado)
if (isset($_GET['atender'])) {
    $id_atender = intval($_GET['atender']);
    $estado_actual = isset($_GET['estado']) ? intval($_GET['estado']) : 0;
    $nuevo_estado = ($estado_actual == 1) ? 0 : 1; 
    try {
        $stmt_att = $pdo->prepare("UPDATE citas SET atendido = ? WHERE id = ?");
        $stmt_att->execute([$nuevo_estado, $id_atender]);
        header("Location: citas_admin.php");
        exit;
    } catch (PDOException $e) {
        $error_msg = "Error al actualizar estado: " . $e->getMessage();
    }
}

// Lógica para eliminar cita si se solicita por GET
if (isset($_GET['eliminar'])) {
    $id_eliminar = intval($_GET['eliminar']);
    try {
        $stmt_del = $pdo->prepare("DELETE FROM citas WHERE id = ?");
        $stmt_del->execute([$id_eliminar]);
        header("Location: citas_admin.php?eliminado=1");
        exit;
    } catch (PDOException $e) {
        $error_msg = "Error al eliminar: " . $e->getMessage();
    }
}

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'todas';

try {
    // Consultas separadas para el reporte y la visualización organizada
    $stmt_pendientes_query = $pdo->query("SELECT * FROM citas WHERE atendido = 0 OR atendido IS NULL ORDER BY fecha_cita ASC, hora_cita ASC");
    $citas_pendientes = $stmt_pendientes_query->fetchAll(PDO::FETCH_ASSOC);

    $stmt_atendidas_query = $pdo->query("SELECT * FROM citas WHERE atendido = 1 ORDER BY fecha_cita DESC, hora_cita DESC");
    $citas_atendidas = $stmt_atendidas_query->fetchAll(PDO::FETCH_ASSOC);

    // Lista general para la vista filtrada de la interfaz
    if ($filtro === 'pendientes') {
        $citas = $citas_pendientes;
    } elseif ($filtro === 'atendidas') {
        $citas = $citas_atendidas;
    } else {
        $stmt = $pdo->query("SELECT * FROM citas ORDER BY atendido ASC, fecha_cita ASC, hora_cita ASC");
        $citas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $total_citas_pendientes = count($citas_pendientes);
    $total_citas_atendidas = count($citas_atendidas);

} catch (PDOException $e) {
    $citas = [];
    $citas_pendientes = [];
    $citas_atendidas = [];
    $total_citas_pendientes = 0;
    $total_citas_atendidas = 0;
    $error_msg = "Error al consultar las citas: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Citas y Reportes - Panel Admin M&R²</title>
    
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

        /* ESTILOS PARA IMPRESIÓN Y PDF DIVIDIDO */
        .print-only-section { display: none; }

        @media print {
            body { background: white !important; color: black !important; }
            header, .no-print, footer { display: none !important; }
            .glass-card { background: white !important; border: none !important; box-shadow: none !important; margin-bottom: 30px !important; }
            table { width: 100% !important; border-collapse: collapse !important; margin-top: 10px; }
            th, td { border: 1px solid #cbd5e1 !important; padding: 8px !important; color: black !important; font-size: 11px !important; }
            th { background-color: #f1f5f9 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            .print-header { display: block !important; margin-bottom: 15px; text-align: center; }
            .print-only-section { display: block !important; }
            .screen-only-view { display: none !important; }
            .print-page-break { page-break-before: always; }
        }
        .print-header { display: none; }
    </style>
</head>
<body class="text-slate-800 dark:text-slate-100 font-sans antialiased min-h-screen flex flex-col">

    <!-- NAVBAR DE ADMINISTRACIÓN (SIN BOTÓN DE INICIO) -->
    <header class="sticky top-4 z-40 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 no-print">
        <div class="glass-premium rounded-2xl px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="Archivos Multimedia/M&R2 Logo.png" alt="Logo" class="h-10 w-auto object-contain">
                <div>
                    <h1 class="font-serif font-bold text-base sm:text-lg text-slate-900 dark:text-white">Panel Administrativo</h1>
                    <p class="text-xs text-dental-600 dark:text-dental-400 font-medium">M&R² Dental Solutions</p>
                </div>
            </div>
            <div>
                <a href="citas_admin.php?logout=1" class="px-4 py-2.5 rounded-xl bg-rose-500/10 hover:bg-rose-500 text-rose-600 hover:text-white text-xs font-bold transition-all border border-rose-500/20 shadow-sm">
                    <i class="fa-solid fa-right-from-bracket mr-1.5"></i> Cerrar Sesión
                </a>
            </div>
        </div>
    </header>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- Encabezado y Métricas -->
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between mb-8 gap-6 no-print">
            <div>
                <span class="px-4 py-1 rounded-full bg-dental-500/10 text-dental-600 dark:text-dental-400 text-xs font-bold uppercase tracking-widest border border-dental-500/20 mb-2 inline-block">
                    Módulo de Citas & Reportes
                </span>
                <h2 class="font-serif text-3xl font-extrabold text-white">Control y Generación de Reportes</h2>
                <p class="text-sm text-slate-200 mt-1">Gestione las citas odontológicas e imprima o guarde reportes divididos en PDF.</p>
            </div>

            <!-- Botones de Reportes PDF e impresión -->
            <div class="flex flex-wrap items-center gap-3">
                <button onclick="window.print();" class="px-5 py-3 rounded-2xl bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold shadow-lg transition-all flex items-center gap-2">
                    <i class="fa-solid fa-file-pdf"></i> Imprimir / Guardar Reporte PDF
                </button>
                <a href="agendar.php" target="_blank" class="px-5 py-3 rounded-2xl bg-gradient-to-r from-dental-500 to-dental-700 hover:from-dental-600 hover:to-dental-800 text-white text-xs font-bold shadow-lg shadow-dental-500/30 transition-all flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Nueva Cita
                </a>
            </div>
        </div>

        <!-- Tarjetas de Métricas y Filtros Rápidos (Solo pantalla) -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6 no-print screen-only-view">
            <a href="citas_admin.php?filtro=todas" class="glass-card p-4 rounded-2xl flex items-center gap-4 hover:border-dental-400 transition-all <?= $filtro === 'todas' ? 'ring-2 ring-dental-500' : '' ?>">
                <div class="w-12 h-12 rounded-xl bg-dental-500/10 text-dental-600 dark:text-dental-400 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 font-bold uppercase">Todas las Citas</p>
                    <p class="text-xl font-extrabold text-slate-900 dark:text-white"><?= count($citas_pendientes) + count($citas_atendidas) ?></p>
                </div>
            </a>

            <a href="citas_admin.php?filtro=pendientes" class="glass-card p-4 rounded-2xl flex items-center gap-4 hover:border-amber-400 transition-all <?= $filtro === 'pendientes' ? 'ring-2 ring-amber-500' : '' ?>">
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 font-bold uppercase">Citas Pendientes</p>
                    <p class="text-xl font-extrabold text-slate-900 dark:text-white"><?= $total_citas_pendientes ?></p>
                </div>
            </a>

            <a href="citas_admin.php?filtro=atendidas" class="glass-card p-4 rounded-2xl flex items-center gap-4 hover:border-emerald-400 transition-all <?= $filtro === 'atendidas' ? 'ring-2 ring-emerald-500' : '' ?>">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 font-bold uppercase">Citas Realizadas (Atendidas)</p>
                    <p class="text-xl font-extrabold text-slate-900 dark:text-white"><?= $total_citas_atendidas ?></p>
                </div>
            </a>
        </div>

        <?php if (!empty($error_msg)): ?>
            <div class="mb-6 p-4 rounded-2xl bg-rose-500/20 border border-rose-500/40 text-rose-200 text-sm font-semibold flex items-center gap-3 backdrop-blur-md no-print">
                <i class="fa-solid fa-triangle-exclamation text-lg"></i> <?= htmlspecialchars($error_msg) ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['eliminado'])): ?>
            <div class="mb-6 p-4 rounded-2xl bg-emerald-500/20 border border-emerald-500/40 text-emerald-200 text-sm font-semibold flex items-center gap-3 backdrop-blur-md no-print">
                <i class="fa-solid fa-circle-check text-lg"></i> Cita eliminada correctamente de la base de datos.
            </div>
        <?php endif; ?>

        <!-- Encabezado Institucional Exclusivo para el Reporte PDF -->
        <div class="print-header">
            <h1 style="font-size: 22px; font-weight: bold; margin-bottom: 3px;">M&R² Dental Solutions</h1>
            <p style="font-size: 13px; color: #555; margin-bottom: 3px;">Reporte Oficial de Citas Odontológicas</p>
            <p style="font-size: 11px; color: #777;">Fecha de emisión: <?= date('d/m/Y h:i A') ?></p>
            <hr style="margin-top: 8px; border: 0; border-top: 1px solid #ccc;">
        </div>

        <!-- ================= VISTA NORMAL EN PANTALLA (Según Filtro) ================= -->
        <div class="screen-only-view">
            <div class="glass-card rounded-3xl overflow-hidden border border-dental-300/40 dark:border-slate-800">
                <div class="p-4 bg-slate-100/50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center">
                    <h3 class="font-bold text-sm text-slate-700 dark:text-slate-200 uppercase tracking-wider">
                        <i class="fa-solid fa-list mr-2 text-dental-500"></i> Vista actual: 
                        <span class="text-dental-600 dark:text-dental-400"><?= ucfirst($filtro) ?></span>
                    </h3>
                    <span class="text-xs text-slate-500"><?= count($citas) ?> registros encontrados</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-100/70 dark:bg-slate-800/80 border-b border-slate-200/60 dark:border-slate-800 text-xs uppercase tracking-wider text-slate-600 dark:text-slate-300 font-bold">
                                <th class="py-4 px-6">Paciente / Teléfono</th>
                                <th class="py-4 px-6">Servicio</th>
                                <th class="py-4 px-6">Odontólogo</th>
                                <th class="py-4 px-6">Fecha y Hora</th>
                                <th class="py-4 px-6">Motivo / Historial</th>
                                <th class="py-4 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200/50 dark:divide-slate-800/50 text-sm">
                            <?php if (count($citas) > 0): ?>
                                <?php foreach ($citas as $cita): 
                                    $es_atendido = isset($cita['atendido']) && intval($cita['atendido']) === 1;
                                ?>
                                <tr class="hover:bg-dental-500/5 dark:hover:bg-slate-800/40 transition-colors <?= $es_atendido ? 'opacity-50 bg-slate-100/40 dark:bg-slate-900/40' : '' ?>">
                                    <td class="py-4 px-6">
                                        <p class="font-bold text-slate-900 dark:text-white <?= $es_atendido ? 'line-through decoration-rose-500 decoration-2' : '' ?>"><?= htmlspecialchars($cita['nombre_paciente']) ?></p>
                                        <p class="text-xs text-dental-600 dark:text-dental-400 font-medium <?= $es_atendido ? 'line-through' : '' ?>"><i class="fa-solid fa-phone mr-1"></i><?= htmlspecialchars($cita['telefono_tutor']) ?></p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 rounded-full bg-dental-500/10 text-dental-700 dark:text-dental-300 text-xs font-semibold border border-dental-500/20 <?= $es_atendido ? 'line-through' : '' ?>"><?= htmlspecialchars($cita['servicio']) ?></span>
                                    </td>
                                    <td class="py-4 px-6 text-slate-700 dark:text-slate-300 font-medium <?= $es_atendido ? 'line-through' : '' ?>"><?= htmlspecialchars($cita['odontologo']) ?></td>
                                    <td class="py-4 px-6">
                                        <p class="font-semibold text-slate-900 dark:text-white <?= $es_atendido ? 'line-through' : '' ?>"><i class="fa-regular fa-calendar mr-1 text-dental-500"></i><?= date('d/m/Y', strtotime($cita['fecha_cita'])) ?></p>
                                        <p class="text-xs text-slate-500 mt-0.5 <?= $es_atendido ? 'line-through' : '' ?>"><i class="fa-regular fa-clock mr-1"></i><?= date('h:i A', strtotime($cita['hora_cita'])) ?></p>
                                    </td>
                                    <td class="py-4 px-6 text-xs text-slate-600 dark:text-slate-400 max-w-xs truncate <?= $es_atendido ? 'line-through' : '' ?>">
                                        <?= htmlspecialchars($cita['motivo']) ?: 'Sin motivo especificado' ?>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="citas_admin.php?atender=<?= $cita['id'] ?>&estado=<?= isset($cita['atendido']) ? $cita['atendido'] : 0 ?>" 
                                               title="<?= $es_atendido ? 'Marcar como pendiente' : 'Marcar como atendido' ?>" 
                                               class="p-2.5 rounded-xl transition-all shadow-sm <?= $es_atendido ? 'bg-emerald-500 text-white hover:bg-emerald-600' : 'bg-slate-200/60 dark:bg-slate-800 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-500 hover:text-white' ?>">
                                                <i class="fa-solid <?= $es_atendido ? 'fa-check-double' : 'fa-check' ?>"></i>
                                            </a>
                                            <a href="citas_admin.php?eliminar=<?= $cita['id'] ?>" onclick="return confirm('¿Está seguro de que desea eliminar esta cita?');" title="Eliminar Registro" class="p-2.5 rounded-xl bg-slate-200/60 dark:bg-slate-800 text-rose-500 hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="py-16 text-center text-slate-400">
                                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-slate-200/50 dark:bg-slate-800 flex items-center justify-center text-2xl text-slate-400">
                                            <i class="fa-solid fa-folder-open"></i>
                                        </div>
                                        <p class="font-semibold text-slate-600 dark:text-slate-300">No hay citas registradas</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ================= VISTA DE IMPRESIÓN / PDF (SECCIÓN 1: PENDIENTES, SECCIÓN 2: ATENDIDAS) ================= -->
        <div class="print-only-section">
            
            <!-- SECCIÓN 1: CITAS PENDIENTES (EN ESPERA) -->
            <div style="margin-bottom: 30px;">
                <h3 style="font-size: 15px; font-weight: bold; background: #e0f2fe; padding: 6px 10px; border-left: 4px solid #0284c7; margin-bottom: 8px;">
                    1. Citas Pendientes (En Espera) [Total: <?= count($citas_pendientes) ?>]
                </h3>
                <table>
                    <thead>
                        <tr>
                            <th>Paciente / Teléfono</th>
                            <th>Servicio</th>
                            <th>Odontólogo</th>
                            <th>Fecha y Hora</th>
                            <th>Motivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($citas_pendientes) > 0): ?>
                            <?php foreach ($citas_pendientes as $cp): ?>
                            <tr>
                                <td><strong><?= htmlspecialchars($cp['nombre_paciente']) ?></strong><br><span style="color: #66ff; font-size: 10px;"><?= htmlspecialchars($cp['telefono_tutor']) ?></span></td>
                                <td><?= htmlspecialchars($cp['servicio']) ?></td>
                                <td><?= htmlspecialchars($cp['odontologo']) ?></td>
                                <td><?= date('d/m/Y', strtotime($cp['fecha_cita'])) ?> - <?= date('h:i A', strtotime($cp['hora_cita'])) ?></td>
                                <td><?= htmlspecialchars($cp['motivo']) ?: 'N/D' ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5" style="text-align: center; color: #777;">No hay citas pendientes registradas.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- SALTO DE PÁGINA PARA EL REPORTE PDF -->
            <div class="print-page-break"></div>

            <!-- SECCIÓN 2: CITAS ATENDIDAS (REALIZADAS) -->
            <div>
                <h3 style="font-size: 15px; font-weight: bold; background: #d1fae5; padding: 6px 10px; border-left: 4px solid #059669; margin-bottom: 8px;">
                    2. Citas Ya Realizadas (Atendidas) [Total: <?= count($citas_atendidas) ?>]
                </h3>
                <table>
                    <thead>
                        <tr>
                            <th>Paciente / Teléfono</th>
                            <th>Servicio</th>
                            <th>Odontólogo</th>
                            <th>Fecha y Hora</th>
                            <th>Motivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($citas_atendidas) > 0): ?>
                            <?php foreach ($citas_atendidas as $ca): ?>
                            <tr>
                                <td><strong><?= htmlspecialchars($ca['nombre_paciente']) ?></strong><br><span style="font-size: 10px;"><?= htmlspecialchars($ca['telefono_tutor']) ?></span></td>
                                <td><?= htmlspecialchars($ca['servicio']) ?></td>
                                <td><?= htmlspecialchars($ca['odontologo']) ?></td>
                                <td><?= date('d/m/Y', strtotime($ca['fecha_cita'])) ?> - <?= date('h:i A', strtotime($ca['hora_cita'])) ?></td>
                                <td><?= htmlspecialchars($ca['motivo']) ?: 'N/D' ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5" style="text-align: center; color: #777;">No hay citas atendidas registradas.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950/95 backdrop-blur-md text-slate-400 py-6 text-center text-xs border-t border-slate-800 mt-auto no-print">
        &copy; 2026 M&R² Dental Solutions. Panel Administrativo. Todos los derechos reservados.
    </footer>
</body>
</html>