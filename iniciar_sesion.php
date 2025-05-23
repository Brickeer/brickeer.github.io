<?php
include("conexion.php");
session_start();
$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];
$consulta="select * from usuarios where correo='$correo' and contrasena='$contrasena'";
$resultado=$enlace->query($consulta);
if($resultado && $resultado->num_rows === 1){
    $usuario = $resultado->fetch_assoc();
    $_SESSION['id_usuario'] = $usuario['id_usuario'];
    $_SESSION['nombre'] = $usuario['nombre'];
    header("location: index.php");
    exit();
;}else{
    echo"<script>alert('Correo o contrasela incorrecta'); window.location.href='iniciar_sesion01.php';</script>";
}
?>
