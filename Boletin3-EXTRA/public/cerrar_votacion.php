<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cerrar Votación</title>
    <link rel="stylesheet" href="css/cerrar_votacion.css">
    <link href="https://fonts.googleapis.com/css2?family=Honk&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Cerrar Votación</h1>
        <?php
        try {
            // Conexión a la base de datos
            $pdo = new PDO("mysql:host=localhost;dbname=DEPARTAMENTOS", "gestor_empleados", "gestorGESTOR2");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Obtener DNI que más se repite en la columna vota_a
            $stmt = $pdo->prepare("SELECT vota_a, COUNT(*) as conteo FROM empleados WHERE vota_a IS NOT NULL GROUP BY vota_a ORDER BY conteo DESC, vota_a ASC");
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($resultados) {
                $ganador = null;

                // Si hay empate, evaluar al ganador en orden alfabético
                if (count($resultados) > 1 && $resultados[0]['conteo'] == $resultados[1]['conteo']) {
                    $stmtEmpate = $pdo->prepare("SELECT * FROM empleados WHERE DNI IN (:dni1, :dni2) ORDER BY nombre ASC LIMIT 1");
                    $stmtEmpate->bindParam(':dni1', $resultados[0]['vota_a'], PDO::PARAM_STR);
                    $stmtEmpate->bindParam(':dni2', $resultados[1]['vota_a'], PDO::PARAM_STR);
                    $stmtEmpate->execute();
                    $ganador = $stmtEmpate->fetch(PDO::FETCH_ASSOC);
                } else {
                    // Obtener el nombre del ganador
                    $stmtNombre = $pdo->prepare("SELECT nombre, apellido1, apellido2 FROM empleados WHERE DNI = :dni");
                    $stmtNombre->bindParam(':dni', $resultados[0]['vota_a'], PDO::PARAM_STR);
                    $stmtNombre->execute();
                    $ganador = $stmtNombre->fetch(PDO::FETCH_ASSOC);
                }

                if ($ganador) {
                    ?><p>El ganador de la votación es: <?php echo $ganador['nombre'] . ' ' . $ganador['apellido1'] . ' ' . $ganador['apellido2'] ?></p>
                    
                    <!-- En caso de empate, mostrar mensaje adicional -->
                    <?php if (count($resultados) > 1 && $resultados[0]['conteo'] == $resultados[1]['conteo']) {
                        ?><p>En caso de empate se decidirá al ganador mediante orden alfabético.</p><?php
                    }
                    
                    // Restablecer la columna vota_a a nulo para permitir otra votación
                    $stmtReset = $pdo->prepare("UPDATE empleados SET vota_a = NULL");
                    $stmtReset->execute();
                } else {
                    ?><p>No hay votos registrados.</p><?php
                }
            } else {
                ?><p>No hay votos registrados.</p><?php
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        ?>
        <!-- Botón para volver al index -->
        <form action="index.php" method="get">
            <input type="submit" value="Volver a Votar">
        </form>
    </div>
</body>
</html>
