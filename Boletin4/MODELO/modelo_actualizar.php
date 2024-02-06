<?php
require_once 'bbdd.php';

class ModeloActualizar {
    // Propiedad para la instancia de la base de datos
    private $bbdd;

    // Constructor de la clase
    public function __construct() {
        $this->bbdd = new Database();
        $this->bbdd->conectar();
    }

    // Método para actualizar un producto
    public function actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp) {
        $this->bbdd->actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp);
    }
}
?>
