<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: iniciar_sesion01.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

    <div class="BarraUp">
        <h1><a href="index.php">Libreria</a></h1>
        <form action="Buscar" method="get">
        <input type="search" placeholder="Buscar">
        </form>
        <a href="https://www.google.com">Categorias</a>
        <a href="https://www.google.com">Contacto</a>
        <a href="carrito.php"><img src="img/compras.png" alt="carrito" width="30"></a>
        <a href="agregar_libro01.php">Agregar Libro</a>
        <a href="borrar_libro01.php">Borrar Libro</a>
        <?php if (isset($_SESSION['id_usuario'])): ?>
        <span>Bienvenid@, <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
        <?php else: ?>
        <a href="iniciar_sesion01.php"><img src="img/login.png" alt="iniciar sesion" width="30"></a>
        <?php endif; ?>
    </div>

    <div class="BarraUp">
    </div>

    <div class="carrito-container">
        <h2>🛒 Tu Carrito de Compras</h2>

        <?php if (!empty($_SESSION['carrito'])): ?>
            <form action="actualizar_carrito.php" method="post">
                <table class="tabla-carrito">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($_SESSION['carrito'] as $id => $item):
                            $subtotal = $item['precio'] * $item['cantidad'];
                            $total += $subtotal;
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['titulo']); ?></td>
                            <td>$<?php echo number_format($item['precio'], 2); ?></td>
                            <td>
                                <form method="post" action="actualizar_carrito.php" class="form-cantidad">
                                    <input type="hidden" name="accion" value="actualizar">
                                    <input type="hidden" name="id_libro" value="<?php echo $id; ?>">
                                    <input type="number" name="cantidad" value="<?php echo $item['cantidad']; ?>" min="1">
                                    <button type="submit">Actualizar</button>
                                </form>
                            </td>
                            <td>$<?php echo number_format($subtotal, 2); ?></td>
                            <td>
                                <form method="post" action="actualizar_carrito.php">
                                    <input type="hidden" name="accion" value="eliminar">
                                    <input type="hidden" name="id_libro" value="<?php echo $id; ?>">
                                    <button type="submit" class="boton-quitar">❌ Quitar</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><strong>Total:</strong></td>
                            <td colspan="2"><strong>$<?php echo number_format($total, 2); ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </form>

            <div class="carrito-acciones">
                <form method="post" action="pagar.php">
                    <button class="boton-pagar" type="submit"> Pagar ahora</button>
                </form>
                <form action="index.php" method="post">
                    <button action="index.php">Comprar mas</button>
                </form>
            </div>
        <?php else: ?>
            <p class="carrito-vacio">Tu carrito está vacío </p>
                <form action="index.php" method="post">
                    <button action="index.php">Agregar articulos al carrito</button>
                </form>
        <?php endif; ?>
    </div>
        <div class="BarraDown">
        <p>© 2025 Libreria Online. Todos los derechos seran reservados</p>
            <a href="https://www.facebook.com">Facebook</a><br>
            <a href="https://www.instagram.com">Instagram</a><br>
            <a href="https://www.x.com">X(Twitter)</a>
        </div>
</body>
</html>




