function sortReviews() {
    let select = document.getElementById("sort");
   
    let selectedValue = select.options[select.selectedIndex].value;
    
    fetch("http://primerentornofariat.com/p2/producto/mostrarRatings?sort=" + selectedValue)
      .then(response => response.text())
      .then(data => {
        
        // Handle the response from the server
        console.log(data);
      })
      .catch(error => {
        console.error(error);
      });
  }
  