<link rel="stylesheet" href="../VISTA/LAYOUT/layout.css">
<div class="containerRegistro">
    <div class="tituloRegistro">
        <h1>Regístrate</h1>
    </div>
    <div class="formulario-registro">
        <form action="controlador_cliente_inicia_sesion.php" method="post">
            <div class="input-group1">
                <label for="correo">Correo electrónico:</label>
                <input class="input-email" type="email" name="email" required />
            </div>
            <div class="input-group2">
                <label for="contrasenia">Contraseña:</label>
                <input class="input-contrasena" type="password" name="contrasenia" required />
            </div>
            <div class="boton-enviar">
                <button class="button-registrarse" type="submit">Registrarse</button>
            </div>
        </form>
        <div class="inicia-sesion">
            <p>¿Ya tienes una cuenta? <a href="controlador_cliente_inicia_sesion.php">Inicia sesión aquí</a></p>
        </div>
    </div>
</div>