<?php
include 'db.php';

// Añadir nuevo producto
if (isset($_POST['add'])) {
    $cantidad = $_POST['cantidad'];
    $nombre = $_POST['nombre'];
    $referencia = $_POST['referencia'];
    $precio_realizacion = $_POST['precio_realizacion'];
    $detalle_producto = $_POST['detalle_producto'];

    $conn->query("INSERT INTO PRODUCTO_REALIZADO (PRe_Cantidad, PRe_Nombre, PRe_Referencia, PRe_Prec_Realizacion, Detalle_producto, Fecha_Entrada)
                  VALUES ('$cantidad', '$nombre', '$referencia', '$precio_realizacion', '$detalle_producto', NOW())");
}

// Modificar producto (añadir más cantidad)
if (isset($_POST['update_quantity'])) {
    $id = $_POST['id'];
    $cantidad_extra = $_POST['cantidad_extra'];

    // Actualiza la cantidad y registra el cambio en el historial
    $conn->query("UPDATE PRODUCTO_REALIZADO 
                  SET PRe_Cantidad = PRe_Cantidad + $cantidad_extra 
                  WHERE PRe_ID = $id");

    $conn->query("INSERT INTO HISTORIAL (PRe_ID, Fecha_Entrada, Cantidad_Retirada) 
                  VALUES ($id, NOW(), $cantidad_extra)");
}

// Registrar salida
if (isset($_POST['register_exit'])) {
    $id = $_POST['id'];
    $cantidad_salida = $_POST['cantidad_salida'];

    $result = $conn->query("SELECT PRe_Cantidad FROM PRODUCTO_REALIZADO WHERE PRe_ID = $id");
    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        if ($producto['PRe_Cantidad'] >= $cantidad_salida) {
            $conn->query("UPDATE PRODUCTO_REALIZADO 
                          SET PRe_Cantidad = PRe_Cantidad - $cantidad_salida, 
                              Fecha_Salida = NOW() 
                          WHERE PRe_ID = $id");

            $conn->query("INSERT INTO HISTORIAL (PRe_ID, Fecha_Entrada, Fecha_Salida, Cantidad_Retirada) 
                          SELECT PRe_ID, Fecha_Entrada, NOW(), -$cantidad_salida 
                          FROM PRODUCTO_REALIZADO WHERE PRe_ID = $id");
        } else {
            echo "<script>alert('Cantidad insuficiente para realizar la salida.');</script>";
        }
    } else {
        echo "<script>alert('Producto no encontrado.');</script>";
    }
}

// Eliminar producto
if (isset($_POST['delete_product'])) {
    $id = $_POST['id'];
    $conn->query("DELETE FROM PRODUCTO_REALIZADO WHERE PRe_ID = $id");
}

// Obtener el ID del producto a filtrar (si existe)
$search_id = isset($_POST['search_id']) ? (int)$_POST['search_id'] : null;

// Consulta para obtener los productos realizados
$product_query = "SELECT * FROM PRODUCTO_REALIZADO";
if ($search_id) {
    $product_query .= " WHERE PRe_ID = $search_id";
}
$result = $conn->query($product_query);

// Consulta para obtener el historial
$historial_query = "SELECT h.PRe_ID, p.PRe_Nombre, h.Fecha_Entrada, h.Fecha_Salida, h.Cantidad_Retirada 
                    FROM HISTORIAL h 
                    JOIN PRODUCTO_REALIZADO p ON h.PRe_ID = p.PRe_ID";
if ($search_id) {
    $historial_query .= " WHERE h.PRe_ID = $search_id";
}
$historial_result = $conn->query($historial_query);

// Obtener todos los productos realizados para el filtro
$productos = $conn->query("SELECT PRe_ID, PRe_Nombre FROM PRODUCTO_REALIZADO");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylessebas.css">
    <title>Gestión de Productos Realizados</title>
</head>
<body>
    <header>
        <h1>Gestión de Productos Realizados</h1>
    </header>

    <!-- Formulario de selección por ID -->
    <form method="POST">
        <label for="search_id">Seleccionar Producto por ID:</label>
        <select name="search_id" required>
            <option value="">Seleccione un Producto</option>
            <?php while ($row = $productos->fetch_assoc()) : ?>
                <option value="<?= $row['PRe_ID']; ?>" <?= isset($search_id) && $search_id == $row['PRe_ID'] ? 'selected' : ''; ?>>
                    <?= $row['PRe_Nombre']; ?> (ID: <?= $row['PRe_ID']; ?>)
                </option>
            <?php endwhile; ?>
        </select>
        <input type="submit" value="Filtrar">
    </form>

    <!-- Formulario para añadir un nuevo producto -->
    <form method="POST">
        <h2>Añadir Producto Realizado</h2>
        <input type="number" name="cantidad" placeholder="Cantidad" required>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="referencia" placeholder="Referencia" required>
        <input type="number" step="0.01" name="precio_realizacion" placeholder="Precio Realización" required>
        <input type="text" name="detalle_producto" placeholder="Detalle del Producto" required>
        <input type="submit" name="add" value="Añadir Producto Realizado">
    </form>

    <h2>Productos Realizados</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cantidad</th>
                <th>Nombre</th>
                <th>Referencia</th>
                <th>Precio Realización</th>
                <th>Detalle del Producto</th>
                <th>Fecha de Entrada</th>
                <th>Fecha de Salida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <form method="POST">
                        <td><input type="hidden" name="id" value="<?= $row['PRe_ID']; ?>"><?= $row['PRe_ID']; ?></td>
                        <td><?= $row['PRe_Cantidad']; ?></td>
                        <td><?= $row['PRe_Nombre']; ?></td>
                        <td><?= $row['PRe_Referencia']; ?></td>
                        <td><?= $row['PRe_Prec_Realizacion']; ?></td>
                        <td><?= $row['Detalle_producto']; ?></td>
                        <td><?= $row['Fecha_Entrada']; ?></td>
                        <td><?= $row['Fecha_Salida'] ? $row['Fecha_Salida'] : 'No asignada'; ?></td>
                        <td>
                            <input type="number" name="cantidad_extra" placeholder="Añadir Cantidad" style="width: 100px;">
                            <button type="submit" name="update_quantity">Añadir</button>
                            <input type="number" name="cantidad_salida" placeholder="Retirar Cantidad" style="width: 100px;">
                            <button type="submit" name="register_exit">Salida</button>
                            <button type="submit" name="delete_product" style="background-color: red; color: white;">Eliminar</button>
                        </td>
                    </form>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Historial</h2>
    <table>
        <thead>
            <tr>
                <th>ID Producto</th>
                <th>Nombre</th>
                <th>Fecha de Entrada</th>
                <th>Fecha de Salida</th>
                <th>Cantidad Modificada</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $historial_result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row['PRe_ID']; ?></td>
                    <td><?= $row['PRe_Nombre']; ?></td>
                    <td><?= $row['Fecha_Entrada']; ?></td>
                    <td><?= $row['Fecha_Salida'] ? $row['Fecha_Salida'] : 'No asignada'; ?></td>
                    <td><?= $row['Cantidad_Retirada']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>





