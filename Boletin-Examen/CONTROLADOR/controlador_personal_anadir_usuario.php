<?php
require_once '../VISTA/vista_personal_anadir_usuario.php';
require_once '../MODELO/modelo_personal_anadir_usuario.php';

// Verificar si la solicitud es a través del método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si se han recibido los datos esperados del formulario
    if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
        // Obtener el usuario y la contraseña del formulario
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        // Llamar a la función agregarEmpleado del modelo para insertar el nuevo empleado en la base de datos
        if (agregarEmpleado($usuario, $contrasena)) {
            // Empleado agregado correctamente
            ?>
            <div class="consultaHTML">
                El empleado se agregó correctamente.
            </div>
            <?php
        } else {
            // Error al agregar el empleado
            ?>
            <div class="consultaHTML">
                Error al agregar el empleado. Por favor, inténtelo de nuevo.
            </div>
            <?php
        }
    } else {
        // Si no se recibieron los datos esperados, mostrar un mensaje de error
        echo "No se han enviado todos los datos del formulario correctamente.";
    }
}
