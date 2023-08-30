document.addEventListener("DOMContentLoaded", function () {
  // Handle category filter form submission
  document
    .getElementById("category-filter")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      var selectedCategory = document.getElementById("category").value;

      // Make an AJAX request to your WordPress plugin's API endpoint
      fetch(ajax_object.ajax_url, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "action=filter_products&category=" + selectedCategory,
      })
        .then((response) => response.json())
        .then((data) => {
          // Update the UI with filtered products
          const products =
            selectedCategory === "all"
              ? data.products.products // All products
              : data.products.products.filter(
                  (product) => product.category === selectedCategory
                ); // Filtered products by category
          // Generate HTML for products
          const productsHTML = generateProductHTML(products);

          // Insert the generated HTML into the products list
          const productListDiv = document.getElementById("products-list");
          productListDiv.innerHTML = productsHTML;
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    });
});

// Generate HTML for products
function generateProductHTML(products) {
  return products
    .map(
      (product) => `

      <li class="product">
        <h3>${product.title}</h3>
        <img src="${product.images[1]}"></img>
        <p>${product.description}</p>
        <p>Price: $${product.price}</p>
        <button id="cart" align="between" class="btn-fixed-width add-to-cart-btn" color="accent" label="Add to cart" icon="shopping_cart" data-product-id="${product.id}">Add to Cart</button>
        <button onclick="goToProductPage(${product.id})">Product page</button>
        console.log((${product.id});
        <!-- Add more product details here -->
      </li>
    `
    )
    .join("");
}

function goToProductPage(productId) {
  // Construct the product page URL with the product ID as a query parameter
  const productPageUrl = `http://localhost/shop-api/product/?product_id=${productId}`;

  // Navigate to the product page
  window.location.href = productPageUrl;
}
