<?php
/*
Plugin Name: DummyJSON API Plugin
Description: Fetches data from DummyJSON API and displays it.
Version: 1.0
Author: Roy Aji
*/

// Fetch API data from DummyJSON API with optional category filter
function shop_theme_fetch_api_data($category = null) {
    $url = 'https://dummyjson.com/products';

    // Fetch all categories
    $categories_response = wp_remote_get('https://dummyjson.com/products/categories');
    $categories = array();
    if (is_array($categories_response) && !is_wp_error($categories_response)) {
        $categories = json_decode($categories_response['body'], true);
    }

    // Fetch products based on category filter
    if ($category) {
        $url .= "/category/" . urlencode($category);
    }

    $response = wp_remote_get($url);

    if (is_array($response) && !is_wp_error($response)) {
        $api_data = json_decode($response['body'], true);
        return array('categories' => $categories, 'products' => $api_data);
    }
    return array('categories' => $categories, 'products' => array()); // Return categories and empty products array if API fetch fails
}

// Add AJAX handler for filtering products
add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');

function filter_products() {
    $category = $_POST['category'];

    // Fetch filtered products using $category
    $filtered_products = shop_theme_fetch_api_data($category);

    // Return the filtered products as JSON
    wp_send_json($filtered_products);
}
