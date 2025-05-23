<?php
class Database {
    private $host = "localhost";
    private $db_name = "bdapi";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,  // Faltaban los = después de host
                $this->username,
                $this->password,
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",  // Forma correcta de establecer charset
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  // Para manejar errores mejor
                ]
            );
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>