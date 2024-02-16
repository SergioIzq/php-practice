<?php
require 'bbdd.php';

function agregarEmpleado($usuario, $contrasena)
{
    // Crear una instancia de la clase Database
    $db = new Database();

    // Conectar a la base de datos
    $db->conectar();

    try {
        // Verificar si el usuario ya existe
        if (existeEmpleado($usuario)) {
            ?>
            <div class="consultaHTML">
                El usuario ya existe
            </div>
            <?php
            return false;
        }

        // Preparar la consulta SQL para insertar el nuevo empleado
        $stmt = $db->conn->prepare("INSERT INTO empleados (usuario, contrasena) VALUES (:usuario, :contrasena)");

        // Bind de parámetros
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':contrasena', $contrasena);

        // Ejecutar la consulta
        $stmt->execute();

        // El empleado se agregó correctamente
        return true;
    } catch (PDOException $e) {
        // Capturar excepciones y mostrar un mensaje de error
        ?>
        <div class="consultaHTML">
            Error al agregar empleado:
            <?php $e->getMessage(); ?>
        </div>
        <?php
        return false;
    } finally {
        // Desconectar de la base de datos
        $db->desconectar();
    }
}

// Función para verificar si un usuario ya existe
function existeEmpleado($usuario)
{
    // Crear una instancia de la clase Database
    $db = new Database();

    // Conectar a la base de datos
    $db->conectar();

    try {
        // Preparar la consulta SQL para buscar el usuario en la base de datos
        $stmt = $db->conn->prepare("SELECT * FROM empleados WHERE usuario = :usuario");

        // Bind de parámetro
        $stmt->bindParam(':usuario', $usuario);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado como un array asociativo
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si se encontró algún registro, el usuario ya existe
        return $resultado ? true : false;
    } catch (PDOException $e) {
        // Capturar excepciones y mostrar un mensaje de error
        echo "Error al verificar existencia de usuario: " . $e->getMessage();
        return false;
    } finally {
        // Desconectar de la base de datos
        $db->desconectar();
    }
}
