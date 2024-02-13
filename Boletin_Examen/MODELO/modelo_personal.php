<?php
require 'bbdd.php';

function estaRegistradoEmpleado($usuario, $contrasena)
{
    // Crear una instancia de la clase Database
    $db = new Database();

    // Conectar a la base de datos
    $db->conectar();

    try {
        // Preparar la consulta SQL para buscar el usuario y la contraseña en la base de datos
        $stmt = $db->conn->prepare("SELECT * FROM empleados WHERE usuario = :usuario");

        // Bind de parámetro
        $stmt->bindParam(':usuario', $usuario);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado como un array asociativo
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró algún registro y si la contraseña coincide
        if ($resultado && $resultado['Contrasena'] === $contrasena) {
            // La contraseña coincide, el empleado está registrado
            return true;
        }

        // No se encontró ningún registro o la contraseña no coincide
        return false;
    } catch (PDOException $e) {
        // Capturar excepciones y mostrar un mensaje de error
        echo "Error al verificar empleado: " . $e->getMessage();
        return false;
    } finally {
        // Desconectar de la base de datos
        $db->desconectar();
    }
}
