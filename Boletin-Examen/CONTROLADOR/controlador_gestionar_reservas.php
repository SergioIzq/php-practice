<?php 
require_once '../MODELO/modelo_cliente_gestionar_reservas.php';

// Verificar si hay una cookie definida y no está vacía
if (isset($_COOKIE['correo_sesion']) && !empty($_COOKIE['correo_sesion'])) {
    $correo_sesion = $_COOKIE['correo_sesion'];

    // Crear una instancia del modelo
    $gestionarReservas = new GestionarReservas();

    // Consultar las reservas activas asociadas al correo en la cookie
    $reservas = $gestionarReservas->consultarReservasActivasPorCorreo($correo_sesion);

    // Verificar si se ha enviado el formulario para cancelar una reserva
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cancelar_reserva"])) {
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $mesa = $_POST["mesa"];
        // Eliminar la reserva
        $gestionarReservas->eliminarReserva($fecha, $hora, $mesa, $correo_sesion);
        // Redirigir para evitar el reenvío del formulario
        header("Location: controlador_gestionar_reservas.php");
        exit;
    }

    // Cargar la vista
    require '../VISTA/vista_gestionar_reservas.php';
} else {
    // Si la cookie no está definida o está vacía, redirigir a otra página
    header("Location: ../index.php");
    exit;
}




