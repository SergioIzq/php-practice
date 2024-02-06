<?php require '../VISTA/LAYOUT/layout.php'; ?>
<!-- HTML para mensaje de éxito y redirección -->
<div class="box">
    <div class="mensajeExito">
        <p>Los datos del producto se actualizaron correctamente.</p>
    </div>
    <div class="redireccion">
        <p>Redireccionando a la página principal...</p>
    </div>
</div>

<?php
header("refresh:3;url=../index.php");
exit();
?>

<!-- HTML para mensaje de error de formulario -->
<p>Error: No se ha enviado el formulario correctamente.</p>
