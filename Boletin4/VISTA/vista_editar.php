<?php require '../VISTA/LAYOUT/layout.php'; ?>

<div class="titulo">
    <h2>Editar Producto</h2>
</div>

<div class="editar-form">
    <form method="post" action='controlador_actualizar.php'>
        <!-- Se agrega un campo oculto con el código del producto -->
        <input type="hidden" name="producto_cod" value="<?php echo $producto['cod']; ?>">

        <label for="nombre_corto">Nombre Corto:</label>
        <!-- Campo de entrada para el nombre corto -->
        <input type="text" name="nombre_corto" value="<?php echo $producto['nombre_corto']; ?>" required><br>

        <label for="nombre">Nombre:</label>
        <!-- Campo de entrada para el nombre -->
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>"><br>

        <label for="descripcion">Descripción:</label>
        <!-- Campo de entrada para la descripción -->
        <textarea class="descripcion" name="descripcion" rows="15" required><?php echo $producto['descripcion']; ?></textarea><br>

        <label for="pvp">PVP:</label>
        <!-- Campo de entrada para el precio -->
        <input type="text" name="pvp" value="<?php echo $producto['pvp']; ?>" required><br>

        <div class="botones">
            <!-- Botón para enviar el formulario de actualización -->
            <button class="boton-actualizar" type="submit" name="accion" value="actualizar">Actualizar</button>
        </div>
    </form>

    <form action="../index.php">
        <!-- Botón para cancelar y volver al índice -->
        <button class="boton-cancelar" type="submit" name="cancelar" value="cancelar">Cancelar</button>
    </form>
</div>
