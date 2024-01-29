<?php

// Verificar si hay una opción seleccionada
$opcion = isset($_GET['opcion']) ? $_GET['opcion'] : 'votar';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=DEPARTAMENTOS', 'gestor_empleados', 'gestorGESTOR2');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error al conectar a la base de datos: ' . $e->getMessage());
}

// Obtener la lista de empleados
$stmtEmpleados = $pdo->prepare("SELECT * FROM empleados");
$stmtEmpleados->execute();
$empleados = $stmtEmpleados->fetchAll(PDO::FETCH_ASSOC);

// Obtener la lista de candidatos
$stmtCandidatos = $pdo->prepare("SELECT * FROM empleados WHERE es_candidato = true");
$stmtCandidatos->execute();
$candidatos = $stmtCandidatos->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Votación</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="menu">
        <a href="?opcion=votar" <?php if ($opcion === 'votar') echo 'class="active"'; ?>>VOTAR</a>
        <a href="?opcion=resultados" <?php if ($opcion === 'resultados') echo 'class="active"'; ?>>RESULTADOS</a>
    </div>

    <div class="contenido">
        <?php if ($opcion === 'votar'): ?>
            <h2>Lista de Empleados</h2>
            <ul>
            <?php foreach ($empleados as $empleado): ?>
    <li>
        <?= $empleado['nombre'] ?> <?= $empleado['apellido1'] ?> <?= $empleado['apellido2'] ?>
        <form action="votacion.php" method="post" style="display: inline;">
            <input type="hidden" name="empleado_id" value="<?= $empleado['DNI'] ?>">
            <input type="hidden" name="iniciado_por" value="<?= $dni_del_usuario_que_inicia_la_votacion ?>">
            
            <button type="submit" name="iniciar_votacion">Iniciar Votación</button>
        </form>
    </li>
<?php endforeach; ?>


            </ul>
        <?php elseif ($opcion === 'resultados'): ?>
            <h2>Resultados</h2>
            <!-- Agrega aquí el código HTML para mostrar los resultados según tus necesidades -->
        <?php endif; ?>
    </div>

</body>
</html>
