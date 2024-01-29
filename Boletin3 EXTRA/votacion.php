<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=DEPARTAMENTOS', 'gestor_empleados', 'gestorGESTOR2');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['iniciar_votacion'])) {
        $dni_del_usuario_que_inicia_la_votacion = $_POST['iniciado_por'];
        $nombre_empleado_seleccionado = $_POST['nombre_empleado'];

        // Obtener el DNI del empleado seleccionado
        $stmtDNI = $pdo->prepare("SELECT DNI FROM empleados WHERE nombre = ?");
        $stmtDNI->execute([$nombre_empleado_seleccionado]);
        $empleado = $stmtDNI->fetch(PDO::FETCH_ASSOC);

        if (!$empleado) {
            die('Error: No se encontró al empleado.');
        }

        $dni_empleado_seleccionado = $empleado['DNI'];

        // Redireccionar al script de procesar voto con el DNI del usuario que inicia la votación
        // y el DNI del empleado seleccionado
        header("Location: procesar_voto.php?dni_empleado_votante=$dni_del_usuario_que_inicia_la_votacion&dni_empleado_seleccionado=$dni_empleado_seleccionado");
        exit();
    }
} catch (PDOException $e) {
    die('Error al conectar a la base de datos: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Votación</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Formulario para seleccionar el nombre del empleado -->
    <form action="votacion.php" method="post">
        <h2>Selecciona un Empleado</h2>
        <select name="nombre_empleado" required>
            <?php foreach ($empleados as $empleado): ?>
                <option value="<?= $empleado['nombre'] ?>">
                    <?= $empleado['nombre'] ?> <?= $empleado['apellido1'] ?> <?= $empleado['apellido2'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="iniciado_por" value="<?= $dni_del_usuario_que_inicia_la_votacion ?>">
        <input type="submit" name="iniciar_votacion" value="Seleccionar">
    </form>

</body>
</html>
