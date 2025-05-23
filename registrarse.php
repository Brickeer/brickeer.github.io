<?php

insertado($_POST['nombre'],$_POST['correo'],$_POST['contrasena'],$_POST['direccion'],$_POST['telefono']);

function insertado($nombre,$correo,$contrasena,$direccion,$telefono)
{
    include("conexion.php");
    $contrasena = $_POST['contrasena'];
    $sentencia = "INSERT INTO usuarios (nombre, correo, contrasena, direccion, telefono) VALUES ('".$nombre."', '".$correo."', '".$contrasena."', '".$direccion."', '".$telefono."')";
    $resultado = $enlace->query($sentencia) or die("Error de datos".mysqli_error($enlace));
}
?>
<script type = "text/javascript">
alert("Se ha registrado el usuario correctamente");
window.location.href='iniciar_sesion01.php';
</script>