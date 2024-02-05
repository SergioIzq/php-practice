<?php

function crear_conexion($servidor, $usuario, $contrasena, $base_datos)
{
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos", $usuario, $contrasena);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        die("Error al conectar con la base de datos: " . $e->getMessage());
    }
}

function cerrar_conexion($conexion)
{
    $conexion = null;
}

function consulta_base_de_datos($consulta, $conexion)
{
    try {
        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        return $stmt;
    } catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
    }
}

function obtener_resultados($resultado)
{
    return $resultado->fetch(PDO::FETCH_ASSOC);
}

?>
