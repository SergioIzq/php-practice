<?php require '../VISTA/LAYOUT/layout.php'; ?>

<div class="titulo">
    <h2>Editar Producto</h2>
</div>

<div class="editar-form">
<form method="post" action="<?php echo BASE_URL . 'CONTROLADOR/controlador_actualizar.php'; ?>">
    <input type="hidden" name="producto_cod" value="<?php echo $producto['cod']; ?>">

    <label for="nombre_corto">Nombre Corto:</label>
    <input type="text" name="nombre_corto" value="<?php echo $producto['nombre_corto']; ?>" required><br>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>"><br>

    <label for="descripcion">Descripción:</label>
    <textarea class="descripcion" name="descripcion" rows="15" required><?php echo $producto['descripcion']; ?></textarea><br>

    <label for="pvp">PVP:</label>
    <input type="text" name="pvp" value="<?php echo $producto['pvp']; ?>" required><br>

    <button type="submit" name="accion" value="actualizar">Actualizar</button>
    <button type="submit" name="accion" value="cancelar">Cancelar</button>
</form>

</div>
