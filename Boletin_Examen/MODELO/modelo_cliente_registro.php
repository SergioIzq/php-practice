<?php
require 'bbdd.php';

function agregarCliente($correo, $contrasena)
{
    // Crear una instancia de la clase Database
    $db = new Database();

    // Conexión a la base de datos utilizando PDO
    try {
        $db->conectar();

        // Preparar la consulta SQL para insertar el cliente
        $stmt = $db->conn->prepare("INSERT INTO CLIENTES (Correo, Contrasena) VALUES (:correo, :contrasena)");

        // Bind de parámetros
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contrasena);

        // Ejecutar la consulta
        $stmt->execute();
        ?>
        <div class="consultaHTML">
            <p>Cliente agregado Correctamente.</p>
        </div>
        <div class="consultaHTML">
            <p>Redireccionando a inicio de sesión.</p>
        </div>
        <?php
    } catch (PDOException $e) {
        ?>
        <div class="consultaHTML">
            <p>Error al agregar cliente</p>
        </div>
        <?php
    } finally {
        // Desconectar de la base de datos
        $db->desconectar();
    }
}
