<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=DEPARTAMENTOS', 'gestor_empleados', 'gestorGESTOR2');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error al conectar a la base de datos: ' . $e->getMessage());
}

// Obtener la lista de candidatos
$stmtCandidatos = $pdo->prepare("SELECT * FROM empleados WHERE es_candidato = true");
$stmtCandidatos->execute();
$candidatos = $stmtCandidatos->fetchAll(PDO::FETCH_ASSOC);

// Verificar si se ha cerrado la votación
$cerrarVotacion = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cerrar_votacion'])) {
    // Verificar si hay al menos un voto
    $stmtContarVotos = $pdo->prepare("SELECT COUNT(*) FROM empleados WHERE vota_a IS NOT NULL");
    $stmtContarVotos->execute();
    $numVotos = $stmtContarVotos->fetchColumn();

    if ($numVotos > 0) {
        $cerrarVotacion = true;
        // Obtener el candidato con más votos (o el primero en caso de empate)
        $stmtResultados = $pdo->prepare("SELECT vota_a, COUNT(*) AS num_votos FROM empleados WHERE vota_a IS NOT NULL GROUP BY vota_a ORDER BY num_votos DESC, apellido1 ASC LIMIT 1");
        $stmtResultados->execute();
        $resultado = $stmtResultados->fetch(PDO::FETCH_ASSOC);

        // Obtener los detalles del nuevo jefe de departamento
        $stmtJefe = $pdo->prepare("SELECT * FROM empleados WHERE DNI = ?");
        $stmtJefe->execute([$resultado['vota_a']]);
        $nuevoJefe = $stmtJefe->fetch(PDO::FETCH_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h2>Resultados de la Votación</h2>

    <?php if (!$cerrarVotacion): ?>
        <ul>
            <?php foreach ($candidatos as $candidato): ?>
                <li><?= $candidato['nombre'] ?> <?= $candidato['apellido1'] ?> <?= $candidato['apellido2'] ?> - Votos: <?= obtenerNumVotos($pdo, $candidato['DNI']) ?></li>
            <?php endforeach; ?>
        </ul>
        <form action="resultados.php" method="post">
            <button type="submit" name="cerrar_votacion">Cerrar Votación</button>
        </form>
    <?php else: ?>
        <h2>Resultado Final</h2>
        <?php if (isset($nuevoJefe)): ?>
            <p>El nuevo jefe de departamento es: <?= $nuevoJefe['nombre'] ?> <?= $nuevoJefe['apellido1'] ?> <?= $nuevoJefe['apellido2'] ?></p>
        <?php else: ?>
            <p>No hay votos. No se puede cerrar la votación.</p>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>

<?php
// Función para obtener el número de votos para un candidato
function obtenerNumVotos($pdo, $dniCandidato) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM empleados WHERE vota_a = ?");
    $stmt->execute([$dniCandidato]);
    return $stmt->fetchColumn();
}
?>
