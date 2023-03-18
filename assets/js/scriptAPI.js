import notie from 'notie';



  

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


  
  
  // resiver datos del form
document.getElementById('review-form').addEventListener('submit', function(event) {
  event.preventDefault();
  
  // guardar los datos en letiables
  let rating = document.querySelector('.rate input[name="rating"]:checked').value;
  
  let comment = document.getElementById('comment').value;
  let orderID = document.getElementById('order-select').value;
  let userID = document.getElementById('user-id').value;
  
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
        document.querySelector('.rate input[name="rating"]:checked').checked = false;

        document.getElementById('comment').value = '';
        document.getElementById('order-select').value= '';
         document.getElementById('user-id').value= '';
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
  xhr.send('rating=' + encodeURIComponent(rating) + '&comment=' + encodeURIComponent(comment)+ '&orderID=' + encodeURIComponent(orderID)+ '&userID=' + encodeURIComponent(userID));
});
