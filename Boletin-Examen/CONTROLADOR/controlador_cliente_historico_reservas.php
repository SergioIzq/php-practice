<?php
require_once '../MODELO/modelo_cliente_historico.php';

// Verificar si hay una cookie definida y no está vacía
if (isset($_COOKIE['correo_sesion']) && !empty($_COOKIE['correo_sesion'])) {
    $correo_sesion = $_COOKIE['correo_sesion'];

    // Crear una instancia del modelo
    $modeloHistoricoReservas = new HistoricoReservas();

    // Consultar las reservas pasadas asociadas al correo en la cookie
    $reservas_pasadas = $modeloHistoricoReservas->consultarReservasPasadas($correo_sesion);

    // Cargar la vista
    require '../VISTA/vista_cliente_historico_reservas.php';
} else {
    // Si la cookie no está definida o está vacía, redirigir a otra página
    header("Location: ../index.php");
    exit;
}

