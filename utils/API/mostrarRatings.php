
<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER['REQUEST_METHOD'];

if($method == "OPTIONS") {
    die();
}

if($method == "GET") {
    try {
        $datosJSON = PRODUCTDAO::getALLRview();
        $response = ['status' => 'success', 'data' => $datosJSON];
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (Exception $e) {
        $response = ['status' => 'error', 'message' => $e->getMessage()];
        header('Content-Type: application/json');
        http_response_code(500);
        echo json_encode($response);
    }
}

if($method == "POST") {
    try {
        $datosJSON = PRODUCTDAO::getALLRview();
        $response = ['status' => 'success', 'data' => $datosJSON];
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (Exception $e) {
        $response = ['status' => 'error', 'message' => $e->getMessage()];
        header('Content-Type: application/json');
        http_response_code(500);
        echo json_encode($response);
    }
}
