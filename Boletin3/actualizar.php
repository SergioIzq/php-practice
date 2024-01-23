<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <link rel="stylesheet" href="actualizar.css">
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

    // Verificar si el formulario se envió con el botón "Actualizar"
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $codigoProducto = $_POST["producto_cod"];
        $nombreCorto = $_POST["nombre_corto"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $pvp = $_POST["pvp"];

        // Realizar la consulta para actualizar los datos del producto
        $consultaActualizar = "UPDATE producto SET nombre_corto = '$nombreCorto', nombre = '$nombre', descripcion = '$descripcion', pvp = '$pvp' WHERE cod = '$codigoProducto'";
        $resultado = $dwes->exec($consultaActualizar);

        // Verificar si la consulta se ejecutó correctamente
        if ($consultaActualizar) {
            ?>
            <div class="mensajeExito">
                <p>Los datos del producto se actualizaron correctamente.</p>
            </div>
            <div class="redireccion">
                <p>Redireccionando a la página principal...</p>
            </div><?php
        } else {
            ?><p>Error: No se pudieron actualizar los datos del producto.</p><?php
        }

        // Redirigir a la página de listado
        header("refresh:3;url=listado.php");
        exit();
        
    } else {
        // Si el formulario no se envió con el botón "Actualizar", mostrar un mensaje de error
        ?><p>Error: No se ha enviado el formulario correctamente.</p><?php
    }
    ?>

</body>
</html>
