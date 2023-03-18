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
        $datosJSON2 = PRODUCTDAO::getRviewByID($_SESSION['user_id']);
        $response2 = ['status' => 'success', 'data' => $datosJSON2];
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (Exception $e) {
        $response2 = ['status' => 'error', 'message' => $e->getMessage()];
        header('Content-Type: application/json');
        http_response_code(500);
        echo json_encode($response2);
    }
}

if($method == "POST") {
    try {
        $datosJSON2 = PRODUCTDAO::getRviewByID($_SESSION['user_id']);
        $response2 = ['status' => 'success', 'data' => $datosJSON2];
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (Exception $e) {
        $response2 = ['status' => 'error', 'message' => $e->getMessage()];
        header('Content-Type: application/json');
        http_response_code(500);
        echo json_encode($response2);
    }
}
