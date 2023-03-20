const productTypeSelect = document.getElementById('product-type');
const productLists = document.querySelectorAll('.product-list');

// Listen for changes to the select element
productTypeSelect.addEventListener('change', (event) => {
  const selectedProductType = event.target.value;
  console.log(productLists);
  // Hide all product lists except for the selected product type
  productLists.forEach(productList => {
    if (productList.getAttribute('data-product-type') !== selectedProductType) {
      productList.setAttribute('hidden', '');
    } else {
      productList.removeAttribute('hidden');
    }
    if (selectedProductType=='Default') {
      productList.removeAttribute('hidden');
    }
  });
});




