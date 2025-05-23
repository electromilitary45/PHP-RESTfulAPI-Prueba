<?php
class Database {
    private $host = "localhost";
    private $db_name = "api_rest";
    private $username = "root";
    private $passw = "";
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host".$this->host.":dbname=".$this->db_name,
                $this->username,
                $this->passw
            );
            $this->conn->exec("set name utf8");

        }catch (PDOException $exception){
            echo "Error de conexion: ".$exception->getMessage();
        }
        return $this->conn;
    }
}
?>