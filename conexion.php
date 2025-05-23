<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "libreriaweb";
$enlace = new mysqli($host, $usuario, $contrasena, $base_datos);
if($enlace->connect_error){
    die("Conexion fallida: ". $enlace->connect_error);

}
?>      