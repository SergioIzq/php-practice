<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
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
                <h1>Calculadora</h1>   
            </div>
        <?php
        // Verificar si el usuario ha enviado el formulario
        if (isset($_POST['send'])) {
            $divideByZero = false;
            $button = $_POST['send'];
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $result = '';
            
            //Switch para que dependiendo del botón pulsado se haga una operación u otra
            switch ($button) {
                case "+":
                    $result = "El resultado de " . $num1 . " + " . $num2 . " es " . ($num1 + $num2);
                    break;
                case "-":
                    $result = "El resultado de " . $num1 . " - " . $num2 . " es " . ($num1 - $num2);
                    break;
                case "/":
                    if($num2 != 0 && $num1 != 0) {
                        $result = "El resultado de " . $num1 . " / " . $num2 . " es " . ($num1 / $num2);
                    }else{
                        $divideByZero = true;
                    }
                    break;
                case "*":
                    $result = "El resultado de " . $num1 . " * " . $num2 . " es " . ($num1 * $num2);
                    break;
            }                            
        ?>
        <div class="resultado">
            <p><?php 
                    if($divideByZero) {
                ?>
                        <p style="color: red;">Infinito</p>
                <?php
                    }else {
                        echo $result; 
                    }
                ?>
            </p>
            <form method="get">
                <button type="submit" class="submit btn btn-info" name="goBack">Volver atrás</button>
            </form>
        </div>
        <?php
        // Si no se ha enviado, mostrar el formulario
        } else {
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label class="num1" for="number">Introduzca dos números</label>
                <input class="number-input" type="number" name="num1" placeholder="Número 1" required />
                <input class="number-input" type="number" name="num2" placeholder="Número 2" required />
                <div class="buttons">
                    <button type="submit" class="submit btn btn-info" name="send" value="+">+</button>
                    <button type="submit" class="submit btn btn-info" name="send" value="-">-</button>
                    <button type="submit" class="submit btn btn-info" name="send" value="/">/</button>
                    <button type="submit" class="submit btn btn-info" name="send" value="*">*</button>
                </div>  
            </form>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>
