<?php 
setcookie("correo_sesion", "", time() - 3600, "/");
header("Location: ../index.php");