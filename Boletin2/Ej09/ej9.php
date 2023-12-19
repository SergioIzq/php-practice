<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobar fecha nacimiento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>                
    <div class="content">
        <div class="container">
            <div class="h1">
                <h1>Formulario con POST</h1>   
            </div>
        <?php
        // Verificar si el usuario ha enviado el formulario
        if(isset($_POST['send'])) {
            // Validar que la fecha no esté vacía
            if (!empty($_POST['date'])) {
                $userDate = new DateTime($_POST['date']);
                $currentDate = new DateTime();

                // Verificar que la diferencia de años sea al menos 1
                $age = $userDate->diff($currentDate);
                if ($age->y >= 1) {
        ?>
        <div class="resultado">
            <p>Su edad es <?php echo $age->y; ?> años</p>            
        </div>
        <?php
                } else {
        ?>
        <div class="resultado">
            <p style="color: red;">Debe ser mayor de 1 año.</p>
        </div>
        <?php
                }
            } else {
        ?>
        <div class="resultado">
            <p style="color: red;">Por favor, introduzca una fecha.</p>
        </div>
        <?php
            }
        } else {
        ?>
        <!-- El action es para que se ejecute el código del mismo PHP en vez de enviarlo a otro PHP -->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label class="date-label" for="date">Introduzca una fecha</label>   
            <input class="date-input" type="date" name="date" />
            <button type="submit" class="submit btn btn-info" name="send">Enviar</button>
        </form>
        <?php
        }
        ?>
        </div>
    </div>
</body>
</html>
