<?php

require 'config.php';

class Database {
    // Propiedades para la conexión a la base de datos
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $database = DB_DATABASE;

    private $conn;

    // Método para conectar a la base de datos
    public function conectar() {
        $dsn = "mysql:host={$this->host};dbname={$this->database}";
        $opciones = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

        try {
            $this->conn = new PDO($dsn, $this->user, $this->password, $opciones);
        } catch (PDOException $e) {
            // Capturar excepciones y mostrar un mensaje de error
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Método para desconectar de la base de datos
    public function desconectar() {
        $this->conn = null; 
    }

    // Método para consultar las familias desde la base de datos
    public function consultarFamilias() {
        $sql = 'SELECT nombre, cod FROM familia'; 
        $stmt = $this->conn->query($sql); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    // Método para consultar los productos de una familia específica
    public function consultarProductos($codigoFamiliaSeleccionada) {
        $sql = 'SELECT cod, nombre_corto, pvp FROM producto WHERE familia = :familia'; 
        $stmt = $this->conn->prepare($sql); 
        $stmt->execute([':familia' => $codigoFamiliaSeleccionada]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    // Método para consultar un producto por su código
    public function consultarProductoPorCodigo($codigoProductoSeleccionado) {
        $sql = 'SELECT cod, nombre_corto, nombre, descripcion, pvp FROM producto WHERE cod = :cod'; 
        $stmt = $this->conn->prepare($sql); 
        $stmt->execute([':cod' => $codigoProductoSeleccionado]); 
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    // Método para actualizar un producto
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
