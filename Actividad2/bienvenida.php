<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bienvenida</title>
    <!-- He implementado CSS para mejorar la página web pero no afecta en nada a la lógica de programación -->
    <style>
        *{
            margin:0;
            padding:0;
        }

        body{
            padding: 50px;
            background-color: #3498db;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS';
       }

        h1{
            text-align:center;
            padding:20px;
            color: #ffffff;
        }

        form {
            border: 2px solid #ccc; 
            padding: 20px; 
            background-color: #ffffff;
        }
        .alert{
            text-align: center;
            width: 50%;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1><b><u>Bienvenido a la guía turística</b></u></h1>
    <?php       
        // Inicia la sesión en la página de bienvenida
        session_start();  
        // Recupera la variable de sesión y saneo el código para evitar inyección de código
        $nombre = htmlspecialchars($_SESSION['nombre']);
        // Recupera la variable del formulario anterior por el método POST y saneo el código para evitar inyección de código
        $ciudad = htmlspecialchars($_POST['ciudad']);
        if($nombre != null && $ciudad != null){
            // Genera el mensaje de bienvenida junto al link de la ciudad dependiendo este valor de la ciudad seleccionada en el anterior formulario
            echo "<div class='alert alert-primary' role='alert' style='text-align: center;'>Bienvenido/a $nombre, aquí tienes tu link a <div class=btn-group><a href='https://es.wikipedia.org/wiki/$ciudad' class='btn btn-primary active 'target='_blank'>$ciudad</a></div></div>";
            // Limpiar la variable de sesión después de usarla
            unset($_SESSION['nombre']);
        }else{
            // Función en PHP que no permite saltarse formularios sin haberlo rellenado
            header("Location: ciudad.php");
            exit;
            // Función en JSP que no permite saltarse formularios sin haberlo rellenado
            // <% response.sendRedirect("ciudad.jsp"); %>
            // Función en ASP que no permite saltarse formularios sin haberlo rellenado
            // <% Response.Redirect "ciudad.asp" %>
        }
    ?>
</body>
</html>
