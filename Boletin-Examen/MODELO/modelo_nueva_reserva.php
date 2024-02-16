<?php

require_once 'bbdd.php'; // Incluimos el archivo bbdd.php

class Reserva
{
    private $conexion;

    public function __construct()
    {
        // Establecemos la conexión a la base de datos al crear una instancia del modelo
        $this->conexion = new Database();
        $this->conexion->conectar(); // Conectamos a la base de datos
    }

    public function consultarDisponibilidad($fecha, $hora)
    {
        try {
            // Obtener el correo del cliente de la cookie
            $correo_cliente = isset($_COOKIE['correo_sesion']) ? $_COOKIE['correo_sesion'] : '';

            // Verificar si hay menos de 5 reservas para la fecha, hora y correo del cliente específicos
            $sql = "SELECT COUNT(*) as num_reservas FROM reservas WHERE fecha = :fecha AND hora = :hora AND correo_cliente = :correo_cliente";
            $stmt = $this->conexion->conn->prepare($sql);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':hora', $hora);
            $stmt->bindParam(':correo_cliente', $correo_cliente);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['num_reservas'] < 5; // Devuelve true si hay menos de 5 reservas para el cliente
        } catch (PDOException $e) {
            // Manejo de excepciones
            ?>
            <div class="consultaHTML">
                <p>
                    <?php die("Error al consultar disponibilidad: " . $e->getMessage()); ?>
                </p>
            </div>
            <?php
        }
    }

    public function realizarReserva($fecha, $hora, $descripcion, $mesa)
    {
        try {
            // Obtener el correo del cliente de la cookie
            $correo_cliente = isset($_COOKIE['correo_sesion']) ? $_COOKIE['correo_sesion'] : '';

            // Realizar la reserva insertando los datos en la base de datos
            $sql = "INSERT INTO reservas (fecha, hora, descripcion, mesa, correo_cliente) VALUES (:fecha, :hora, :descripcion, :mesa, :correo_cliente)";
            $stmt = $this->conexion->conn->prepare($sql);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':hora', $hora);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':mesa', $mesa);
            $stmt->bindParam(':correo_cliente', $correo_cliente);

            return $stmt->execute(); // Devuelve true si la reserva se realizó correctamente
        } catch (PDOException $e) {
            // Manejo de excepciones
            ?>
            <div class="consultaHTML">
                <p> 
                    <?php die("Error al realizar la reserva: " . $e->getMessage()); 
                    ?>
                </p>
            </div>
            <?php
        }
    }
}
?>
