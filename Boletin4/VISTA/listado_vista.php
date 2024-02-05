
    <div class="container">

    <!-- Formulario para mostrar al usuario las familias a seleccionar generado de forma dinámica -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="familia">Selecciona una familia:</label>
        <select name="familia" id="familia">
            <?php
            // Mostrar las opciones de familia
            foreach ($familias as $familia) {
                ?><option value = <?php echo $familia['cod']; ?> ><?php echo $familia['nombre']; ?> </option>
                <?php
            }
                ?>
        </select>
        <button type="submit">Mostrar</button>
    </form>
        <!-- // Mostrar los resultados en una tabla o mensaje de no hay stock -->
        
    <?php
    if (!empty($productos)) {
        ?>
        </div>
        <div class="container">
            <h2>Productos en <?php echo $nombreFamilia; ?>:</h2>
        </div>
        <div class="container">
            <div class="table-container">
                <table>
                    <tr>
                        <th>Nombre Corto</th><th>PVP</th>
                    </tr>
                <?php
                foreach ($productos as $producto) {
                    ?>                
                    <tr>
                        <td><?php echo $producto['nombre_corto']; ?></td>
                        <td><?php echo $producto['pvp']; ?></td>
                        <td>
                        <form class="button-editar" action='editar.php' method='post'>
                            <input type='hidden' name='producto_cod' value = <?php echo $producto['cod']; ?>>
                            <button type='submit'>Editar</button>
                        </form>
                        </td>
                    </tr>
                    <?php
                }            
                ?>
                </table>
            </div>
            <?php
        } else {
            ?>
            </div>

            <div class="noStock">
                <p>No hay stock en <strong><?php echo $nombreFamilia; ?></strong></p>
            </div>
            <?php
        }
    // }
    ?>

