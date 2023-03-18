




  

fetch('http://primerentornofariat.com/p2/producto/api', { method:'get' })
  .then(response => response.json())
  .then(data => {
    // guardar los pedidos en un letiable
    const pedidoData = data;
    const selectElement = document.getElementById("order-select");
    for (let i = 0; i < pedidoData.data.length; i++) {
      const option = document.createElement("option");
      option.value = pedidoData.data[i].ID_PEDIDO;
      option.text = pedidoData.data[i].ID_PEDIDO;
      selectElement.appendChild(option);
    }
  })
  .catch(error => console.error(error));


  
  // resivar datos del form
document.getElementById('review-form').addEventListener('submit', function(event) {
  event.preventDefault();
  
  // guardar los datos en variables
  let rating = document.querySelector('.rate input[name="rating"]:checked');
  let comment = document.getElementById('comment');
  let orderID = document.getElementById('order-select');
  let userID = document.getElementById('user-id');
  
  // Check if any field is left out
  if (!rating || !comment.value || !orderID.value || !userID.value) {
    let errorMsg;
    
    // Check which fields are left out and set the error message accordingly
    if (!rating) {
      errorMsg = 'Please select a rating.';
    } else if (!comment.value) {
      errorMsg = 'Please enter a comment.';
    } else if (!orderID.value) {
      errorMsg = 'Please select an order ID.';
    } else if (!userID.value) {
      errorMsg = 'Please enter a user ID.';
    } else {
      errorMsg = 'Please fill out all required fields.';
    }
    
    // Display the error message using notie.js
    notie.alert({
      type: 'error',
      text: errorMsg,
      time: 2000
    });
    
    return;
  }
  
  // Create a new XMLHttpRequest object
  let xhr = new XMLHttpRequest();

  // Configure the POST request
  xhr.open('POST', 'http://primerentornofariat.com/p2/producto/savereview');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  // Handle the response from the server
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Display a success message using notie.js
        notie.alert({
          type: 'success',
          text: 'Thank you for your review!',
          time: 2000
        });
        // Clear the form inputs
        rating.checked = false;
        comment.value = '';
        orderID.value = '';
        userID.value = '';
      } else {
        // Display an error message using notie.js
        notie.alert({
          type: 'error',
          text: 'Oops! Something went wrong. Please try again later.',
          time: 2000
        });
      }
    }
  };

  // Send the POST request with the form data
  xhr.send('rating=' + encodeURIComponent(rating.value) + '&comment=' + encodeURIComponent(comment.value)+ '&orderID=' + encodeURIComponent(orderID.value)+ '&userID=' + encodeURIComponent(userID.value));
});
