<?php

require 'bbdd.php';

class ModeloEditar {
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->conectar();
    }

    public function obtenerProducto($codigoProducto) {
        return $this->db->consultarProductoPorCodigo($codigoProducto);
    }

    public function actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp) {
        return $this->db->actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp);
    }
}

?>
