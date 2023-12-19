<?php
    session_start();

    // Inicializar la lista de contactos como un array vacío
    if (!isset($_SESSION['contacts'])) {
     $_SESSION['contacts'] = [];
    }

    // Verificar si el formulario se ha enviado
    if (isset($_POST['send'])) {
        $name = $_POST['name'];
        $tel = $_POST['tel'];

    // Convertir a minúsculas el nombre ingresado y los nombres almacenados
        $lowercaseName = strtolower($name);
        $lowercaseContacts = array_map('strtolower', array_column($_SESSION['contacts'], 'name'));

        // Verificar si solo se ha proporcionado el nombre y no el teléfono
        if ($name !== '' && $tel === '') {
            // Buscar el índice del contacto por el nombre (ignorando mayúsculas y minúsculas)
            $index = array_search($lowercaseName, $lowercaseContacts, true);

            if ($index !== false) {
                // El nombre existe, eliminar el contacto completo
                unset($_SESSION['contacts'][$index]);

             // Reindexar el array para evitar problemas al mostrar la tabla HTML
                $_SESSION['contacts'] = array_values($_SESSION['contacts']);

                $_SESSION['mensaje'] = "Contacto eliminado: $name";
            } else {
                $_SESSION['mensaje'] = "Imposible borrar contacto. El nombre no existe en la agenda.";
            }
        } elseif ($name !== '' && $tel !== '') {
            // Limpiar cualquier mensaje previo almacenado en la sesión
            unset($_SESSION['mensaje']);

            // Verificar si el nombre ya existe en la lista de contactos (ignorando mayúsculas y minúsculas)
            $index = array_search($lowercaseName, $lowercaseContacts, true);

         if ($index !== false) {
            // El nombre ya existe, eliminar el contacto completo
                unset($_SESSION['contacts'][$index]);

                // Reindexar el array para evitar problemas al mostrar la tabla HTML
                $_SESSION['contacts'] = array_values($_SESSION['contacts']);
         }

         // Agregar el nuevo contacto a la lista en la sesión
            $_SESSION['contacts'][] = ['name' => $name, 'tel' => $tel];
        } else {
            // Almacenar un mensaje de advertencia en la sesión
            $_SESSION['mensaje'] = "Tanto el nombre como el teléfono son obligatorios!";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listín telefónico</title>
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
                <h1>Listín telefónico</h1>   
            </div>
            <div class="listContainer">
                <?php if (!empty($_SESSION['contacts'])) { ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['contacts'] as $contact) { ?>
                                <tr>
                                    <td><?php echo $contact['name']; ?></td>
                                    <td><?php echo $contact['tel']; ?></td>
                                </tr>
                            <?php 
                                } 
                            ?>
                        </tbody>
                    </table>
                <?php 
                    }
                ?>
            </div>

            <!-- El action es para que se ejecute el código del mismo PHP en vez de enviarlo a otro PHP -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label class="name-label" for="name">Nombre</label>   
                <input class="name-input" type="text" name="name" />
                <label class="phone-label" for="tel">Teléfono</label>   
                <input class="phone-input" type="tel" name="tel" />
                <button type="submit" class="submit btn btn-info" name="send">Registrar</button>
            </form>
            <?php
                // Mostrar el mensaje de advertencia si está presente
                if (isset($_SESSION['mensaje'])) {
                    ?><p style="color: red;"><?php echo $_SESSION['mensaje'];  ?></p><?php
                    // Limpiar el mensaje después de mostrarlo
                    unset($_SESSION['mensaje']);
                }
            ?>            
        </div>
    </div>
</body>
</html>
