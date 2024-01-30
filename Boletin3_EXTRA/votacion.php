<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Votación</title>
    <link rel="stylesheet" href="votacion.css">
    <link href="https://fonts.googleapis.com/css2?family=Honk&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
</head>
</head>
<body>
    <div class="container">
        <h1>Votación</h1>
        <?php
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $empleado_id = $_POST['empleado_id'];

                // Conexión a la base de datos
                $pdo = new PDO("mysql:host=localhost;dbname=DEPARTAMENTOS", "gestor_empleados", "gestorGESTOR2");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // Comprobar si el empleado ya ha votado
                $stmt = $pdo->prepare("SELECT vota_a FROM empleados WHERE DNI = :empleado_id");
                $stmt->bindParam(':empleado_id', $empleado_id, PDO::PARAM_STR);
                $stmt->execute();
                $vota_a = $stmt->fetchColumn();

                if (empty($vota_a)) {
                    // Obtener la lista de candidatos a jefe de departamento
                    $stmt = $pdo->prepare("SELECT * FROM empleados WHERE es_candidato = 1");
                    $stmt->execute();
                    $candidatos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if ($candidatos) {
                        ?><form action="resultados.php" method="post">
                            <div class="button-container"><?php
                        foreach ($candidatos as $candidato) {
                            ?><button type="submit" name="candidato_id" value="<?php echo $candidato['DNI'] ?>"><?php
                            echo $candidato['nombre'] . ' ' . $candidato['apellido1'] . ' ' . $candidato['apellido2'];
                            ?></button><?php
                        }
                        ?></div>
                            <input type="hidden" name="empleado_id" value="<?php echo $empleado_id ?> ">
                        </form>
                        <?php
                    } else {
                        ?><p>No hay candidatos disponibles para votar.</p><?php
                    }
                } else {
                    ?><p>Ya has votado en esta votación.</p><?php
                }
            } else {
                ?><p>Acceso no permitido.</p><?php
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        ?>
    </div>
</body>
</html>
