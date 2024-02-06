<?php
    require 'MODELO/modelo_listado.php';

    // Crear una instancia del modelo
    $modelo = new Modelo();

    // Lógica para obtener datos necesarios para la vista
    $familias = $modelo->obtenerFamilias();

    // Variable para almacenar el nombre de la familia seleccionada
    $nombreFamilia = '';

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codigoFamiliaSeleccionada = $_POST["familia"];

        // Actualizar el nombre de la familia seleccionada
        foreach ($familias as $familia) {
            if ($familia['cod'] == $codigoFamiliaSeleccionada) {
                $nombreFamilia = $familia['nombre'];
                break;
            }
        }  

        $productos = $modelo->obtenerProductos($codigoFamiliaSeleccionada);
    }

    // Incluir el código de la vista
    include 'VISTA/vista_listado.php';  
?>
