<?php

$imagen_nombre = $_FILES['imagen']['name'];
$imagen_tmp = $_FILES['imagen']['tmp_name'];
$ruta = "imagenes/" . basename($imagen_nombre);
move_uploaded_file($imagen_tmp, $ruta);

insertado($_POST['id'], $_POST['titulo'], $_POST['autor'], $_POST['precio'], $_POST['isbn'], $_POST['categoria'], $_POST['editorial'], $_POST['idioma'], $_POST['anio_publicacion'], $ruta);

function insertado($ID_libro, $titulo, $autor, $precio, $isbn, $categoria, $editorial, $idioma, $anio_publicacion, $imagen)
{
    include("conexion.php");
    $sentencia = "INSERT INTO libros (ID_libro, titulo, autor, precio, isbn, categoria, editorial, idioma, anio_publicacion, imagen) VALUES ('" . $ID_libro . "', '" . $titulo . "', '" . $autor . "', '" . $precio . "', '" . $isbn . "', '" . $categoria . "', '" . $editorial . "', '" . $idioma . "', '" . $anio_publicacion . "', '" . $imagen . "')";
    $resultado = $enlace->query($sentencia) or die("Error de datos" . mysqli_error($enlace));
}
?>

<script type="text/javascript">
alert("se inserto el libro correctamente");
window.location.href = 'index.php';
</script>
