<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Guía Turística</title> 
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
            position: relative;
            border: 2px solid #ccc; 
            padding: 20px; 
            background-color: #ffffff;
            text-align: center;
        }
        
        h1 {
            text-align: center;
            padding: 20px;
            color: #ffffff;
        }
        
        .form-label {
            font-size: 20px;
        }
        
        .form-select-container {
            position: relative;
        }

        .form-select {
            font-size: 20px;
            width: calc(100% - 40px); 
            padding: 10px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .bandera {
            position: absolute;
            top: 50%;
            right: 87px;
            transform: translateY(-50%);
            width: 30px; 
            vertical-align: middle;
        }

        .form-floating {
            margin-bottom: 20px;
            position: relative; 
            width: calc(100% - 40px); 
        }

        #nombre {
            width: calc(100% - 22px); 
        }
        #pais {
        height: 63px;
        }        
    </style>   
</head>
<body>   
    <h1><b><u>Bienvenido a la guía turística</b></u></h1>
    <!-- Creo el formulario y cuando pulse el botón enviar será redirigido a ciudad.php -->
    <form method="post" action="ciudad.php">
        <div class="form-select-container">
            <label for="pais" class="form-label">Selecciona un país</label>
            <br>
            <div class="form-floating mb-3">
                <select class="form-select" name="pais" id="pais" onchange="cargarBandera(this.value)">    
                    <?php
                        // Creo un array que son las opciones mostradas posteriormente en el formulario
                        $opciones = array('España','Portugal','Austria','Irlanda','Islandia','Eslovaquia','Estonia','Finlandia','Italia','Luxemburgo','Lituania','Grecia','Países Bajos');
                        // Genero las opciones dinámicamente para mostrar en navegador mediante mi ya creado array
                        foreach ($opciones as $pais) {
                            echo "<option value=\"$pais\">$pais</option>";
                        }
                    ?>
                </select>
                <label for="pais">País</label>
                <!-- Imagen por defecto de la bandera de España ya que en el menú siempre aparece primero, esta ruta irá cambiando dependiendo de la elección del país del usuario gracias a la función de javascript posteriormente escrita -->
                    <div id="banderas">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Spain.svg/2560px-Flag_of_Spain.svg.png" id="bandera" class="bandera"> 
                    </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
            <label for="nombre">Nombre</label>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>

    <!-- He implementado javascript para mejorar la página web pero no afecta en nada a la lógica de programación -->
    <script>
        // Función para traducir el nombre del país de español a inglés
        function traducirANombreIngles(pais) {
            switch (pais) {
                case 'España':
                    return 'Spain';
                case 'Portugal':
                    return 'Portugal';
                case 'Austria':
                    return 'Austria';
                case 'Irlanda':
                    return 'Ireland';
                case 'Islandia':
                    return 'Iceland';
                case 'Eslovaquia':
                    return 'Slovakia';
                case 'Estonia':
                    return 'Estonia';
                case 'Finlandia':
                    return 'Finland';
                case 'Italia':
                    return 'Italy';
                case 'Luxemburgo':
                    return 'Luxembourg';
                case 'Lituania':
                    return 'Lithuania';
                case 'Grecia':
                    return 'Greece';
                case 'Países Bajos':
                    return 'Netherlands';
            }
        }

        function cargarBandera(paisSeleccionado) {
            // URL de la API para obtener información de todos los países
            const apiURL = 'https://restcountries.com/v3.1/all?fields=name,flags';
            // Realizar la solicitud a la API utilizando fetch
            fetch(apiURL)
                .then(response => response.json())
                .then(data => {
                    // Traducir el país seleccionado a inglés
                    const paisEnIngles = traducirANombreIngles(paisSeleccionado);
                    // Buscar el país traducido en la respuesta
                    const country = data.find(country => country.name.common === paisEnIngles);
                    if (country) {
                        // Obtener la URL de la bandera del país seleccionado
                        const banderaURL = country.flags.svg;
                        // Actualizar la imagen de la bandera en el documento
                        document.getElementById("bandera").src = banderaURL;
                    } else {
                        console.error('País no encontrado en la respuesta de la API');
                    }
                })
                .catch(error => {
                    console.error('Error al obtener la bandera:', error);
                });
        }
    </script>
</body>
</html>
