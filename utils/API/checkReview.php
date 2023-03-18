<?php




// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Retrieve the review data from the POST request
    $revUserId = $_POST['userID'];
    $revOrdId = $_POST['orderID'];
   
    // Check if a review already exists for the given user ID and order ID
    $existingReview = PRODUCTDAO::getRviewByID($revUserId, $revOrdId);
    
    if ($existingReview) {
        // Return an error response indicating that the order has already been reviewed
        $response = array(
            'success' => false,
            'message' => 'You have already reviewed or rated this order.'
        );
    } else {
        // Return a success response indicating that the user can submit a new review
        $response = array(
            'success' => true,
            'message' => 'Thank you for your review!'
        );
    }
  
    // Set the response header to indicate that the content is JSON
    header('Content-Type: application/json');

    // Output the response as JSON
    echo json_encode($response);
}



  
?>