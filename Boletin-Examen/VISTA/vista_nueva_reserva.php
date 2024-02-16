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
                <li><a class="navbar-link" href="#">Reservas Activas</a></li>
                <li><a class="navbar-link" href="#">Nueva Reserva</a></li>
                <li><a class="navbar-link" href="#">Histórico de Reservas</a></li>
                <li><a class="navbar-link" href="controlador_cerrar_sesion.php">Cerrar sesión</a></li>
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
                    <input class="input-email" type="date" name="fechaReserva" min="<?php echo date('Y-m-d'); ?>" max="" required />
                </div>
                <div class="input-group2">
                    <label for="hora">Hora:</label>
                    <select name="horaReserva" required>
                        <!-- Mostrar solo las horas especificadas -->
                        <option value="20:30">20:30</option>
                        <option value="21:00">21:00</option>
                        <option value="21:30">21:30</option>
                        <option value="22:00">22:00</option>
                        <option value="22:30">22:30</option>
                        <option value="23:00">23:00</option>
                    </select>
                </div>
                <div class="input-group3">
                    <label for="descripcion">Mesa</label>
                    <select name="mesa" id="mesa" required>
                        <option value="1">Mesa 1</option>
                        <option value="2">Mesa 2</option>
                        <option value="3">Mesa 3</option>
                        <option value="4">Mesa 4</option>
                        <option value="5">Mesa 5</option>
                        <option value="6">Mesa 6</option>                                                
                    </select>
                </div>
                <div class="input-group4">
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