fetch('http://primerentornofariat.com/p2/producto/API')
  .then(response => response.json())
  .then(data => {
    // Save the data to a variable
    const pedidoData = data;
    
    // Do something with the data
    console.log(pedidoData);
  })
  .catch(error => console.error(error));
