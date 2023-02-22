<?php

class Database {
    private $host = "localhost";
    private $db = "dpw1_u2_a2";
    private $user = "root";
    private $pass = "";
    private $charset = "utf8";

    function conectar() {
        try {
            $conexion = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexion, $this->user, $this->pass, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            exit();
        }
    } 
}

?>