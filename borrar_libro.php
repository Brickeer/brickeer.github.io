<?php
borrar($_POST['id']);

function borrar($id_libro){
    include("conexion.php");
    $sentencia="delete from libros where id_libro=".$id_libro;
    $resultado=$enlace->query($sentencia) or die("Error de datos".mysqli_error($enlace));
}
?>

<script type="text/javascript">
alert("Se borro el articulo correctamente");
window.location.href='borrar_libro01.php';
</script>