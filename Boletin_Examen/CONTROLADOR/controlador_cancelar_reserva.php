<?php
require '../MODELO/modelo_personal_gestionar_reservas.php';
// Verificar si se ha recibido una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si se han enviado los datos de la reserva a cancelar
    if (isset($_POST["fecha"]) && isset($_POST["hora"]) && isset($_POST["mesa"]) && isset($_POST["correo"])) {
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $mesa = $_POST["mesa"];
        $correo = $_POST["correo"];

        // Crear una instancia del modelo
        $modeloReservas = new ModeloVisualizarReservas();

        // Cancelar la reserva utilizando el modelo
        $modeloReservas->cancelarReserva($fecha, $hora, $mesa, $correo);

        // Redirigir a la página de visualización de reservas
        header("Location: ../VISTA/vista_personal_ver_reservas.php");
        exit;
    }
}

