<?php
// Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Asegurarse de que 'voto' esté definido y no sea nulo
    if (isset($_POST['voto'])) {
        $voto = $_POST['voto'];

        // Asumiendo que el DNI del empleado se pasó a través de la URL
        if (isset($_POST['dni_empleado'])) {
            $dni_empleado = $_POST['dni_empleado'];

            // Asumiendo que tienes una conexión a la base de datos llamada $pdo
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=DEPARTAMENTOS', 'gestor_empleados', 'gestorGESTOR2');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Error al conectar a la base de datos: ' . $e->getMessage());
            }

            // Aquí puedes realizar la validación del voto, verificar si el usuario ya votó, etc.
            // ...

            // Actualizar el voto del empleado
            $stmtActualizarVoto = $pdo->prepare("UPDATE empleados SET vota_a = ? WHERE DNI = ?");
            $stmtActualizarVoto->execute([$voto, $dni_empleado]);

            // Verificar si se actualizó correctamente el voto
            $filasAfectadas = $stmtActualizarVoto->rowCount();
            if ($filasAfectadas > 0) {
                echo "Voto actualizado correctamente. Redireccionando a la página de resultados...";
                // Esperar 2 segundos antes de redirigir
                header("refresh:2;url=resultados.php");
                exit();
            } else {
                echo "Error al actualizar el voto.";
            }
        } else {
            echo "Error: Falta el parámetro 'dni_empleado' en la URL.";
        }
    } else {
        echo "Error: Faltan parámetros en la solicitud POST.";
    }
}
?>
