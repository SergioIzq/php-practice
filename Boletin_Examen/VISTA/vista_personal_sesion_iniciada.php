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
        <div class="tituloPersonal">
            <h1><a class="navbar-link" href="../index.php">Restaurante XYZ</a></h1>
        </div>
    </header>

    <div class="containerRegistro">
        <div class="tituloRegistro">
        <?php
            // Verificar si la cookie existe y tiene un valor
            if (isset($_COOKIE['usuario_sesion'])) {
                // Mostrar el usuario almacenado en la cookie
                ?>
                <h2>Bienvenido
                    <?php echo $_COOKIE['usuario_sesion']; ?>
                </h2>
                <?php
            } else {
                // Si la cookie no está presente, mostrar un mensaje genérico
                ?>
                <h2>Bienvenido</h2>
                <?php
            }
            ?>
        </div>
        <div class="buttons-user">
            <button class="button-registrarse"><a href="controlador_personal_anadir_usuario.php">Añadir Nuevo Usuario</a></button>
            <button class="button-registrarse"><a href="controlador_personal_ver_reservas.php">Visualizar Reservas</a></button>
        </div>
    </div>


    <footer>© 2024 Restaurante XYZ. Todos los derechos reservados.</footer>

</body>

</html>