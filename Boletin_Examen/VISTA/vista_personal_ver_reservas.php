<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../VISTA/LAYOUT/layout.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Restaurante XYZ</title>
</head>

<body>
    <header>
        <div class="tituloPersonal">
            <h1><a class="navbar-link" href="../index.php">Restaurante XYZ</a></h1>
        </div>
    </header>

    <div class="containerHistorico">
        <div class="tituloRegistro">
            <h2>Visualizar Reservas</h2>
        </div>
        <div class="header-filtro">
            <form action="../CONTROLADOR/controlador_personal_ver_reservas.php" method="POST">
                <label for="fecha">Seleccione Fecha:</label>
                <input type="date" name="fecha">
                <button type="submit">Filtrar</button>
            </form>
        </div>
        <table class="reservas-table">
            <thead>
                <tr>
                    <th class="correo">Correo</th>
                    <th class="fecha">Fecha</th>
                    <th class="hora">Hora</th>
                    <th class="mesa">Mesa</th>
                    <th class="descripcion">Descripción</th>
                    <th class="acciones">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verificar si $reservas no está vacío antes de iterar sobre él
                if (!empty($reservas)) {
                    // Obtener la fecha y hora actual
                    $fecha_actual = date('Y-m-d H:i:s');

                    foreach ($reservas as $reserva):
                        // Comparar si la fecha y hora de la reserva es mayor que la fecha y hora actual
                        if ($reserva['Fecha'] . ' ' . $reserva['Hora'] >= $fecha_actual):
                            ?>
                            <tr>
                                <td class="correo">
                                    <?php echo $reserva['Correo_cliente']; ?>
                                </td>
                                <td class="fecha">
                                    <?php echo $reserva['Fecha']; ?>
                                </td>
                                <td class="hora">
                                    <?php echo $reserva['Hora']; ?>
                                </td>
                                <td class="mesa">
                                    <?php echo $reserva['Mesa']; ?>
                                </td>
                                <td class="descripcion">
                                    <?php echo $reserva['Descripcion']; ?>
                                </td>
                                <td class="acciones">
                                    <form action="../CONTROLADOR/controlador_cancelar_reserva.php" method="POST">
                                        <input type="hidden" name="fecha" value="<?php echo $reserva['Fecha']; ?>">
                                        <input type="hidden" name="hora" value="<?php echo $reserva['Hora']; ?>">
                                        <input type="hidden" name="mesa" value="<?php echo $reserva['Mesa']; ?>">
                                        <input type="hidden" name="correo" value="<?php echo $reserva['Correo_cliente']; ?>">
                                        <button type="submit" class="cancelar-btn">Cancelar</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        endif;
                    endforeach;
                } else {
                    // Si no hay reservas disponibles, mostrar un mensaje alternativo
                    echo "<tr><td colspan='6'>No hay reservas disponibles.</td></tr>";
                    echo "<tr><td colspan='6'>Busque una fecha para encontrar reservas.</td></tr>";
                }
                ?>
            </tbody>

        </table>

    </div>


    <footer>© 2024 Restaurante XYZ. Todos los derechos reservados.</footer>

</body>

</html>