<?php
session_start();
include("conexion.php");

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    header("Location: iniciar_sesion01.php");
    exit();
}

// Verificar que se haya enviado un ID de libro válido
if (!isset($_POST['id_libro']) || !is_numeric($_POST['id_libro'])) {
    header("Location: index.php");
    exit();
}

$id_libro = intval($_POST['id_libro']);

// Consultar el libro desde la base de datos
$consulta = "SELECT * FROM libros WHERE id_libro = $id_libro";
$resultado = $enlace->query($consulta);
$libro = $resultado->fetch_assoc();

if (!$libro) {
    header("Location: index.php");
    exit(); // Libro no encontrado, redirigir
}

// Iniciar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Agregar al carrito o aumentar cantidad
if (isset($_SESSION['carrito'][$id_libro])) {
    $_SESSION['carrito'][$id_libro]['cantidad'] += 1;
} else {
    $_SESSION['carrito'][$id_libro] = [
        'titulo' => $libro['titulo'],
        'precio' => $libro['precio'],
        'cantidad' => 1
    ];
}

header("Location: carrito.php");
exit();
?>


