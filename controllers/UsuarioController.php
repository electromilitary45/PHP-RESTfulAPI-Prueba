<?php
require_once __DIR__ . '/../models/Usuario.php';
class UsuarioController{
    private $db;
    private $usuario;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->usuario = new Usuario($this->db);
    }

    public function handleRequest($method){
        switch($method) {
            case 'GET':
                break;
            case 'POST':
                $data = json_decode(file_get_contents("php://input"));
                $this->usuario->nombre = $data->nombre;
                $this->usuario->apellidos = $data->apellidos;
                $this->usuario->edad = $data->edad;
                $this->usuario->administrador = $data->administrador;
                $this->usuario->estado = $data->estado ?? true; // Valor por defecto

                if($this->usuario->CrearUsuario()){
                    http_response_code(201);
                    echo json_encode(array("mensaje" => "Usuario creado correctamente."));
                }else{
                    http_response_code(503);
                    echo json_encode(array("mensaje" => "No se pudo crear el usuario."));
                }
                break;

            default:
                http_response_code(405);
                echo json_encode(array("mensaje"=>"Metodo no permitido."));
                break;
        }
    }
}
?>