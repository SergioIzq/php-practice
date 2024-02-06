<?php

class Database {
    private $host = 'localhost';
    private $user = 'user_dwes';
    private $password = 'userUSER2';
    private $database = 'dwes';

    private $conn;

    public function conectar() {
        $dsn = "mysql:host={$this->host};dbname={$this->database}";
        $opciones = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

        try {
            $this->conn = new PDO($dsn, $this->user, $this->password, $opciones);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function desconectar() {
        $this->conn = null;
    }

    public function consultarFamilias() {
        $sql = 'SELECT nombre, cod FROM familia';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function consultarProductos($codigoFamiliaSeleccionada) {
        $sql = 'SELECT cod, nombre_corto, pvp FROM producto WHERE familia = :familia';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':familia' => $codigoFamiliaSeleccionada]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function consultarProductoPorCodigo($codigoProductoSeleccionado) {
        $sql = 'SELECT cod, nombre_corto, nombre, descripcion, pvp FROM producto WHERE cod = :cod';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cod' => $codigoProductoSeleccionado]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarProducto($codigoProducto, $nombreCorto, $nombre, $descripcion, $pvp) {
        $sql = 'UPDATE producto SET nombre_corto = :nombreCorto, nombre = :nombre, descripcion = :descripcion, pvp = :pvp WHERE cod = :cod';
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':nombreCorto' => $nombreCorto,
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':pvp' => $pvp,
            ':cod' => $codigoProducto,
        ]);
    }
}

?>
