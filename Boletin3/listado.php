<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
    <link rel="stylesheet" href="listado.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    <?php
    // Conectarse a la base de datos
    try {
        $dwes = new PDO('mysql:host=localhost;dbname=dwes', 'user_dwes', 'userUSER2');
        $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        ?> <p>Error al conectar con la base de datos: <?php echo $e->getMessage(); ?></p><?php
        die();
    }

    // Consultar las familias
    $consultaFamilias = $dwes->query('SELECT nombre, cod FROM familia');
    $familias = $consultaFamilias->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="familia">Selecciona una familia:</label>
        <select name="familia" id="familia">
            <?php
            // Mostrar las opciones de familia
            foreach ($familias as $familia) {
                ?><option value = <?php echo $familia['cod']; ?> ><?php echo $familia['nombre']; ?> </option>
                <?php
            }
                ?>
        </select>
        <button type="submit">Mostrar</button>
    </form>

    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el código de la familia seleccionada
        $codigoFamiliaSeleccionada = $_POST["familia"];

        // Obtener el nombre de la familia seleccionada directamente de $familias
        $nombreFamilia = '';
        foreach ($familias as $familia) {
            if ($familia['cod'] == $codigoFamiliaSeleccionada) {
                $nombreFamilia = $familia['nombre'];
                break;
            }
        }

        // Realizar la consulta a la base de datos utilizando el código de la familia
        $consultaProductos = $dwes->prepare('SELECT cod, nombre_corto, pvp FROM producto WHERE familia = :familia');
        $consultaProductos->execute([':familia' => $codigoFamiliaSeleccionada]);
        $productos = $consultaProductos->fetchAll(PDO::FETCH_ASSOC);

        // Mostrar los resultados en una tabla o mensaje de no hay stock
        if (!empty($productos)) {
            ?>
                    </div>
            <div class="container">
            <h2>Productos para la familia <?php echo $nombreFamilia; ?>:</h2>
            </div>
            <div class="container">
                <div class="table-container">

            <table>
                <tr>
                    <th>Nombre Corto</th><th>PVP</th>
                </tr>
            <?php
            foreach ($productos as $producto) {
                ?>                
                <tr>
                    <td><?php echo $producto['nombre_corto']; ?></td>
                    <td><?php echo $producto['pvp']; ?></td>
                    <td>
                    <form class="button-editar" action='editar.php' method='post'>
                        <input type='hidden' name='producto_cod' value = <?php echo $producto['cod']; ?>>
                        <button type='submit'>Editar</button>
                    </form>
                    </td>
                </tr>
                <?php
            }            
            ?>
            </table>
                </div>
            <?php
        } else {
            ?>
                </div>

            <div class="noStock">
                <p>No hay stock en <strong><?php echo $nombreFamilia; ?></strong></p>
            </div>
            <?php
        }
    }
    ?>
</body>
</html>
