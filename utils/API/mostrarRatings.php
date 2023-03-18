
<?php




header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

/*
$sort = $_GET["sort"];

// Handle the sorting based on the selected value
if ($sort == "low-to-high") {
  // Sort by rating: low to high
  try {
    $datosJSON = PRODUCTDAO::getALLRviewLowerToHigher();
    $response = ['status' => 'success', 'data' => $datosJSON];
    header('Content-Type: application/json');
  } catch (Exception $e) {
    $response = ['status' => 'error', 'message' => $e->getMessage()];
    header('Content-Type: application/json');
    http_response_code(500);
  }
} elseif ($sort == "high-to-low") {
  // Sort by rating: high to low
  try {
    $datosJSON = PRODUCTDAO::getALLRviewHigherToLower();
    $response = ['status' => 'success', 'data' => $datosJSON];
    header('Content-Type: application/json');
  } catch (Exception $e) {
    $response = ['status' => 'error', 'message' => $e->getMessage()];
    header('Content-Type: application/json');
    http_response_code(500);
  }
} else {
  // Default sorting
  try {
    $datosJSON = PRODUCTDAO::getALLRview();
    $response = ['status' => 'success', 'data' => $datosJSON];
    header('Content-Type: application/json');
  } catch (Exception $e) {
    $response = ['status' => 'error', 'message' => $e->getMessage()];
    header('Content-Type: application/json');
    http_response_code(500);
  }
}*/

$method = $_SERVER['REQUEST_METHOD'];

if($method == "OPTIONS") {
    die();
}

if($method == "GET") {
  try {
    $datosJSON = PRODUCTDAO::getALLRviewHigherToLower();
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
    $datosJSON = PRODUCTDAO::getALLRviewHigherToLower();
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
