<?php

// Ruta base de tu proyecto
define('BASE_URL', 'http://localhost/php-practice/Boletin4/');

// Rutas específicas
define('EDITAR_PRODUCTO_URL', BASE_URL . 'CONTROLADOR/controlador_editar.php');
define('ACTUALIZAR_PRODUCTO_URL', BASE_URL . 'CONTROLADOR/controlador_actualizar.php');

// Otras rutas...

// Función para redirigir a una página específica
function redirigir($pagina) {
    header("Location: $pagina");
    exit();
}

?>
