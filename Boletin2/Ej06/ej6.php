<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar imagen en servidor</title>
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
               <h1>Imagen para cargar</h1>
            </div>
        <?php
         if(isset($_POST['enviar'])) {
                // Verificar si el usuario ha enviado el formulario, si es así le muestro lo que ha enviado con una bienvenida
                if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
                    $imagenNombre = $_FILES["imagen"]["name"];
                    $imagenTemp = $_FILES["imagen"]["tmp_name"];
                    // Mover el archivo a una ubicación específica
                    $carpetaDestino = "./imagenes";
                    $rutaCompleta = $carpetaDestino . $imagenNombre;
                    move_uploaded_file($imagenTemp, $rutaCompleta);
                    // Quitamos la extension de la imagen
                    $posPunto = strrpos($imagenNombre, '.');
                    if ($posPunto !== false) {
                        $imagenNombre = substr($imagenNombre, 0, $posPunto);
                  }
                  ?>
                    <?php
             } else {
                    ?><p>Error: No se ha seleccionado ninguna imagen.</p><?php
             }
         ?>
            <div class="resultado">
            <!-- Mostrar la imagen cargada -->
                <img src='<?php echo $rutaCompleta ?>' alt='Imagen Cargada'>
            </div>
           <?php
            // Si no lo ha enviado, se lo muestro para que lo rellene y envíe
            } else {
            ?>
        <!-- El action es para que se ejecute el código del mismo PHP en vez de enviarlo a otro PHP -->
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                <label class="number" for="number">Seleccione una foto de su equipo para mostrar</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" required>
                <button type="submit" class="submit btn btn-info" name="enviar">Cargar imagen</button>
        </form>
     </div>
    </div>
    <?php } ?>
</body>
</html>
