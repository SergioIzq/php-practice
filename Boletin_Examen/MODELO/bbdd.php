<?php

require 'config.php';

class Database {
    // Propiedades para la conexión a la base de datos
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $database = DB_DATABASE;

    public $conn;

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
}