<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma de números con formato entre comas</title>
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
    <?php
        // Función para multiplicar el número dado por parámetro y mostrarlo en una lista desordenada
        function addNumbers($numbers) {
            $pattern = '/^\d+(\s*,\s*\d+)*$/';
            if (preg_match($pattern, $numbers)) {
                $numbersArray = explode(",", $numbers);
                $result = array_sum($numbersArray);
                ?>
                <p>La suma de los números dados es <?php echo $result; ?></p>
                <?php
            } else {
                ?>
                <p style="color: red;">Formato recibido incorrecto debe ser (numero1, numero2, ...)</p>
                <?php
            }
        }
        
        
    ?>
    <div class="content">
        <div class="container">
            <div class="h1">
                <h1>Formulario con GET (Tabla de multiplicar)</h1>   
            </div>
        <?php
        // Verificar si el usuario ha enviado el formulario, si es así le muestro lo que ha enviado con una bienvenida
            if(isset($_POST['send'])) {
                $numbers  = $_POST['numbers'];                 
        ?>
        <div class="resultado">
            <?php             
                addNumbers($numbers)
            ?>
        </div>
        <?php
        // Si no lo ha enviado, se lo muestro para que lo rellene y envíe
            }else{
        ?>
        <!-- El action es para que se ejecute el código del mismo PHP en vez de enviarlo a otro PHP -->
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label class="number" for="number">Introduzca números con formato (num1,num2,num3)</label>
                <input class="number-input" type="text" name="numbers" placeholder="Número" />
                <button type="submit" class="submit btn btn-info" name="send">Enviar</button>
            </form>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>