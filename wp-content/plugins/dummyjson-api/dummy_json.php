<?php
/*
Plugin Name: DummyJSON API Plugin
Description: Fetches data from DummyJSON API and displays it.
Version: 1.0
Author: AjixDev
*/

function dummyjson_api_callback($atts)
{
    $url = 'https://dummyjson.com/products';
    $response = wp_remote_get($url);

    if (is_wp_error($response)) {
        return 'Error fetching data from DummyJSON API.';
    }

    $data = wp_remote_retrieve_body($response);
    $data_array = json_decode($data, true);

    $output = '<ul>';
    foreach ($data_array['products'] as $product) {
        $output .= '<li>' . $product['id'] . ' ' . $product['title'] . '</li>';
    }
    $output .= '</ul>';

    return $output;
}
add_shortcode('dummyjson_api', 'dummyjson_api_callback');
