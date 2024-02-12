<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="VISTA/LAYOUT/layout.css">
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
            <h1><a class="navbar-link" href="index.php">Restaurante XYZ</a></h1>
        </div>
        <navbar class="menu">
            <ul class="links">
                <li><a class="navbar-link" href="index.php">Inicio</a></li>
                <li><a class="navbar-link" href="CONTROLADOR/controlador_reservas.php">Reservas</a></li>
                <li><a class="navbar-link" href="CONTROLADOR/controlador_menu.php">Menú</a></li>
                <li><a class="navbar-link" href="CONTROLADOR/controlador_contacto.php">Contacto</a></li>
            </ul>
        </navbar>
    </header>
    <div class="container">
        <div class="tituloH2">
            <h2>Bienvenido a Restaurante XYZ</h2>
        </div>
        <div class="subtitulo">
            <p>Por favor, selecciona tu rol:</p>
        </div>
        <div class="botones">
            <button class="boton-cliente"><a class="navbar-link"
                    href="CONTROLADOR/controlador_cliente_registro.php">Cliente</a></button>
            <button class="boton-personal"><a class="navbar-link"
                    href="CONTROLADOR/controlador_personal.php">Personal</a></button>
        </div>
    </div>
    
    <footer>© 2024 Restaurante XYZ. Todos los derechos reservados.</footer>

</body>

</html>