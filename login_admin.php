<?php
session_start();

// Configuración de credenciales de acceso
$admin_usuario_valido = "admin";
$admin_password_valido = "Juan160309";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['admin_user'] ?? '';
    $pass = $_POST['admin_pass'] ?? '';

    if ($user === $admin_usuario_valido && $pass === $admin_password_valido) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = $user;
        header('Location: citas_admin.php');
        exit;
    } else {
        echo "<script>
            alert('Credenciales incorrectas. Verifique el usuario y la contraseña.');
            window.location.href = 'index.php';
        </script>";
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}
?>