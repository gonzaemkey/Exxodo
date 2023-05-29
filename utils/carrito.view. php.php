<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compra</title>
</head>
<body>
    <h1>Productos Disponibles</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th></th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td>$<?php echo $row['precio']; ?></td>
                <td><?php echo $row['cantidad']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="producto_id" value="<?php echo $row['id']; ?>">
                        <input type="number" name="cantidad" value="1" min="1" max="<?php echo $row['cantidad']; ?>">
                        <input type="submit" name="agregar" value="Agregar al carrito">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php include 'carrito.php'; ?>
</body>
</html>