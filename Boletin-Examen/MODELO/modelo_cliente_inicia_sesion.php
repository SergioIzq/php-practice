<?php
require 'bbdd.php';

function estaRegistradoUsuario($correo, $contrasena)
{
    // Crear una instancia de la clase Database
    $db = new Database();

    // Conectar a la base de datos
    $db->conectar();

    try {
        // Preparar la consulta SQL para buscar el correo y la contraseña en la base de datos
        $stmt = $db->conn->prepare("SELECT * FROM CLIENTES WHERE Correo = :correo AND Contrasena = :contrasena");

        // Bind de parámetros
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contrasena);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado como un array asociativo
        $resultado = $stmt->fetchAll();

        // Si se encontró algún registro, el usuario está registrado
        return count($resultado) > 0;
    } catch (PDOException $e) {
        // Capturar excepciones y mostrar un mensaje de error
        echo "Error al verificar usuario: " . $e->getMessage();
        return false;
    } finally {
        // Desconectar de la base de datos
        $db->desconectar();
    }
}

