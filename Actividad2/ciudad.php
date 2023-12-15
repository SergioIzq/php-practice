<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ciudad</title>
    <!-- He implementado CSS para mejorar la página web pero no afecta en nada a la lógica de programación -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            padding: 50px;
            background-color: #3498db;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS';
        }

        form {
            border: 2px solid #ccc; 
            padding: 20px; 
            background-color: #ffffff;
            text-align: center; /* Centra el contenido del formulario */
        }
        
        h1 {
            text-align: center;
            padding: 20px;
            color: #ffffff;
        }
        
        .form-label{
            font-size:20px;

        }
        
        .form-select{
            font-size:20px;
        }
        .btn-group{
            text-align:center;
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
        // Inicio la sesión para pasar la variable nombre a la siguiente página ya que sino se perdería
        session_start();  
        // Creo la expresión regular para controlar el nombre
        $regex = '/^[A-Z][a-zA-ZáéíóúüÁÉÍÓÚÜñÑ\s]*$/';
        // Recogo las variables país y nombre del anterior formulario mediante el método POST y saneo el código para evitar inyección de código
        $pais = htmlspecialchars($_POST["pais"]);
        $nombre = htmlspecialchars($_POST["nombre"]);
        // Creo el array de un array asociativo de paises cada uno con un array de sus cinco ciudades
        $paises = array(
            "España" => array("Lugo", "Cádiz", "Almería", "Sevilla", "Alicante"),
            "Portugal" => array("Lisboa", "Oporto", "Faro", "Coímbra", "Évora"),
            "Austria" => array("Viena", "Salzburgo", "Innsbruck", "Graz", "Linz"),
            "Irlanda" => array("Dublín", "Cork", "Galway", "Limerick", "Waterford"),
            "Islandia" => array("Reikiavik", "Akureyri", "Hafnarfjörður", "Kópavogur", "Reykjanesbær"),
            "Eslovaquia" => array("Bratislava", "Košice", "Prešov", "Žilina", "Nitra"),
            "Estonia" => array("Tallin", "Tartu", "Narva", "Pärnu", "Kohtla-Järve"),
            "Finlandia" => array("Helsinki", "Espoo", "Tampere", "Vantaa", "Turku"),
            "Italia" => array("Roma", "Milán", "Florencia", "Venecia", "Nápoles"),
            "Luxemburgo" => array("Luxemburgo", "Esch-sur-Alzette", "Differdange", "Dudelange", "Echternach"),
            "Lituania" => array("Vilna", "Kaunas", "Klaipėda", "Šiauliai", "Panevėžys"),
            "Grecia" => array("Atenas", "Tesalónica", "Heraklion", "Patras", "Rhodes"),
            "Países Bajos" => array("Ámsterdam", "Róterdam", "La Haya", "Utrecht", "Eindhoven"),
        );        
            // Compruebo que los datos son recibidos por el método POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                // Compruebo que tanto el nombre como el país estan rellenos sino lo mando al index
                if($nombre != null && $pais != null){            
                // Compruebo que el nombre introducido coincide con las pautas marcadas sino no avanza en PHP                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                    if(preg_match($regex,$nombre)){
                // Compruebo que el nombre introducido coincide con las pautas marcadas sino no avanza en JSP
                        // <%@ page import="java.util.regex.Pattern" %>
                        // <%@ page import="java.util.regex.Matcher" %>
                        // // Definir la expresión regular
                        // String regex = "tu_expresion_regular_aqui";
                        // // Obtener el nombre del parámetro (puedes obtenerlo según tus necesidades)
                        // String nombre = request.getParameter("nombre");
                        // // Crear el objeto Pattern y Matcher
                        // Pattern pattern = Pattern.compile(regex);
                        // Matcher matcher = pattern.matcher(nombre);
                        // // Realizar la coincidencia
                        // if (matcher.matches()) {
                        //     // La cadena coincide con la expresión regular

                        // } else {
                        //     // La cadena no coincide con la expresión regular
                                
                        // }
                        // %>
                // Compruebo que el nombre introducido coincide con las pautas marcadas sino no avanza en ASP        
                        // <%
                        //     ' Definir la expresión regular
                        //     Dim regex
                        //     Set regex = New RegExp
                        //     regex.Pattern = "tu_expresion_regular_aqui"

                        //     ' Obtener el valor del parámetro (ajusta según tus necesidades)
                        //     Dim nombre
                        //     nombre = Request("nombre")

                        //     ' Realizar la coincidencia
                        //     If regex.Test(nombre) Then
                        //         ' La cadena coincide con la expresión regular
                        //         Response.Write("Coincidencia exitosa")
                        //     Else
                        //         ' La cadena no coincide con la expresión regular
                        //         Response.Write("No hay coincidencia")
                        //     End If
                        // %>

                        // Si es correcto el nombre lo guardo en una sesión para que no se pierda y poder usarlo más tarde
                        $_SESSION['nombre'] = $nombre;                        
                        // Muestro el formulario de ciudades
                        echo "<form method=\"post\" action=\"bienvenida.php\">";
                        echo "<label for=\"ciudad\" class=form-label>Selecciona una ciudad</label>";
                        echo "<br>";
                        echo "<select name=\"ciudad\" class=form-select id=\"ciudad\">";                        
                            // Recorro mi array generando dinámicamente tantas opciones como países tenga 
                            foreach ($paises[$pais] as $ciudades) {
                                echo "<option value=\"$ciudades\">$ciudades</option>";
                            }                            
                        echo "</select>";
                        echo "<br>";
                        echo "<input type=\"submit\" class=\"btn btn-primary\" value=\"Enviar\">";
                        echo "</form>";  
                    }else{
                        // Se ejecuta si el nombre no cumple las pautas impuestas
                        echo '<div class="alert alert-primary" role="alert" style="text-align: center;">Usuario inválido</div>';
                        echo '<div style="text-align: center;">';
                        echo '<div class="btn-group"><a href="index.php" class="btn btn-primary active">Volver atrás</a></div>';
                        echo '</div>';
                    }
            } else {
                // Función en php que no permite saltarse formularios sin haberlo rellenado
                header("Location: index.php");
                exit;
                // Función en JSP que no permite saltarse formularios sin haberlo rellenado
                // response.sendRedirect("index.jsp");
            }
        }else{
            // Función en php que no permite saltarse formularios sin haberlo rellenado
            header("Location: index.php");
            exit;
            // Función en JSP que no permite saltarse formularios sin haberlo rellenado
            // response.sendRedirect("index.jsp");
            // Función en ASP que no permite saltarse formularios sin haberlo rellenado
            // Response.Redirect "index.asp"
        }        
    ?>
</body>
</html>