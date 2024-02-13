<?php require '../VISTA/LAYOUT/layout.php';
require '../VISTA/vista_cliente_inicia_sesion.php';
require '../MODELO/modelo_cliente_inicia_sesion.php';

// Verificar si la solicitud es a través del método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si se han recibido los datos esperados del formulario
    if (isset($_POST["email"]) && isset($_POST["contrasena"])) {
        // Obtener el correo electrónico y la contraseña del formulario
        $correo = $_POST["email"];
        $contrasena = $_POST["contrasena"];

        // Verificar si el usuario está registrado
        if (estaRegistradoUsuario($correo, $contrasena)) {
            // Usuario registrado, redirigir a una página de sesión iniciada
            header("refresh:3;url=controlador_cliente_sesion_iniciada.php?email=" . urlencode($correo));
            ?>
            <div class="consultaHTML">
                <p>Iniciando sesión...</p>            
            </div>
            <?php
            exit; // Terminar la ejecución del script
        } else {
            // Usuario no registrado o contraseña incorrecta, redirigir de nuevo a la página de inicio de sesión
            header("refresh:1;url=controlador_cliente_inicia_sesion.php");
            ?>
            <div class="consultaHTML">
                <p>Correo o contraseña incorrectos</p>            
            </div>
            <?php
            exit; // Terminar la ejecución del script
        }
    } else {
        // Si no se recibieron los datos esperados, redirigir de nuevo a la página de inicio de sesión
        header("refresh:3;url=controlador_cliente_inicia_sesion.php");
        ?>
        <div class="consultaHTML">
            <p>No se han enviado todos los datos del formulario correctamente. Redirigiendo.</p>
        </div>
        <?php
        exit; // Terminar la ejecución del script
    }
}
?>