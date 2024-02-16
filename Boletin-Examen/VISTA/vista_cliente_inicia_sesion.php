<link rel="stylesheet" href="../VISTA/LAYOUT/layout.css">
<div class="containerRegistro">
    <div class="tituloRegistro">
        <h1>Inicia sesión</h1>
    </div>
    <div class="formulario-registro">
        <form action="controlador_cliente_inicia_sesion.php" method="post">
            <div class="input-group1">
                <label for="correo">Correo electrónico:</label>
                <input class="input-email" type="email" name="email" required />
            </div>
            <div class="input-group2">
                <label for="contrasenia">Contraseña:</label>
                <input class="input-contrasena" type="password" name="contrasena" required />
            </div>
            <div class="boton-enviar">
                <button class="button-registrarse" type="submit">Iniciar sesión</button>
            </div>
        </form>
        <div class="inicia-sesion">
            <p>¿No tienes una cuenta? <a href="controlador_cliente_registro.php">Regístrate aquí</a></p>
        </div>
    </div>
</div>