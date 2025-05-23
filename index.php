<?php 

//---------HEADERS----
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//-----FIN HEADER

require_once 'db/dbase.php';


// Enrutamiento manual
$url = $_GET['url']??'';
$method = $_SERVER['REQUEST_METHOD'];

switch ($url) {
    case 'usuarios':
        require_once 'controllers/UsuarioController.php';
        $controller = new UsuarioController();
        $controller-> handleRequest($method);
        break;
    case 'productos':
        require_once 'controllers/ProductoController.php';
        $controller = new ProductoController();
        $controller-> handleRequest($method);
        break;
    default:
        http_response_code(404);
        echo json_encode(["error" => "Ruta no encontrada"]);
        exit;
}

?>
