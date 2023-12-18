<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobar username y contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
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
        // Verificar si el usuario ha enviado el formulario, si es así le muestro lo que ha enviado con una bienvenida
            if(isset($_POST['send'])) {
                $username = $_POST['username'];
                $password= $_POST['password'];
                function checkCredentials($username, $password) {
                    $credentials = ["username" => "sergio_izquierdo", "password" => "contraseñaIndescifrable"];
                    if($username == $credentials["username"] && $password == $credentials["password"]) {
                        echo "El usuario y contraseña son correctos, bienvenido a mi página web!!";
                    }else{
                        echo "Usuario o contraseña incorrectos";
                    }
                }
        ?>
        <div class="resultado">
            <p><?php checkCredentials($username, $password  ) ?></p>            
        </div>
        <?php
        // Si no lo ha enviado, se lo muestro para que lo rellene y envíe
            }else{
        ?>
        <!-- El action es para que se ejecute el código del mismo PHP en vez de enviarlo a otro PHP -->
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label class="nombre-label" for="username">Nombre de usuario</label>   
                <input class="nombre-input" type="text" name="username" placeholder="Nombre" />
                <label class="password-input" for="password">Contraseña</label>
                <input class="password-input" type="password" name="password" placeholder="Contraseña" />
                <button type="submit" class="submit btn btn-info" name="send">Enviar</button>
            </form>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>