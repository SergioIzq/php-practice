<?php
require 'bbdd.php';

class ModeloVisualizarReservas
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
        $this->conexion->conectar();
    }

    public function consultarReservasPorFecha($fecha)
    {
        try {
            $sql = "SELECT * FROM reservas WHERE fecha = :fecha";
            $stmt = $this->conexion->conn->prepare($sql);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al consultar las reservas por fecha: " . $e->getMessage());
        }
    }

    public function cancelarReserva($fecha, $hora, $mesa, $correo)
    {
        try {
            $sql = "DELETE FROM reservas WHERE Fecha = :fecha AND Hora = :hora AND Mesa = :mesa AND Correo_cliente = :correo";
            $stmt = $this->conexion->conn->prepare($sql);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':hora', $hora);
            $stmt->bindParam(':mesa', $mesa);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error al cancelar la reserva: " . $e->getMessage());
        }
    }
}

