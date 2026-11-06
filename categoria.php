<?php
include 'config.php';

$id_categoria = isset($_GET['id']) ? intval($_GET['id']) : 1;

$nombres = [
    1 => 'Rostro',
    2 => 'Labiales',
    3 => 'Ojos'
];
$nombre_categoria = isset($nombres[$id_categoria]) ? $nombres[$id_categoria] : 'Categoría';

// Obtener hasta 10 productos de la categoría — columna correcta: categoria_id
$productos = [];
$sql = "SELECT nombre, descripcion, precio, imagen FROM productos WHERE categoria_id = ? LIMIT 10";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_categoria);
$stmt->execute();
$result = $stmt->get_result();

while ($fila = $result->fetch_assoc()) {
    $productos[] = $fila;
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nombre_categoria; ?> — e.l.f.</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <header class="header-inicio">
        <div class="header-contenido">
            <a href="index.php" class="logo">e.l.f.</a>
            <a href="index.php" class="btn-inicio">Inicio</a>
        </div>
    </header>

    <section class="pagina-categoria">
        <h1><?php echo $nombre_categoria; ?></h1>

        <?php if (empty($productos)): ?>
            <p class="sin-productos">No hay productos en esta categoría por ahora.</p>
        <?php else: ?>
            <div class="productos-grid">
                <?php foreach ($productos as $prod): ?>
                    <div class="producto-tarjeta">
                        <div class="producto-imagen">
                            <?php if (!empty($prod['imagen'])): ?>
                                <img src="imagenes/<?php echo $prod['imagen']; ?>" alt="<?php echo $prod['nombre']; ?>">
                            <?php else: ?>
                                <div class="imagen-vacia"></div>
                            <?php endif; ?>
                        </div>
                        <h3><?php echo $prod['nombre']; ?></h3>
                        <p class="producto-desc"><?php echo $prod['descripcion']; ?></p>
                        <p class="producto-precio">$<?php echo number_format($prod['precio'], 2); ?> USD</p>
                        <button class="btn-comprar">Comprar</button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <footer class="footer-inicio">
        <p>&copy; 2025 e.l.f. Tienda de belleza. Todos los derechos reservados.</p>
    </footer>

</body>
</html>

