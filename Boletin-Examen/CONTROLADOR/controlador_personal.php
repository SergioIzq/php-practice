<?php 
require '../VISTA/vista_personal.php';
require '../MODELO/modelo_personal.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si se han recibido los datos esperados del formulario
    if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
        // Obtener el usuario y la contraseña del formulario
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        // Verificar si el empleado está registrado
        if (estaRegistradoEmpleado($usuario, $contrasena)) {

            setcookie("usuario_sesion", $usuario, time() + (86400 * 30), "/"); // Cookie válida por 30 días

            // Empleado registrado, redirigir a una página de sesión iniciada
            header("refresh:3;url=controlador_personal_sesion_iniciada.php");
            ?>
            <div class="consultaHTML">
                <p>Iniciando sesión...</p>
            </div>
            <div class="loading">
                <div class="spinner-border text-secondary" role="status">
                    <span class="sr-only"></span>
                </div>
            </div>
            <?php
            exit; // Terminar la ejecución del script
        } else {
            // Usuario no registrado o contraseña incorrecta, redirigir de nuevo a la página de inicio de sesión
            header("refresh:1;url=controlador_personal.php");
            ?>
            <div class="consultaHTML">
                <p>Usuario o contraseña incorrectos</p>
            </div>
            <?php
            exit; // Terminar la ejecución del script
        }
    } else {
        // Si no se recibieron los datos esperados, redirigir de nuevo a la página de inicio de sesión
        header("refresh:3;url=controlador_personal.php");
        ?>
        <div class="consultaHTML">
            <p>No se han enviado todos los datos del formulario correctamente. Redirigiendo.</p>
        </div>
        <?php
        exit; // Terminar la ejecución del script
    }
}
