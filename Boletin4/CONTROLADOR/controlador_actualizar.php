<?php
require_once '../MODELO/modelo_actualizar.php';

// Lógica de negocio
$modelo = new ModeloActualizar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigoProducto = $_POST["producto_cod"];
    $nombreCorto = $_POST["nombre_corto"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $pvp = $_POST["pvp"];

    $modelo->actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp);
    include '../VISTA/vista_actualizar.php';
} else {
    echo "Error de formulario";
}
?>
