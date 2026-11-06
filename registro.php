<?php

include 'config.php';

$error = "";
$exito = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    if (empty($nombre) || empty($correo) || empty($contrasena)) {
        $error = "Todos los campos son obligatorios";
    } elseif (strlen($contrasena) < 6) {
        $error = "La contraseña debe tener al menos 6 caracteres";
    } else {
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre_completo, correo, contrasena) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sss", $nombre, $correo, $hash);

        if ($stmt->execute()) {
            $exito = "Cuenta creada correctamente. Ahora puedes iniciar sesión";
        } else {
            $error = "Error al crear la cuenta: " . $conexion->error;
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse — e.l.f.</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

           <header class="header-inicio">
        <div class="header-contenido">
            <a href="index.php" class="logo">e.l.f.</a>
            <a href="index.php" class="btn-inicio">Inicio</a>
        </div>
    </header>


    <section class="pagina-auth">
        <div class="auth-tarjeta">
            <h2>Crear Cuenta</h2>

            <?php if (!empty($error)): ?>
                <p class="error-msg"><?php echo $error; ?></p>
            <?php endif; ?>

            <?php if (!empty($exito)): ?>
                <p class="exito-msg"><?php echo $exito; ?></p>
            <?php endif; ?>

            <form method="POST" class="form-auth">
                <label for="nombre">Nombre Completo</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" required>

                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>

                <button type="submit" class="btn-auth">Crear Cuenta</button>
            </form>

            <p class="auth-pie">Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
        </div>
    </section>

    <footer class="footer-inicio">
        <p>&copy; 2025 e.l.f. Tienda de belleza. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
