<?php

// Se requiere el archivo bbdd.php que contiene la clase Database
require 'bbdd.php';

class Modelo {
    // Propiedad para la instancia de la base de datos
    private $db;

    // Constructor de la clase
    public function __construct() {
        $this->db = new Database();
        $this->db->conectar();
    }

    // Método para obtener todas las familias
    public function obtenerFamilias() {
        return $this->db->consultarFamilias();
    }

    // Método para obtener los productos de una familia específica
    public function obtenerProductos($codigoFamiliaSeleccionada) {
        return $this->db->consultarProductos($codigoFamiliaSeleccionada);
    }

    // Método para obtener un producto por su código
    public function obtenerProductoPorCodigo($codigoProductoSeleccionado) {
        $consulta = $this->db->consultarProductoPorCodigo($codigoProductoSeleccionado);
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    // Método para actualizar un producto
    public function actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp) {
        $stmt = $this->db->prepare('UPDATE producto SET nombre_corto = ?, nombre = ?, descripcion = ?, pvp = ? WHERE cod = ?');
        return $stmt->execute([$nombreCorto, $nombre, $descripcion, $pvp, $codigoProducto]);
    }
}

?>
