<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: iniciar_sesion01.php");
    exit();
}

if (isset($_POST['accion'])) {
    $id_libro = $_POST['id_libro'];

    if ($_POST['accion'] === 'eliminar') {
        unset($_SESSION['carrito'][$id_libro]);
    } elseif ($_POST['accion'] === 'actualizar' && isset($_POST['cantidad'])) {
        $cantidad = max(1, intval($_POST['cantidad']));
        if (isset($_SESSION['carrito'][$id_libro])) {
            $_SESSION['carrito'][$id_libro]['cantidad'] = $cantidad;
        }
    }
}

header("Location: carrito.php");
exit();
