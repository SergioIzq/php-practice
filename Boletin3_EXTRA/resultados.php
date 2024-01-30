<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <link rel="stylesheet" href="resultados.css">
    <link href="https://fonts.googleapis.com/css2?family=Honk&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet"></head>
<body>
    <div class="container">
        <h1>Resultados</h1>
        <?php
        try {
            // Conexión a la base de datos
            $pdo = new PDO("mysql:host=localhost;dbname=DEPARTAMENTOS", "gestor_empleados", "gestorGESTOR2");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Obtener datos del formulario
                $empleado_id = $_POST['empleado_id'];
                $candidato_id = $_POST['candidato_id'];

                // Actualizar la tabla de empleados para establecer a quién vota el empleado
                $stmt = $pdo->prepare("UPDATE empleados SET vota_a = :candidato_id WHERE DNI = :empleado_id");
                $stmt->bindParam(':candidato_id', $candidato_id, PDO::PARAM_STR);
                $stmt->bindParam(':empleado_id', $empleado_id, PDO::PARAM_STR);
                $stmt->execute();
            }

            // Obtener resultados de la votación
            $stmt = $pdo->prepare("SELECT e.DNI, e.nombre, e.apellido1, e.apellido2, COUNT(v.DNI) as votos
                                   FROM empleados e
                                   LEFT JOIN empleados v ON e.DNI = v.vota_a
                                   WHERE e.es_candidato = 1
                                   GROUP BY e.DNI
                                   ORDER BY votos DESC, e.apellido1 ASC, e.apellido2 ASC");
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($resultados) {
                ?><ul><?php
                foreach ($resultados as $resultado) {
                    ?><li>
                    <?php echo $resultado['nombre'] . ' ' . $resultado['apellido1'] . ' ' . $resultado['apellido2'];
                    ?> - Votos: <?php echo $resultado['votos'];?>
                    </li><?php
                }
                ?></ul>

                <!-- Botón para cerrar la votación -->
                <form action="cerrar_votacion.php" method="post">
                    <input type="submit" name="cerrar_votacion" value="Cerrar Votación">
                </form>

                <!-- Botón para volver al index -->
                <form action="index.php" method="get">
                    <input type="submit" value="Volver a votar">
                </form><?php
            } else {
                ?> <p>No hay resultados disponibles.</p><?php
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        ?>
    </div>
</body>
</html>
