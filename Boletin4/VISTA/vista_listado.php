<?php require 'VISTA/LAYOUT/layout.php'; ?>

<div class="container">

    <!-- Formulario para mostrar al usuario las familias a seleccionar generado de forma dinámica -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="familia">Selecciona una familia:</label>
        <select name="familia" id="familia">
            <?php
            // Mostrar las opciones de familia
            foreach ($familias as $f) {
                ?><option value="<?php echo $f['cod']; ?>"><?php echo $f['nombre']; ?> </option>
                <?php
            }
            ?>
        </select>
        <button type="submit">Mostrar</button>
    </form>

    <!-- Mostrar los resultados en una tabla o mensaje de no hay stock -->
    <div class="container">
        <?php if (!empty($productos)) : ?>
            <h2>Productos en <?php echo $nombreFamilia; ?>:</h2>
            <div class="table-container">
                <table>
                    <tr>
                        <th>Nombre Corto</th><th>PVP</th>
                    </tr>
                    <?php foreach ($productos as $producto) : ?>
                        <tr>
                            <td><?php echo $producto['nombre_corto']; ?></td>
                            <td><?php echo $producto['pvp']; ?></td>
                            <td class="fila-editar">
                            <form class="button-editar" action='<?php echo EDITAR_PRODUCTO_URL; ?>' method='post'>
                                <input type='hidden' name='producto_cod' value="<?php echo $producto['cod']; ?>">
                                <button type='submit' name='editar_producto'>Editar</button>
                            </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php else : ?>
            <div class="noStock">
                <p>No hay stock en <strong><?php echo $nombreFamilia; ?></strong></p>
            </div>
        <?php endif; ?>
    </div>
</div>
