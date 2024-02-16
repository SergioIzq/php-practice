<?php

require_once 'bbdd.php';

class HistoricoReservas
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
        $this->conexion->conectar();
    }

    public function consultarReservasPasadas($correo)
    {
        try {
            // Obtener la fecha actual
            $fecha_actual = date('Y-m-d');
    
            $sql = "SELECT * FROM reservas WHERE fecha < :fecha_actual AND correo_cliente = :correo ORDER BY fecha DESC";
            $stmt = $this->conexion->conn->prepare($sql);
            $stmt->bindParam(':fecha_actual', $fecha_actual);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al consultar las reservas pasadas: " . $e->getMessage());
        }
    }
    
}
