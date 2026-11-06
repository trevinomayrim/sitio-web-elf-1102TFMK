<?php
include 'config.php';
if (!esta_logueado()) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta — e.l.f.</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <header class="header-inicio">
        <div class="header-contenido">
            <a href="index.php" class="logo">e.l.f.</a>
            <nav class="nav-principal">
                <a href="index.php">Inicio</a>
                <a href="categoria.php?id=1">Rostro</a>
                <a href="categoria.php?id=2">Labiales</a>
                <a href="categoria.php?id=3">Ojos</a>
            </nav>
            <div class="auth-botones">
                <a href="cerrar_sesion.php" class="btn-cuenta">Cerrar Sesión</a>
            </div>
        </div>
    </header>

    <section class="pagina-auth">
        <div class="auth-tarjeta">
            <h2>Mi Cuenta</h2>
            <p>Bienvenido a tu cuenta 🎉</p>
            <p>Aquí podrás ver tus datos y tus pedidos muy pronto.</p>
            <br>
            <a href="cerrar_sesion.php" class="btn-auth" style="display:inline-block; text-align:center;">Cerrar sesión</a>
        </div>
    </section>

    <footer class="footer-inicio">
        <p>&copy; 2025 e.l.f. Tienda de belleza. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
