<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Registrarse</title>
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
            <form method="post" action="registrarse.php">
                <label>NOMBRE COMPLETO: <input type="text" name="nombre" required placeholder="INGRESA TU NOMBRE COMPLETO"></label><br>
                <label>CORREO: <input type="text" name="correo" required placeholder="INGRESA TU CORREO ELECTRONICO"></label><br>
                <label>CONTRASEÑA: <input type="password" name="contrasena" required placeholder="INGRESA TU CONTRASEÑA"></label><br>
                <label>DIRRECCION DE TU RESIDENCIA: <input type="text" name="direccion" required placeholder="INGRESA TU DIRRECCION"></label><br>
                <label>NUMERO TELEFONICO: <input type="text" name="telefono" required placeholder="INGRESA TU NUMERO DE CELULAR"></label><br>
                <button type="submit">REGISTRARSE</button>
            </form>
        </div>
        <div class="BarraDown">
        <p>Todos los derechos seran reservados. Libreria Online ©2025</p>
            <a href="https://www.facebook.com">Facebook</a><br>
            <a href="https://www.instagram.com">Instagram</a><br>
            <a href="https://www.x.com">X(Twitter)</a>
        </div>
</body>
</html>