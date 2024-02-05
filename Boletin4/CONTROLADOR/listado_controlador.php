<?php


// include 'listado_modelo.php';

// Conectar a la base de datos
try {
    $dwes = new PDO('mysql:host=localhost;dbname=dwes', 'user_dwes', 'userUSER2');
    $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '<p>Error al conectar con la base de datos: ' . $e->getMessage() . '</p>';
    die();
}

// Obtener las familias desde el modelo
$consultaFamilias = $dwes->query('SELECT nombre, cod FROM familia');
$familias = $consultaFamilias->fetchAll(PDO::FETCH_ASSOC);

// Incluir el código de la vista
include 'VISTA/listado_vista.php';
?>
