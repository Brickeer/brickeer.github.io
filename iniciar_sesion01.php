<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Iniciar Sesion</title>
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
        <form method="post" action="iniciar_sesion.php">
            <label>CORREO: <input type="text" name="correo" required placeholder="INGRESA TU CORREO ELECTRONICO"></label><br>
            <label>CONTRASEÑA: <input type="password" name="contrasena" required placeholder="INGRESA TU CONTRASEÑA"></label><br>
            SI NO TIENES CUENTA <a href="registrarse01.php">REGISTRATE </a>
            <button type="submit">INICIA SESION</button>
        </div>

        <div class="BarraDown">
        <p>Todos los derechos seran reservados. Libreria Online ©2025</p>
            <a href="https://www.facebook.com">Facebook</a><br>
            <a href="https://www.instagram.com">Instagram</a><br>
            <a href="https://www.x.com">X(Twitter)</a>
        </div>

</body>
</html>