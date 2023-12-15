<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario sencillo con GET</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="h1">
        <h1><span class="h1">Formulario con POST</span></h1>   
    </div>
    <?php
    // Verificar si el usuario ha enviado el formulario, si es así le muestro lo que ha enviado con una bienvenida
        if(isset($_POST['enviar'])) {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
    ?>
    <p class ="p-resultado">El nombre introducido ha sido: <?php print $nombre ?> y el correo ha sido <?php print $correo ?> </p>            
    <?php
    // Si no lo ha enviado, se lo muestro para que lo rellene y envíe
        }else{
    ?>
    <div class="container">
        <!-- El action es para que se ejecute el código del mismo PHP en vez de enviarlo a otro PHP -->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label class="nombre-label" for="nombre">Nombre</label></br>
                    <input class="nombre-input" type="text" name="nombre" placeholder="Nombre" /></br>
                    <label class="correo-input" for="correo">Correo electrónico</label></br>    
                    <input class="correo-input" type="text" name="correo" placeholder="Correo" /></br>
                    <button type="submit" class="submit btn btn-info" name="enviar">Enviar</button>
                </form>
            </div>
    <?php
        }
    ?>
</body>
</html>