<?php
/*
Template Name: Product Page
*/
get_header();

// Function to retrieve product data based on the product ID
function retrieve_product_data($product_id) {
    // Construct the API URL to fetch a single product by ID
    $api_url = "https://dummyjson.com/products/{$product_id}";

    // Fetch the product data from the API
    $response = wp_remote_get($api_url);

    if (is_array($response) && !is_wp_error($response)) {
        $product_data = json_decode($response['body'], true);

        // Return the product data
        return $product_data;
    }

    return array(); // Return an empty array if API fetch fails or no product found
}



// Access the product ID from the query parameter
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

// Retrieve the product data based on the product ID
$product_data = retrieve_product_data($product_id); // Replace with your retrieval logic

get_header();

if (!empty($product_data)) {
    echo '<div class="product">';
    echo '<h2>' . esc_html($product_data['title']) . '</h2>';
    echo '<p>' . esc_html($product_data['description']) . '</p>';
    // echo '<img src"' . esc_html($product_data['images'][1]) . '"></img>';
    // Display other product details
    echo '</div>';
} else {
    echo '<p>No product data available.</p>';
}

get_footer();
