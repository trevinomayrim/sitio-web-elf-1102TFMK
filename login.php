<?php
include 'config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    $sql = "SELECT id, nombre_completo, contrasena FROM usuarios WHERE correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $nombre, $hash);
        $stmt->fetch();

        if (password_verify($contrasena, $hash)) {
            $_SESSION['usuario_id'] = $id;
            $_SESSION['usuario_nombre'] = $nombre;
            header("Location: index.php");
            exit;
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "El correo no existe";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión — e.l.f.</title>
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
            <h2>Iniciar Sesión</h2>

            <?php if (!empty($error)): ?>
                <p class="error-msg"><?php echo $error; ?></p>
            <?php endif; ?>

            <form method="POST" class="form-auth">
                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" required>

                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>

                <button type="submit" class="btn-auth">Entrar</button>
            </form>

            <p class="auth-pie">No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
        </div>
    </section>

    <footer class="footer-inicio">
        <p>&copy; 2025 e.l.f. Tienda de belleza. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
