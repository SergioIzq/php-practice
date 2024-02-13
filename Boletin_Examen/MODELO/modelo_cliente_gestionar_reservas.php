<?php

require_once 'bbdd.php';

class GestionarReservas
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
        $this->conexion->conectar();
    }

    public function consultarReservasActivasPorCorreo($correo)
    {
        try {
            // Obtener la fecha y hora actual
            $fecha_actual = date('Y-m-d');
            $hora_actual = date('H:i');

            // Combinar fecha y hora actual en un solo formato
            $fecha_hora_actual = $fecha_actual . ' ' . $hora_actual;

            $sql = "SELECT * FROM reservas WHERE correo_cliente = :correo AND CONCAT(fecha, ' ', hora) >= :fecha_hora_actual";
            $stmt = $this->conexion->conn->prepare($sql);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':fecha_hora_actual', $fecha_hora_actual);
            $stmt->execute();            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al consultar las reservas activas: " . $e->getMessage());
        }
    }

    public function eliminarReserva($fecha, $hora, $mesa, $correo)
    {
        try {
            $sql = "DELETE FROM reservas WHERE fecha = :fecha AND hora = :hora AND mesa = :mesa AND correo_cliente = :correo";
            $stmt = $this->conexion->conn->prepare($sql);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':hora', $hora);
            $stmt->bindParam(':mesa', $mesa);
            $stmt->bindParam(':correo', $correo);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error al eliminar la reserva: " . $e->getMessage());
        }
    }
}

