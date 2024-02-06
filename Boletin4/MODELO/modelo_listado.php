<?php
require 'bbdd.php';

class Modelo {
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->conectar();
    }

    public function obtenerFamilias() {
        return $this->db->consultarFamilias();
    }

    public function obtenerProductos($codigoFamiliaSeleccionada) {
        return $this->db->consultarProductos($codigoFamiliaSeleccionada);
    }

    public function obtenerProductoPorCodigo($codigoProductoSeleccionado) {
        $consulta = $this->db->consultarProductoPorCodigo($codigoProductoSeleccionado);
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp) {
        $stmt = $this->db->prepare('UPDATE producto SET nombre_corto = ?, nombre = ?, descripcion = ?, pvp = ? WHERE cod = ?');
        return $stmt->execute([$nombreCorto, $nombre, $descripcion, $pvp, $codigoProducto]);
    }
}
?>
