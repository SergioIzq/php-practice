<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="editar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

    <?php
    // Conectarse a la base de datos
    try {
        $dwes = new PDO('mysql:host=localhost;dbname=dwes', 'user_dwes', 'userUSER2');
        $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        ?> <p>Error al conectar con la base de datos: <?php echo $e->getMessage(); ?></p><?php
        die();
    }

    // Verificar si se ha enviado el formulario desde la página anterior
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Verificar si el índice "producto_cod" está definido en el array $_POST
        if (isset($_POST["producto_cod"])) {
            // Obtener el código del producto seleccionado desde la página anterior
            $codigoProductoSeleccionado = $_POST["producto_cod"];
            
            // Realizar la consulta a la base de datos utilizando el código del producto
            $consultaProducto = $dwes->prepare('SELECT nombre_corto, nombre, descripcion, pvp FROM producto WHERE cod = :cod');
            $consultaProducto->execute([':cod' => $codigoProductoSeleccionado]);
            
            // Verificar si la consulta devolvió algún resultado
            if ($producto = $consultaProducto->fetch(PDO::FETCH_ASSOC)) {
    ?>
                <div class="titulo">
                    <h2>Editar Producto</h2>
                </div>

                <form action="actualizar.php" method="post">
                    <input type="hidden" name="producto_cod" value="<?php echo $codigoProductoSeleccionado; ?>">

                    <label for="nombre_corto">Nombre Corto:</label>
                    <input type="text" name="nombre_corto" value="<?php echo $producto['nombre_corto']; ?>" required><br>

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>"><br>

                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea><br>

                    <label for="pvp">PVP:</label>
                    <input type="text" name="pvp" value="<?php echo $producto['pvp']; ?>" required><br>

                    <button type="submit">Actualizar</button>
                    <a href="listado.php"><button type="button">Cancelar</button></a>
                </form>
    <?php
            } else {
                // Si la consulta no devuelve resultados, mostrar un mensaje de error
                ?><p>Error: No se encontró el producto con el código <?php echo $codigoProductoSeleccionado; ?></p>
                <?php
            }
        } else {
            // Si el índice "producto_cod" no está definido en el array $_POST, mostrar un mensaje de error
            ?><p>Error: No se ha proporcionado el código del producto para editar.</p>
            <?php
        }
        
    } else {
        // Si no se ha enviado el formulario, mostrar un mensaje de error
        ?><p>Error: No se ha seleccionado ningún producto para editar.</p>
        <?php
    }
    ?>

</body>
</html>
