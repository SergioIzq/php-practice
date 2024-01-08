<?php

$dwes = new mysqli();
try {
    $dwes->connect('localhost', 'user_dwes', 'userUSER2', 'dwes');
} catch (mysqli_sql_exception $e) {}
if ($errorNum == 0) {
    $resultado = $dwes->query('UPDATE STOCK SET UNIDADES = 49 WHERE PRODUCTO= "3DSNG" AND TIENDA = 1');
    if ($resultado) {
        print "<p>Se han borrado $dwes->affected_rows registros.</p>";
    }
    $dwes->close();
}


?>
