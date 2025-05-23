<?php
session_start();
unset($_SESSION['carrito']);
echo "<script>alert('Compra realizada con éxito'); window.location.href='index.php';</script>";
?>
