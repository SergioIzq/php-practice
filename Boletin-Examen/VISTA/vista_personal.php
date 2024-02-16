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
            <h1><a class="navbar-link" href="../index.php">Restaurante XYZ - Área de Personal</a></h1>
        </div>
    </header>

    <div class="containerRegistro">
        <div class="tituloRegistro">
            <h1>Inicia sesión</h1>
        </div>
        <div class="formulario-registro">
            <form action="controlador_personal.php" method="post">
                <div class="input-group1">
                    <label for="usuario">Usuario:</label>
                    <input class="input-email" type="text" name="usuario" required />
                </div>
                <div class="input-group2">
                    <label for="contrasenia">Contraseña:</label>
                    <input class="input-contrasena" type="password" name="contrasena" required />
                </div>
                <div class="boton-enviar">
                    <button class="button-registrarse" type="submit">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>

    <footer>© 2024 Restaurante XYZ. Todos los derechos reservados.</footer>

</body>

</html>