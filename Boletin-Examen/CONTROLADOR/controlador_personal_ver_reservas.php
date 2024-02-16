<?php 
require_once '../MODELO/modelo_personal_gestionar_reservas.php';

// Variable para almacenar las reservas
$reservas = [];

// Verificar si se ha recibido la fecha del formulario
if (isset($_POST["fecha"])) {
    $fecha = $_POST["fecha"];

    // Crear una instancia del modelo
    $modeloReservas = new ModeloVisualizarReservas();

    // Consultar las reservas por la fecha recibida
    $reservas = $modeloReservas->consultarReservasPorFecha($fecha);
}

// Incluir la vista con las reservas filtradas
require '../VISTA/vista_personal_ver_reservas.php';

