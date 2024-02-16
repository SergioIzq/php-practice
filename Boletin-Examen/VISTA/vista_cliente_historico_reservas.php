<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../VISTA/LAYOUT/layout.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Restaurante XYZ</title>
</head>

<body>
    <header>
        <div class="titulo">
            <h1><a class="navbar-link" href="../index.php">Restaurante XYZ</a></h1>
        </div>
        <navbar class="menu">
            <ul class="links">
                <li><a class="navbar-link" href="../index.php">Inicio</a></li>
                <li><a class="navbar-link" href="#">Reservas Activas</a></li>
                <li><a class="navbar-link" href="#">Nueva Reserva</a></li>
                <li><a class="navbar-link" href="#">Histórico de Reservas</a></li>
                <li><a class="navbar-link" href="#">Cerrar sesión</a></li>
            </ul>
        </navbar>
    </header>

    <div class="containerHistorico">
        <div class="tituloRegistro">
            <h2>Histórico de Reservas</h2>
        </div>
        <table class="reservas-table">
            <thead>
                <tr>
                    <th class="fecha">Fecha</th>
                    <th class="hora">Hora</th>
                    <th class="mesa">Mesa</th>
                    <th class="descripcion">Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas_pasadas as $reserva) : ?>
                    <?php if ($reserva['Correo_cliente'] === $correo_sesion) : ?>
                        <tr>
                            <td class="fecha"><?php echo $reserva['Fecha']; ?></td>
                            <td class="hora"><?php echo $reserva['Hora']; ?></td>
                            <td class="mesa"><?php echo $reserva['Mesa']; ?></td>
                            <td class="descripcion"><?php echo $reserva['Descripcion']; ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>


    <footer>© 2024 Restaurante XYZ. Todos los derechos reservados.</footer>

</body>

</html>
