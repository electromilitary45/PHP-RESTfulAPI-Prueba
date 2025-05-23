<?php
class Usuario{
    private $conn;
    private $table= "user";

    public $userId;
    public $nombre;
    public $apellidos;
    public $edad;
    public $administrador;
    public $estado;

    public function __construct($db){
        $this->conn = $db;
    }

    //-----------------------METODOS---------------//

    //---CREAR USUARIO
    public function CrearUsuario(){
        $query="INSERT INTO ".$this->table." (nombre,apellidos,edad,administrador,estado) VALUES (:nombre,:apellidos,:edad,:administrador,:estado)";
        $stmt= $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellidos = htmlspecialchars(strip_tags($this->apellidos));
        $this->edad = htmlspecialchars(strip_tags($this->edad));
        $this->administrador = htmlspecialchars(strip_tags($this->administrador));
        $this->estado= htmlspecialchars(strip_tags($this->estado));

        $stmt->bindParam(":nombre",$this->nombre);
        $stmt->bindParam(":apellidos",$this->apellidos);
        $stmt->bindParam(":edad",$this->edad);
        $stmt->bindParam(":administrador",$this->administrador);
        $stmt->bindParam(":estado",$this->estado);

        if ($stmt->execute()){
            return true;
        }
        return false;
    }//fin crear usuario

}//fin Clase Usuario
?>