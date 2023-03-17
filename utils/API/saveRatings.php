<?php 
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Retrieve the review data from the POST request
  $revUserId=$_POST['userID'];
  $revOrdId=$_POST['orderID'];
  $revStar = $_POST['rating'];
  $revComment = $_POST['comment'];

  // Insert the review into the database
  $datosJSON = PRODUCTDAO::insertReview($revOrdId,$revUserId,$revStar,$revComment);
  
  // Create a response object
  $response = array(
    'success' => true,
    'message' => 'Thank you for your review!'
  );

  // Return the response as a JSON object
  header('Content-Type: application/json');
  echo json_encode($response);
}
?>
