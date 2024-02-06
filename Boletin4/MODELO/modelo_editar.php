<?php

require 'bbdd.php';

class ModeloEditar {
    // Propiedad para la instancia de la base de datos
    private $db;

    // Constructor de la clase
    public function __construct() {
        $this->db = new Database();
        $this->db->conectar();
    }

    // Método para obtener un producto por su código
    public function obtenerProducto($codigoProducto) {
        return $this->db->consultarProductoPorCodigo($codigoProducto);
    }

    // Método para actualizar un producto
    public function actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp) {
        return $this->db->actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp);
    }
}

?>
