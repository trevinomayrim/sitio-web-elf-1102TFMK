<?php
session_start();

// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$clave = "";
$base = "tienda_elf";

$conexion = new mysqli($servidor, $usuario, $clave, $base);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Función para verificar si está logueado
function esta_logueado() {
    return isset($_SESSION['usuario_id']);
}
?>
