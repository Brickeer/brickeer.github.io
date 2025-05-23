<?php
include("conexion.php");

$query = $_GET['query'];

$sql = "SELECT * FROM libros WHERE titulo LIKE '%$query%'";
$resultado = mysqli_query($enlace, $sql);
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
    <title>Resultados de búsqueda</title>
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
        <h2 style="width: 100%; text-align: center;">Resultados para "<?php echo $query; ?>"</h2>

        <?php
        if (mysqli_num_rows($resultado) > 0) {
            while ($libro = mysqli_fetch_assoc($resultado)) {
                ?>
                <div class="libro-card">
                    <img src="<?php echo $libro['imagen']; ?>" alt="<?php echo $libro['titulo']; ?>" class="libro-imagen">
                    <h3><?php echo $libro['titulo']; ?></h3>
                    <p>Precio: $<?php echo $libro['precio']; ?></p>
                    <form method="post" action="agregar_al_carrito.php">
                    <input type="hidden" name="id_libro" value="<?php echo $libro['id_libro']; ?>">
                    <button type="submit">Agregar al carrito</button>
                    </form>
                </div>
                <?php
            }
        } else {
            echo "<p style='text-align: center;'>No se encontraron resultados.</p>";
        }
        ?>
    </div>

    <div class="BarraDown">
        <p>&copy; 2025 Librería Online</p>
    </div>
</body>
</html>
