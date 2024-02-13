<?php
// Verificar si hay una cookie definida y no está vacía
if(isset($_COOKIE['correo_sesion']) && !empty($_COOKIE['correo_sesion'])) {
    // Redirigir a otra página
    header("Location: controlador_cliente_sesion_iniciada.php");
    exit; // Terminar la ejecución del script
}

require '../VISTA/LAYOUT/layout.php';
require '../VISTA/vista_cliente_registro.php';
require '../MODELO/modelo_cliente_registro.php';

// Verificar si se han recibido los datos esperados del formulario
if (isset($_POST["email"]) && isset($_POST["contrasenia"])) {
    // Obtener los datos del formulario
    $correo = $_POST["email"];
    $contrasena = $_POST["contrasenia"];

    // Llamar a la función agregarCliente del modelo para insertar el cliente en la base de datos
    agregarCliente($correo, $contrasena);
    header("refresh:3;url=controlador_cliente_inicia_sesion.php");
}

