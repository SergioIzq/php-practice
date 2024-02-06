<?php
    require 'MODELO/modelo_listado.php';

    // Incluir el archivo config.php
    require 'MODELO/config.php';

    // Crear una instancia del modelo
    $modelo = new Modelo();

    // Lógica para obtener datos necesarios para la vista
    $familias = $modelo->obtenerFamilias();

    // Variable para almacenar el nombre de la familia seleccionada
    $nombreFamilia = '';

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el código de la familia seleccionada
        $codigoFamiliaSeleccionada = $_POST["familia"];

        // Actualizar el nombre de la familia seleccionada
        foreach ($familias as $familia) {
            if ($familia['cod'] == $codigoFamiliaSeleccionada) {
                $nombreFamilia = $familia['nombre'];
                break;
            }
        }

        if (isset($_POST['editar_producto']) && isset($_POST['producto_cod'])) {
            $codigoProductoSeleccionado = $_POST['producto_cod'];
            redirigir(EDITAR_PRODUCTO_URL . "?cod=$codigoProductoSeleccionado");
        }        

        // Realizar la consulta a la base de datos utilizando el código de la familia
        $productos = $modelo->obtenerProductos($codigoFamiliaSeleccionada);
    }

    // Incluir el código de la vista
    include 'VISTA/vista_listado.php';  
?>
