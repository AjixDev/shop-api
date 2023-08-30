<?php

function enqueue_quasar_assets() {
	// Enqueue external Quasar stylesheet from CDN
	wp_enqueue_style('quasar-prod-css', 'https://cdn.jsdelivr.net/npm/quasar@2.12.4/dist/quasar.prod.css');
	wp_enqueue_style('google-fonts-css', 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp');
	wp_enqueue_style('cdn-materialdesignicons-stylesheet', 'https://cdn.jsdelivr.net/npm/material-icons@1.13.10/iconfont/material-icons.min.css');
	wp_enqueue_style('cdn-fontawesome-stylesheet', 'https://use.fontawesome.com/releases/v6.1.1/css/all.css');
	wp_enqueue_style('cdn-ionicons-stylesheet', 'https://cdn.jsdelivr.net/npm/ionicons@^4.0.0/dist/css/ionicons.min.css');
	wp_enqueue_style('cdn-animate-stylesheet', 'https://cdn.jsdelivr.net/npm/animate.css@^4.0.0/animate.min.css');
	wp_enqueue_style('cdn-bootstrap-icons-stylesheet', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css');

	// Enqueue external Vue script from CDN
	wp_enqueue_script('cdn-vue-script', 'https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.prod.js', array(), null);

	// Enqueue external Quasar script from CDN
	wp_enqueue_script('cdn-quasar-script', 'https://cdn.jsdelivr.net/npm/quasar@2.12.4/dist/quasar.umd.prod.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_quasar_assets');

// Enqueue styles and scripts
function enqueue_custom_assets() {
	// Enqueue styles
	wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/custom.css');

	// Enqueue scripts
	wp_enqueue_script('app-script', get_stylesheet_directory_uri() . '/assets/custom.js', true);
	wp_enqueue_script('addToCart-script', get_stylesheet_directory_uri() . '/assets/addToCart.js', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_assets');

function add_to_cart() {
	if (isset($_POST['product_id'])) {
		// You can use sessions, cookies, or a database to manage the cart data
		// For demonstration purposes, let's use a session
		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = array();
		}

		// Add the product ID to the cart
		$product_id = $_POST['product_id'];
		$_SESSION['cart'][] = $product_id;

		// Return the updated cart count
		$cart_count = count($_SESSION['cart']);
		wp_send_json(array('cartCount' => $cart_count));
	}
}
add_action('wp_ajax_add_to_cart', 'add_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart');
