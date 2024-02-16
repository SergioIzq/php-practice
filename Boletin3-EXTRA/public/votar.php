<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Votación</title>
    <link href="https://fonts.googleapis.com/css2?family=Honk&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <h2>¿Quién está votando?</h2>
    <?php
    try {
        // Conexión a la base de datos
        $pdo = new PDO("mysql:host=localhost;dbname=DEPARTAMENTOS", "gestor_empleados", "gestorGESTOR2");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener la lista de empleados del departamento de ventas
        $stmt = $pdo->prepare("SELECT * FROM empleados");
        $stmt->execute();
        $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($empleados) {
            ?><form action="votacion.php" method="post"><?php
            foreach ($empleados as $empleado) {
                ?><div class="empleado">
                    <p><?php echo $empleado['nombre'] . ' ' . $empleado['apellido1'] . ' ' . $empleado['apellido2'] ?></p>
                    <button type="submit" name="empleado_id" value="<?php echo $empleado['DNI'] ?>">Iniciar Votación</button>
                  </div><?php
            }
            ?></form>
            <?php
        } else {
            ?><p>No hay empleados disponibles para votar.</p><?php
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
    ?>
</body>
</html>
