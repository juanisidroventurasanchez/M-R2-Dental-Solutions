<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$dbname = 'mr2_dental_solutions';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}

// Verificar si los datos fueron enviados por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar y limpiar los campos del formulario
    $nombre_paciente = trim($_POST['nombre_paciente']);
    $telefono_tutor  = trim($_POST['telefono_tutor']);
    $servicio        = trim($_POST['servicio']);
    $odontologo      = trim($_POST['odontologo']);
    $fecha_cita      = trim($_POST['fecha_cita']);
    $hora_cita       = trim($_POST['hora_cita']);
    $motivo          = trim($_POST['motivo']);

    // Validar que los campos obligatorios no estén vacíos
    if (empty($nombre_paciente) || empty($telefono_tutor) || empty($servicio) || empty($odontologo) || empty($fecha_cita) || empty($hora_cita)) {
        echo "<script>alert('Por favor, complete todos los campos obligatorios.'); window.history.back();</script>";
        exit;
    }

    try {
        // Insertar los datos en la base de datos
        $sql = "INSERT INTO citas (nombre_paciente, telefono_tutor, servicio, odontologo, fecha_cita, hora_cita, motivo, atendido) 
                VALUES (:nombre, :telefono, :servicio, :odontologo, :fecha, :hora, :motivo, 0)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre'     => $nombre_paciente,
            ':telefono'   => $telefono_tutor,
            ':servicio'   => $servicio,
            ':odontologo' => $odontologo,
            ':fecha'      => $fecha_cita,
            ':hora'       => $hora_cita,
            ':motivo'     => $motivo
        ]);

        // Número de WhatsApp actualizado de la clínica (+1 829-813-9976)
        $telefono_whatsapp = "18298139976";

        // Construir el mensaje personalizado para WhatsApp
        $mensaje = "¡Hola! He registrado una nueva cita en M&R² Dental Solutions:\n\n" .
                   "*Paciente:* {$nombre_paciente}\n" .
                   "*Teléfono:* {$telefono_tutor}\n" .
                   "*Servicio:* {$servicio}\n" .
                   "*Especialista:* {$odontologo}\n" .
                   "*Fecha:* {$fecha_cita}\n" .
                   "*Hora:* {$hora_cita}\n" .
                   "*Motivo:* {$motivo}\n\n" .
                   "Por favor, confirmar disponibilidad.";

        // Codificar el mensaje para la URL de WhatsApp
        $mensaje_url = urlencode($mensaje);
        $link_whatsapp = "https://wa.me/{$telefono_whatsapp}?text={$mensaje_url}";

        // Redireccionar al usuario directamente al chat de WhatsApp con el mensaje listo
        echo "<script>
            alert('¡Cita registrada correctamente en el sistema!');
            window.location.href = '{$link_whatsapp}';
        </script>";
        exit;

    } catch (PDOException $e) {
        echo "<script>alert('Error al registrar la cita en la base de datos: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
        exit;
    }
} else {
    // Si intentan acceder directamente por URL, redirigir al formulario
    header('Location: agendar.php');
    exit;
}
?>