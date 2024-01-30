<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Votación</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Honk&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    <h1>Votación de Nuevo Jefe de Departamento</h1>

        <ul class="nav">
            <li><a href="?page=votar">VOTAR</a></li>
            <li><a href="?page=resultados">RESULTADOS</a></li>
        </ul>
        <?php
            if (isset($_GET['page']) && $_GET['page'] === 'resultados') {
                include 'resultados.php';
            } else {
                include 'votar.php';
            }
        ?>

            <!-- CONTROLAR QUE HAYA EMPLEADOS QUE NO SE PRESENTAN CANDIDATOS -->

    </div>
</body>
</html>
