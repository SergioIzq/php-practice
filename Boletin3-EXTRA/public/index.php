<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Votación</title>    
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Honk&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Votación de Nuevo Jefe de Departamento</h1>
        <ul class="nav">
            <li><a href="#votar">VOTAR</a></li>
            <li><a href="resultados.php">RESULTADOS</a></li>
        </ul>
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
            ?><form action="votacion.php" method="post" class="empleado-form"><?php
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
       

    </div>
</body>

</html>
