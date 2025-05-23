<?php
include("conexion.php");
$resultado = $enlace->query("SELECT * FROM libros");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Librería Online</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>

    <div class="BarraUp">
        <h1><a href="index.php"><img src="img/perro.jpg" alt width="250" height="250"></a></h1>
        <form class="barra-busqueda" action="buscar.php" method="GET">
        <input type="text" name="query" placeholder="Busca títulos, autores, categorías..."><button type="submit"><i class="fas fa-search"></i></button>
        </form>
        <a href="carrito.php"><img src="img/compras.png" alt="carrito" width="30"></a>
        <a href="agregar_libro01.php">Agregar Libro</a>
        <a href="borrar_libro01.php">Borrar Libro</a>
        <?php session_start(); ?>
        <?php if (isset($_SESSION['id_usuario'])): ?>
        <span>Bienvenid@, <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
        <?php else: ?>
        <a href="iniciar_sesion01.php"><img src="img/login.png" alt="iniciar sesion" width="30"></a>
        <?php endif; ?>
    </div>

    <div class="Barras">
        <h2>Libros Disponibles</h2>
        <?php while($libro = $resultado->fetch_assoc()): ?>
            <div class="libro">
                <?php if (!empty($libro['imagen'])): ?>
                    <img src="<?php echo htmlspecialchars($libro['imagen']); ?>" alt="Portada del libro" width="150">
                <?php else: ?>
                    <img src="imagenes/default.jpg" alt="Sin imagen" width="150">
                <?php endif; ?>
                <div class="contenedor-libros">
                <h3><?php echo htmlspecialchars($libro['titulo']); ?></h3>
                <p><strong>Autor:</strong> <?php echo htmlspecialchars($libro['autor']); ?></p>
                <p><strong>Precio:</strong> $<?php echo number_format($libro['precio'], 2); ?></p>
                <p><strong>Editorial:</strong> <?php echo htmlspecialchars($libro['editorial']); ?></p>
                <p><strong>Categoría:</strong> <?php echo htmlspecialchars($libro['categoria']); ?></p>
                <hr>
                    <form method="post" action="agregar_al_carrito.php">
                    <input type="hidden" name="id_libro" value="<?php echo $libro['id_libro']; ?>">
                    <button type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
        <div class="BarraDown">
        <p>Todos los derechos seran reservados. Libreria Online ©2025</p>
            <a href="https://www.facebook.com">Facebook</a><br>
            <a href="https://www.instagram.com">Instagram</a><br>
            <a href="https://www.x.com">X(Twitter)</a>
        </div>

</body>
</html>
