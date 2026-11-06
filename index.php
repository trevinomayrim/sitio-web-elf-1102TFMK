<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio — e.l.f.</title>
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
            <?php if (!esta_logueado()): ?>
                <a href="login.php" class="btn-cuenta">Cuenta</a>
            <?php else: ?>
                <a href="perfil.php" class="btn-cuenta">Mi Cuenta</a>
                <a href="cerrar_sesion.php" class="btn-cuenta">Salir</a>
            <?php endif; ?>
        </div>
    </div>
</header>



    <section class="hero-inicio">
        <div class="hero-texto">
            <h1>Belleza para todos</h1>
            <p>Productos de belleza simples, bonitos y cruelty free para cada día.</p>
        </div>
    </section>

    <section id="categorias" class="categorias-inicio">
        <h2>Explora por categoría</h2>

       <div class="categorias-grid">
    <a href="categoria.php?id=1" class="categoria-tarjeta">
        <div class="categoria-imagen">
            <img src="imagenes/categoria_rostro.jpg" alt="Rostro">
        </div>
        <h3>Rostro</h3>
        <p>Bases, correctores, polvos y más</p>
    </a>

    <a href="categoria.php?id=2" class="categoria-tarjeta">
        <div class="categoria-imagen">
            <img src="imagenes/categoria_labiales.jpg" alt="Labiales">
        </div>
        <h3>Labiales</h3>
        <p>Labiales, brillos y tintes</p>
    </a>

    <a href="categoria.php?id=3" class="categoria-tarjeta">
        <div class="categoria-imagen">
            <img src="imagenes/categoria_ojos.jpg" alt="Ojos">
        </div>
        <h3>Ojos</h3>
        <p>Máscaras, delineadores y sombras</p>
    </a>
</div>

    </section>

    <footer class="footer-inicio">
        <p>&copy; 2025 e.l.f. Tienda de belleza. Todos los derechos reservados.</p>
    </footer>

</body>
</html>

