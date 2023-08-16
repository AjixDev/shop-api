<?php

// Enqueue styles and scripts
function enqueue_custom_assets() {
	// Enqueue styles
	wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/custom.css');

	// Enqueue scripts
	wp_enqueue_script('app-script', get_stylesheet_directory_uri() . '/assets/custom.js', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_assets');

function enqueue_quasar_assets() {
	// Enqueue external Quasar stylesheet from CDN
	wp_enqueue_style('google-fonts-css', 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons');
	wp_enqueue_style('cdn-quasar-stylesheet', 'https://cdn.jsdelivr.net/npm/quasar@2.12.4/dist/quasar.prod.css');

	// Enqueue external Vue script from CDN
	wp_enqueue_script('cdn-vue-script', 'https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.prod.js', array(), null, true);

	// Enqueue external Quasar script from CDN
	wp_enqueue_script('cdn-quasar-script', 'https://cdn.jsdelivr.net/npm/quasar@2.12.4/dist/quasar.umd.prod.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_quasar_assets');
