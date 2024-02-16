<?php

require_once '../MODELO/modelo_nueva_reserva.php';
require '../VISTA/vista_nueva_reserva.php';

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar datos recibidos del formulario
    $fecha = $_POST['fechaReserva'];
    $hora = $_POST['horaReserva'];
    $descripcion = $_POST['desc'];
    $mesa = $_POST['mesa'];

    // Validar que la hora de reserva esté dentro de las horas permitidas
    $horas_permitidas = array("20:30", "21:00", "21:30", "22:00", "22:30", "23:00");
    if (!in_array($hora, $horas_permitidas)) {
        // Si la hora no está en el array de horas permitidas, mostrar un mensaje de error
        ?>
        <div class="consultaHTML">
            <p>Lo sentimos, la hora de reserva no es válida.</p>
        </div>
        <div class="consultaHTML">
            <p>El rango horario disponible es de: 20:30 a 23:00 cada 30 min.</p>
        </div>
        <?php
        exit; // Detener la ejecución del script
    }

    // Crear instancia de modelo
    $reserva = new Reserva(); // No necesitamos pasar la conexión al modelo

    // Consultar disponibilidad
    $disponible = $reserva->consultarDisponibilidad($fecha, $hora);

    if ($disponible) {
        // Realizar reserva
        $reservaExitosa = $reserva->realizarReserva($fecha, $hora, $descripcion, $mesa);

        if ($reservaExitosa) {
            // Redirigir a una página de éxito o mostrar un mensaje de éxito
            ?>
            <div class="consultaHTML">
                <p>¡Reserva realizada con éxito!</p>
            </div>
            <?php
        } else {
            // Mostrar mensaje de error
            ?>
            <div class="consultaHTML">
                <p>Error al realizar la reserva. Por favor, inténtelo de nuevo.</p>
            </div>
            <?php
        }
    } else {
        // Mostrar mensaje de error
        ?>
        <div class="consultaHTML">
            <p>Lo sentimos, la fecha y hora seleccionadas no están disponibles. Por favor, elige otra.</p>
        </div>
        <?php
    }
}

?>