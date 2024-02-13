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
        <div class="titulo">
            <h1><a class="navbar-link" href="../index.php">Restaurante XYZ</a></h1>
        </div>
        <navbar class="menu">
            <ul class="links">
                <li><a class="navbar-link" href="../index.php">Inicio</a></li>
                <li><a class="navbar-link" href="controlador_reservas.php">Reservas Activas</a></li>
                <li><a class="navbar-link" href="controlador_menu.php">Nueva Reserva</a></li>
                <li><a class="navbar-link" href="controlador_contacto.php">Histórico de Reservas</a></li>
                <li><a class="navbar-link" href="controlador_contacto.php">Cerrar sesión</a></li>
            </ul>
        </navbar>
    </header>

    <div class="containerNuevaReserva">
        <div class="tituloRegistro">
            <h1>Realizar Nueva Reserva</h1>
        </div>
        <div class="formulario-registro">
            <form action="" method="post">
                <div class="input-group1">
                    <label for="fechaReserva">Fecha:</label>
                    <input class="input-email" type="date" name="fechaReserva" required />
                </div>
                <div class="input-group2">
                    <label for="hora">Hora:</label>
                    <input class="input-contrasena" type="time" name="horaReserva" required />
                </div>
                <div class="input-group3">
                    <label for="descripcion">Descripción (opcional):</label>
                    <textarea class="input-desc" rows="5" cols="65" type="textarea" name="desc"></textarea>
                </div>
                <div class="boton-enviar">
                    <button class="button-registrarse" type="submit">Reservar</button>
                </div>
            </form>            
        </div>
    </div>


    <footer>© 2024 Restaurante XYZ. Todos los derechos reservados.</footer>

</body>

</html>