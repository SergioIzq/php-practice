<?php
require_once 'bbdd.php';

class ModeloActualizar {
    private $bbdd;

    public function __construct() {
        $this->bbdd = new Database();
        $this->bbdd->conectar();
    }

    public function actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp) {
        $this->bbdd->actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp);
    }
}
?>
