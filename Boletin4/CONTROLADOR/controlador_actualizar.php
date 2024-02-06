<?php
require_once '../MODELO/modelo_actualizar.php';

$modelo = new ModeloActualizar();

// Verificación del método de solicitud HTTP
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtención de los datos del formulario
    $codigoProducto = $_POST["producto_cod"];
    $nombreCorto = $_POST["nombre_corto"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $pvp = $_POST["pvp"];

    // Llamada al método del modelo para actualizar el producto
    $modelo->actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp);

    include '../VISTA/vista_actualizar.php';
} else {
    echo "Error de formulario";
}
?>
