document.addEventListener("DOMContentLoaded", function () {
  const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");

  addToCartButtons.forEach((button) => {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      const productId = button.dataset.productId;

      // Make an AJAX request to add the product to the cart
      fetch(ajax_object.ajax_url, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "action=add_to_cart&product_id=" + productId,
      })
        .then((response) => response.json())
        .then((data) => {
          // Update the cart icon with the new product count
          const cartIcon = document.getElementById("cart");
          cartIcon.innerHTML = `Cart (${data.cartCount})`;
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    });
  });
});
