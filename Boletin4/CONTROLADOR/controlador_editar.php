<?php

require_once '../MODELO/modelo_editar.php';

$modeloEditar = new ModeloEditar();

// Lógica para obtener y actualizar datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["producto_cod"])) {
        $codigoProducto = $_POST["producto_cod"];

        // Obtener datos del producto
        $producto = $modeloEditar->obtenerProducto($codigoProducto);

        // Verificar la acción del formulario
        if (isset($_POST["accion"])) {
            $accion = $_POST["accion"];            
        } else {
            // Mostrar formulario de edición
            require '../VISTA/vista_editar.php';
            
        }
    } else {
        echo "Error: No se ha proporcionado el código del producto para editar.";
    }
} else {
    echo "Error: No se ha enviado el formulario.";
}
?>
