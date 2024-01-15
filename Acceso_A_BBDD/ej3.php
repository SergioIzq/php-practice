<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selector de productos</title>
</head>
<body>   
        <?php
       // Verificar si el usuario ha enviado el formulario, si es así le muestro lo que ha enviado con una bienvenida
        if(isset($_GET['send'])) {
            $conn = new mysqli("localhost", "user_dwes", "userUSER2", "dwes");
            // Obtener el nombre del producto seleccionado
            $productoSeleccionado = $_GET['producto'];
            ?><p><?php echo $productoSeleccionado;?></p>
            <?php
            // Consulta SQL para obtener el código del producto
            $codigoQuery = "SELECT cod FROM producto WHERE nombre_corto = '$productoSeleccionado'";
    
            // Ejecutar la consulta del código del producto
            $codigoResult = $conn->query($codigoQuery);
    
            // Verificar si hay resultados
            if ($codigoResult->num_rows > 0) {
                // Obtener el código del producto
                $codigoRow = $codigoResult->fetch_assoc();
                $codigoProducto = $codigoRow['cod'];
                // Consulta SQL para obtener la cantidad de unidades del producto seleccionado
                $sql = "
                SELECT t.NOMBRE AS nombre_tienda, SUM(s.UNIDADES) AS total_unidades
                FROM producto p
                JOIN stock s ON p.COD = s.PRODUCTO
                JOIN tienda t ON s.TIENDA = t.COD
                GROUP BY t.NOMBRE;
                ";
            // Ejecutar la consulta
            $result = $conn->query($sql);

            // Verificar si hay resultados
                if ($result->num_rows > 0) {            
                    ?>
                    <table border=1>
                        <tr><th>Nombre de la Tienda</th><th>Unidades en Stock</th></tr>
                    <?php
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                    <td><?php echo $row['nombre_tienda'] ?></td>
                    <td> <?php echo $row['total_unidades'] ?></td>
                    </tr>
                    <?php
                }

                ?></table><?php
                } else {
                    ?><p>"No se encontraron resultados."</p><?php
                }
            }
        // Si no lo ha enviado, se lo muestro para que lo rellene y envíe
        }else{
        ?>
        <!-- El action es para que se ejecute el código del mismo PHP en vez de enviarlo a otro PHP -->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
            <label for="producto">Producto</label>
            <br>   
            <select name="producto" id="producto">
                <?php 
                $conn = new mysqli("localhost", "user_dwes", "userUSER2", "dwes");
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }

                // Consulta SQL para obtener nombres únicos de la columna 'nombre' en la tabla 'stock'
                $sql = "SELECT nombre_corto FROM producto";

                $result = $conn->query($sql);

                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                    // Iterar a través de los resultados y mostrar cada nombre en una opción
                    while ($row = $result->fetch_assoc()) {
                        $nombre = $row['nombre_corto'];
                        ?><option value="<?php echo $nombre ?>"><?php echo $nombre ?></option>
                        <?php
                    }
                } else {
                    echo "No se encontraron resultados.";
                }
                ?>
            </select>
            <br>
            <input type="submit" name="send">
        </form>
            
        <?php
            }
        ?>  


</body>
</html>