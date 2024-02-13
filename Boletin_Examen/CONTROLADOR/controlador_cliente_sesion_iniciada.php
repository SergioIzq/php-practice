<?php 
// Verificar si se ha recibido el correo electrónico a través de la URL
if (isset($_GET["email"])) {
    $correo = $_GET["email"];
    // Ahora puedes usar $correo en tu lógica de sesión iniciada
} else {
    // Si no se recibe el correo electrónico, maneja el error apropiadamente
}

require '../VISTA/vista_cliente_sesion_iniciada.php';


